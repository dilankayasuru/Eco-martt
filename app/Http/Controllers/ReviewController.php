<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    // Display the review page
    public function index()
    {
        $reviews = Review::latest()->get();
        return view('reviews.index', compact('reviews'));
    }

    // Handle review submission
    public function store(Request $request)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string|max:500',
        ]);

        Review::create([
            'user_id' => auth()->id(), // Add the logged-in user's ID
            'rating' => $request->rating,
            'review' => $request->review,
        ]);

        return redirect()->route('reviews.index')->with('success', 'Thank you for your feedback!');
    }

}
