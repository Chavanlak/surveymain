<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
class FeedbackController extends Controller
{
    public function index()
    {
        return view('surveytest');
    }

    public function store(Request $request)
    {
        $request->validate([
            'feedback' => 'required|string',
            'rating' => 'required|integer|min:1|max:5'
        ]);

        Feedback::create($request->only('feedback', 'rating'));

        return back()->with('success', 'Feedback submitted!');
    }
}
