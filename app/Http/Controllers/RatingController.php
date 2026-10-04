<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ratings = Rating::latest()->paginate(10);

        return view('ratingdir.index', compact('ratings'));
    }

    /**
     * Store a newly created rating from public website.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'rating' => 'required|integer|between:1,5',
            'message' => 'nullable|string|max:1000',
        ]);

        Rating::create($validated);

        return back()->with(
            'rating_success',
            'Terima kasih atas rating kamu!'
        );
    }

    public function create()
    {
        return view('ratingdir.create');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rating $rating)
    {
        return view('ratingdir.edit', compact('rating'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rating $rating)
    {
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'rating' => 'required|integer|between:1,5',
            'message' => 'nullable|string|max:1000',
        ]);

        $rating->update($validated);

        return redirect()->route('admin-rating.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rating $rating)
    {
        $rating->delete();

        return redirect()->route('admin-rating.index');
    }
}

