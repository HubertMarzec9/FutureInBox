<?php

namespace App\Http\Controllers\Letter;

use App\Http\Controllers\Controller;
use App\Models\Letter;

class LetterCreationController extends Controller
{
    public function index()
    {
        return view('letter.create');
    }

    public function store()
    {
        $attributes = request()->validate([
           'title' => 'required|string|min:3|max:255',
           'content' => 'required|string|min:3|max:10000',
           'delivery_date' => 'required|date|after:today',
        ]);
        $attributes['user_id'] = auth()->id();

        Letter::create($attributes);

        return redirect()->route('letter.index')->with('success', 'Letter has been added successfully!');
    }
}
