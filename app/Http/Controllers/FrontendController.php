<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Location;
use App\Models\LocationCategoryService;
use App\Models\Menu;
use App\Models\Service;

class FrontendController extends Controller
{

    public function index()
    {
        $categories = Category::with([
            'services' => function ($query) {

                $query->where('show_on_homepage', 1)
                    ->orderBy('position');
            }
        ])
            ->orderBy('position')
            ->get()
            ->filter(function ($category) {
                return $category->services->isNotEmpty();
            });

        $banners = Banner::orderBy('position_img')->where('is_hidden', false)->get();
        $menus = Menu::orderBy('position')->where('show_on_homepage', true)->get();
        // return $menus;
        return view('frontend.index', compact('categories', 'menus', 'banners'));
    }

    protected function calculateDistance($lat1, $lon1, $lat2, $lon2)
    {
        $earthRadius = 6371000; // meters

        $lat1 = (float)$lat1;
        $lon1 = (float)$lon1;
        $lat2 = (float)$lat2;
        $lon2 = (float)$lon2;

        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);

        $a = sin($dLat / 2) * sin($dLat / 2) +
            cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
            sin($dLon / 2) * sin($dLon / 2);

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        return $earthRadius * $c;
    }


    public function servicePage($page)
    {
        $service = Service::with('galleries')
            ->where('name', ucwords(str_replace('-', ' ', $page)))
            ->orWhere('url', $page)
            ->firstOrFail();

        return view('frontend.service-detail', compact('service'));
    }
    public function menuPage($url)
    {
        $menu = Menu::where('url', $url)->firstOrFail();
        // return $menu;

        return view('frontend.menu-details', compact('menu'));
    }
}
