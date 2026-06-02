<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Service;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::with('service')->get();
        return view('admin.gallary.index', compact('galleries'));
    }

    public function create()
    {
        $services = Service::all();
        return view('admin.gallary.create', compact('services'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'position_img' => 'nullable|integer|min:0|max:9999',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_hidden' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('galleries', 'public');
            $validated['image'] = $imagePath;
        }

        Gallery::create($validated);

        return redirect()->route('admin.gallery.index')->with('success', 'Gallery image created successfully!');
    }

    public function edit(Gallery $gallery)
    {
        $services = Service::all();
        return view('admin.gallary.edit', compact('gallery', 'services'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'position_img' => 'nullable|integer|min:0|max:9999',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_hidden' => 'boolean',
        ]);

        $validated['is_hidden'] = $request->has('is_hidden');
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('galleries', 'public');
            $validated['image'] = $imagePath;
        }

        $gallery->update($validated);

        return redirect()->route('admin.gallery.index')->with('success', 'Gallery image updated successfully!');
    }

    public function destroy(Gallery $gallery)
    {
        $gallery->delete();
        return redirect()->route('admin.gallery.index')->with('success', 'Gallery image deleted successfully!');
    }
}
