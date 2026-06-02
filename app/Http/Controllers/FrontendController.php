<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Location;
use App\Models\LocationCategoryService;
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

        return view('frontend.index', compact('categories'));
    }

    public function servicePage($url)
    {
        $service = Service::with([
            'galleries' => function ($query) {
                $query->where('is_hidden', false)->orderBy('position_img');
            },
            'category'
        ])
            ->where('url', $url)
            ->firstOrFail();

        return view('frontend.service-detail', compact('service'));
    }

    // public function index()
    // {
    //     $locationId = session('location_id');

    //     $hasLocationServices = false;

    //     if ($locationId) {
    //         $hasLocationServices = LocationCategoryService::where(
    //             'location_id',
    //             $locationId
    //         )->exists();
    //     }

    //     $categories = Category::with([
    //         'services' => function ($query) use (
    //             $locationId,
    //             $hasLocationServices
    //         ) {

    //             $query->where('show_on_homepage', 1);

    //             if ($locationId && $hasLocationServices) {

    //                 $query->whereIn('services.id', function ($sub) use ($locationId) {

    //                     $sub->select('service_id')
    //                         ->from('location_category_services')
    //                         ->where('location_id', $locationId);
    //                 });

    //                 $query->whereNotIn('services.id', function ($sub) use ($locationId) {

    //                     $sub->select('service_id')
    //                         ->from('location_category_services')
    //                         ->where('location_id', $locationId)
    //                         ->where('is_hidden', 1);
    //                 });
    //             }

    //             $query->orderBy('position');
    //         }
    //     ])
    //         ->orderBy('position')
    //         ->get()
    //         ->filter(function ($category) {
    //             return $category->services->isNotEmpty();
    //         });

    //     return view('frontend.index', compact('categories'));
    // }
}
