<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Opinion;
use Illuminate\Http\Request;

class OpinionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Opinion::all();

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title_opinion' => 'required', 'string', 'max: 255',
            'content_opinion' => 'required', 'text', 'max:255',
            'note_opinion' => 'required', 'integer', 'between:1,5',
            'place_rando_id' => ['required', 'integer'],
            'user_id' => ['required', 'integer'],
        ]);

        return Opinion::create($validatedData);
    }

    /**
     * Display the specified resource.
     */
    public function show(Opinion $opinion)
    {
        return $opinion;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Opinion $opinion)
    {
        $validatedData = $request->validate([
            'title_opinion' => 'string|max:255',
            'content_opinion' => 'string|max:255',
            'note_opinion' => 'integer|between:1,5',
            'place_rando_id' => 'integer',
            'user_id' => 'integer',
        ]);

        $opinion->update($validatedData);

        return $opinion;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Opinion $opinion)
    {
        $opinion->delete();

        return response()->noContent();
    }
}
