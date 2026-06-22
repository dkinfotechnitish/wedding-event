<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    public function create()
    {
        return view('admin.menu.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'position' => 'nullable|integer|min:0',
            'url' => 'required|string|max:255|unique:menus,url',
            'desc' => 'nullable|string',
            'show_on_homepage' => 'nullable|boolean',
            'is_enquiry' => 'nullable|boolean',
            'is_booking' => 'nullable|boolean',
            'is_gallary' => 'boolean',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . Str::slug($request->title) . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('uploads/menus'), $imageName);

            $imagePath = 'uploads/menus/' . $imageName;
        }

        Menu::create([
            'title' => $validated['title'],
            'position' => $validated['position'] ?? 0,
            'url' => Str::slug($validated['url']),
            'desc' => $validated['desc'] ?? null,
            'show_on_homepage' => $request->has('show_on_homepage'),
            'is_enquiry' => $request->boolean('is_enquiry'),
            'is_booking' => $request->boolean('is_booking'),
            'is_gallary' => $request->boolean('is_gallary'),
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.menu.index')->with('success', 'Menu created successfully.');
    }

    public function edit(Menu $menu)
    {
        return view('admin.menu.edit', compact('menu'));
    }

    public function update(Request $request, Menu $menu)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'position' => 'nullable|integer|min:0',
            'url' => 'required|string|max:255|unique:menus,url,' . $menu->id,
            'desc' => 'nullable|string',
            'show_on_homepage' => 'nullable|boolean',
            'is_enquiry' => 'nullable|boolean',
            'is_booking' => 'nullable|boolean',
            'is_gallary' => 'boolean',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
        // return $validated;

        $imagePath = $menu->image;

        if ($request->hasFile('image')) {

            if ($menu->image && file_exists(public_path($menu->image))) {
                unlink(public_path($menu->image));
            }

            $image = $request->file('image');

            $imageName = time() . '_' . $request->title . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('uploads/menus'), $imageName);

            $imagePath = 'uploads/menus/' . $imageName;
        }

        $menu->update([
            'title' => $validated['title'],
            'position' => $validated['position'],
            'url' => $validated['url'],
            'desc' => $validated['desc'],
            'show_on_homepage' => $request->boolean('show_on_homepage'),
            'is_enquiry' => $request->boolean('is_enquiry'),
            'is_booking' => $request->boolean('is_booking'),
            'is_gallary' => $request->boolean('is_gallary'),
            'image' => $imagePath,
        ]);

        return redirect()
            ->route('admin.menu.index')
            ->with('success', 'Menu updated successfully.');
    }

    public function index()
    {
        $menus = Menu::orderBy('position')->get();

        return view('admin.menu.index', compact('menus'));
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('admin.menu.index')->with('success', 'Menu deleted successfully!');
    }
}
