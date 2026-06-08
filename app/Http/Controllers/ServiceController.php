<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::with('category')->orderBy('position')->get();
        return view('admin.service.index', compact('services'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.service.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'position' => 'nullable|integer|min:0|max:9999',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'show_on_homepage' => 'nullable|boolean',
            'is_enquiry' => 'nullable|boolean',
            'is_booking' => 'nullable|boolean',
            'is_gallary' => 'boolean',
            'others' => 'nullable|string|max:1000',
        ]);

        $validated['url'] = Str::slug($request->name);
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('services', 'public');
            $validated['image'] = $imagePath;
        }

        Service::create($validated);

        return redirect()->route('admin.service.index')->with('success', 'Service created successfully!');
    }

    public function edit(Service $service)
    {
        $categories = Category::all();
        return view('admin.service.edit', compact('service', 'categories'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'position' => 'nullable|integer|min:0|max:9999',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'show_on_homepage' => 'nullable|boolean',
            'is_enquiry' => 'nullable|boolean',
            'is_booking' => 'nullable|boolean',
            'is_gallary' => 'nullable|boolean',
            'others' => 'nullable|string|max:1000',
        ]);

        $validated['url'] = Str::slug($request->name);
        $validated['show_on_homepage'] = $request->has('show_on_homepage');
        $validated['is_enquiry'] = $request->has('is_enquiry');
        $validated['is_booking'] = $request->has('is_booking');
        $validated['is_gallary'] = $request->has('is_gallary');


        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('services', 'public');
            $validated['image'] = $imagePath;
        }

        $service->update($validated);

        return redirect()->route('admin.service.index')->with('success', 'Service updated successfully!');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.service.index')->with('success', 'Service deleted successfully!');
    }
}
