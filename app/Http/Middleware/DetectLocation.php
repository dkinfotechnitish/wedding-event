<?php

namespace App\Http\Middleware;

use App\Models\Location;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class DetectLocation
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {

        if (!session()->has('location_id')) {
            $ip = $request->ip();

            // local testing
            if ($ip == '127.0.0.1' || $ip == '::1') {
                $ip = '103.159.68.10';
            }

            try {

                $response = Http::timeout(5)
                    ->get("http://ip-api.com/json/{$ip}");


                if ($response->successful()) {

                    $data = $response->json();


                    $userLat = $data['lat'] ?? null;
                    $userLng = $data['lon'] ?? null;

                    $state = strtolower(trim($data['regionName'] ?? ''));
                    $district = strtolower(trim($data['city'] ?? ''));
                    $area = strtolower(trim($data['city'] ?? ''));

                    $location = null;

                    /**
                     * STEP 1:
                     * Exact location find
                     */
                    $location = Location::query()
                        ->whereRaw('LOWER(state) = ?', [$state])
                        ->whereRaw('LOWER(district) = ?', [$district])
                        ->whereRaw('LOWER(area) = ?', [$area])
                        ->where('is_hidden', 0)
                        ->first();

                    /**
                     * STEP 2:
                     * If no exact location found,
                     * find nearest by lat/lng
                     */
                    if (!$location && $userLat && $userLng) {

                        $locations = Location::whereNotNull('latitude')
                            ->whereNotNull('longitude')
                            ->where('is_hidden', 0)
                            ->get();

                        $nearestLocation = null;
                        $minDistance = PHP_FLOAT_MAX;

                        foreach ($locations as $loc) {

                            if (!$loc->latitude || !$loc->longitude) continue;

                            $distance = $this->calculateDistance(
                                $userLat,
                                $userLng,
                                $loc->latitude,
                                $loc->longitude
                            );

                            if ($distance < $minDistance) {
                                $minDistance = $distance;
                                $nearestLocation = $loc;
                            }
                        }

                        $location = $nearestLocation;
                    }

                    /**
                     * Save in session
                     */
                    if ($location) {

                        session([
                            'location_id' => $location->id,
                            'user_state' => $state,
                            'user_district' => $district,
                            'user_area' => $area,
                            'user_latitude' => $userLat,
                            'user_longitude' => $userLng,
                        ]);
                        session()->put('test_key', 'working');
                    }
                }
            } catch (\Exception $e) {
            }
        }

        return $next($request);
    }

    protected function calculateDistance($lat1, $lon1, $lat2, $lon2)
    {
        $earthRadius = 6371000;

        $lat1 = (float) $lat1;
        $lon1 = (float) $lon1;
        $lat2 = (float) $lat2;
        $lon2 = (float) $lon2;

        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);

        $a = sin($dLat / 2) * sin($dLat / 2) +
            cos(deg2rad($lat1)) *
            cos(deg2rad($lat2)) *
            sin($dLon / 2) *
            sin($dLon / 2);

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        return $earthRadius * $c;
    }
}
