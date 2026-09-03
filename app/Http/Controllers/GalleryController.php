<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $items = Gallery::latest()->paginate(10);
        return view('gallerydir.index', compact('items'));
    }

    public function create()
    {
        return view('gallerydir.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('gallerydir', 'public');
        }

        Gallery::create($validated);

        return redirect()->route('admin-gallery.index')->with('success', 'Data created successfully.');
    }

    public function edit(Gallery $gallery)
    {
        return view('gallerydir.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('gallerydir', 'public');
        }

        $gallery->update($validated);

        return redirect()->route('admin-gallery.index')->with('success', 'Data updated successfully.');
    }

    public function destroy(Gallery $gallery)
    {
        $gallery->delete();
        return redirect()->back()->with('success', 'Data deleted successfully.');
    }
}
