<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Place_rando;
use Illuminate\Http\Request;

class Place_randoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $places = Place_rando::all();
        return response()->json($places);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_place_rando' => ['required', 'string', 'max:255'],
            'latitude_place_rando' => ['required', 'numeric'],
            'longitude_place_rando' => ['required', 'numeric'],
            'description_place_rando' => ['required', 'string'],
            'horaires_fermeture' => ['required', 'max:100'],
            'image_place_rando' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'map_place_rando' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'distance_place_rando' => ['required', 'numeric'],
            'difficulty_place_rando' => ['required', 'in:Facile,Moyen,Difficile'],
            'estimated_time_place_rando' => ['required', 'date_format:H:i'],
        ]);


            // On crée une nouvelle place avec les informations fournies

            dd($request);
            $place_rando = Place_rando::create($request->all());
            // On retourne les informations de la nouvelle place en JSON
            return response()->json([
            'status' => 'Success',
            'data' => $place_rando,
            ]);
        }

    /**
     * Display the specified resource.
     */
    public function show(Place_rando $place_rando)
    {
        return response()->json($place_rando);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Place_rando $place_rando)
    {
        $request->validate([
            'name_place_rando' => ['required','string','max:255'],
            'latitude_place_rando' => 'required|numeric',
            'longitude_place_rando' => 'required|numeric',
            'description_place_rando' => ['required','string'],
            'horaires_fermeture' => ['required|max: 100'],
            'image_place_rando' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'map_place_rando' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'distance_place_rando' => 'required|numeric',
            'difficulty_place_rando' => ['required|in:Facile,Moyen,Difficile'],
            'estimated_time_place_rando' => ['required|date_format:H:i'],
            ]);
            // On crée une nouvelle place avec les informations fournies
            $place_rando = Place_rando::create($request->all());
            // On retourne les informations de la nouvelle place en JSON
            return response()->json([
            'status' => 'Success',
            'data' => $place_rando,
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Place_rando $place_rando)
    {
        $place_rando->delete();
        return response()->json(null, 204);
    }
}
