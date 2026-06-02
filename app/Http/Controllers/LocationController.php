<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Gallery;
use App\Models\Location;
use App\Models\LocationCategoryService;
use App\Models\Service;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::with([
            'locationCategoryServices.category',
            'locationCategoryServices.service'
        ])->get();

        return view('admin.location.index', compact('locations'));
    }

    public function create()
    {
        $categories = Category::with('services')->get();
        $galleries = Gallery::all();

        return view('admin.location.create', compact('categories', 'galleries'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'cat_id' => 'required|exists:categories,id',
            'gallary_id' => 'nullable|exists:galleries,id',
            'service_ids' => 'required|array|min:1',
            'longitude' => 'required|numeric',
            'latitude' => 'required|numeric',
            'service_ids.*' => 'exists:services,id',
            'state' => 'nullable|string|max:255',
            'district' => 'nullable|string|max:255',
            'area' => 'nullable|string|max:255',
            'is_hidden' => 'nullable|boolean',
        ]);

        $location = Location::create([
            'state' => $validated['state'] ?? null,
            'district' => $validated['district'] ?? null,
            'area' => $validated['area'] ?? null,
            'is_hidden' => $validated['is_hidden'] ?? false,
            'longitude' => $validated['longitude'],
            'latitude' => $validated['latitude'],
        ]);

        foreach ($validated['service_ids'] as $serviceId) {
            LocationCategoryService::create([
                'location_id' => $location->id,
                'category_id' => $validated['cat_id'],
                'service_id' => $serviceId,
            ]);
        }

        return redirect()->route('admin.location.index')
            ->with('success', 'Location created successfully.');
    }

    public function edit($id)
    {
        $location = Location::with('locationCategoryServices')->findOrFail($id);

        $categories = Category::all();
        $services = Service::all();
        $galleries = Gallery::all();

        $selectedServices = $location->locationCategoryServices
            ->pluck('service_id')
            ->toArray();

        return view('admin.location.edit', compact(
            'location',
            'categories',
            'services',
            'galleries',
            'selectedServices'
        ));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'cat_id' => 'required|exists:categories,id',
            'gallary_id' => 'nullable|exists:galleries,id',
            'service_ids' => 'required|array|min:1',
            'service_ids.*' => 'exists:services,id',
            'state' => 'nullable|string|max:255',
            'district' => 'nullable|string|max:255',
            'area' => 'nullable|string|max:255',
            'is_hidden' => 'nullable|boolean',
            'longitude' => 'required|numeric',
            'latitude' => 'required|numeric',
        ]);

        $location = Location::findOrFail($id);

        $location->update([
            'state' => $validated['state'] ?? null,
            'district' => $validated['district'] ?? null,
            'area' => $validated['area'] ?? null,
            'is_hidden' => $validated['is_hidden'] ?? false,
            'longitude' => $validated['longitude'],
            'latitude' => $validated['latitude'],
        ]);

        LocationCategoryService::where('location_id', $location->id)
            ->delete();

        foreach ($validated['service_ids'] as $serviceId) {
            LocationCategoryService::create([
                'location_id' => $location->id,
                'category_id' => $validated['cat_id'],
                'service_id' => $serviceId,
            ]);
        }

        return redirect()->route('admin.location.index')
            ->with('success', 'Location updated successfully.');
    }

    public function destroy(Location $location)
    {
        $location->delete();

        return redirect()->route('admin.location.index')
            ->with('success', 'Location deleted successfully.');
    }
}
