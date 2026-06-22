<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function create()
    {
        return view('admin.banner.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'position_img' => 'nullable|integer',
            'banner_content' => 'nullable|string',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('uploads/banner'), $fileName);

            $imagePath = 'uploads/banner/' . $fileName;
        }

        Banner::create([
            'image'          => $imagePath,
            'position_img'   => $request->position_img,
            'banner_content' => $request->banner_content,
            'is_hidden'      => $request->boolean('is_hidden'),
        ]);

        return redirect()
            ->route('admin.banner.index')
            ->with('success', 'Banner created successfully.');
    }

    public function edit(Banner $banner)
    {
        return view('admin.banner.edit', compact('banner'));
    }

    public function update(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);

        $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'position_img' => 'nullable|integer',
            'banner_content' => 'nullable',
        ]);

        if ($request->hasFile('image')) {

            if ($banner->image && file_exists(public_path($banner->image))) {
                unlink(public_path($banner->image));
            }

            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/banner'), $filename);

            $banner->image = 'uploads/banner/' . $filename;
        }

        $banner->position_img = $request->position_img;
        $banner->banner_content = $request->banner_content;
        $banner->is_hidden = $request->has('is_hidden');

        $banner->save();

        return redirect()
            ->route('admin.banner.index')
            ->with('success', 'Banner updated successfully.');
    }

    public function index()
    {
        $banners = Banner::orderBy('position_img')->get();

        return view('admin.banner.index', compact('banners'));
    }

    public function destroy(Banner $banner)
    {
        $banner->delete();
        return redirect()->route('admin.banner.index')->with('success', 'Banner deleted successfully!');
    }
}
