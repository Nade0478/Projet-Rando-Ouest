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
            'distance_place_rando' => ['required', 'numeric'],
            'difficulty_place_rando' => ['required', 'in:Facile,Moyen,Difficile'],
            'estimated_time_place_rando' => ['required', 'date_format:H:i'],
        ]);

        $image_place_rando = "image_place_rando";
        if ($request->hasFile('image_place_rando')) {
            $filenameWithExt = $request->file('image_place_rando')->getClientOriginalName();
            $filenameWithoutExt = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image_place_rando')->getClientOriginalExtension();
            $image_place_rando = $filenameWithoutExt . '_' . time() . '.' . $extension;
            $path = $request->file('image_place_rando')->storeAs('public/uploads', $image_place_rando);
        } else {
            $image_place_rando = Null;
        }
        $map_place_rando = "map_place_rando";
        if ($request->hasFile('map_place_rando')) {
            $filenameWithExt = $request->file('map_place_rando')->getClientOriginalName();
            $filenameWithoutExt = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('map_place_rando')->getClientOriginalExtension();
            $map_place_rando = $filenameWithoutExt . '_' . time(). '.' . $extension;
            $path = $request->file('map_place_rando')->storeAs('public/uploads', $map_place_rando);
        } else {
            $map_place_rando = Null;
        }
        $place_rando = Place_rando::create(array_merge($request->all(), ['image_place_rando' => $image_place_rando, 'map_place_rando' => $map_place_rando ] ));
        if ($place_rando) {

        return response()->json([
            'status' => 'Success',
            'data' => $place_rando,
        ]);
        }
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

            'name_place_rando' => ['required', 'string', 'max:255'],
            'latitude_place_rando' => ['required', 'numeric'],
            'longitude_place_rando' => ['required', 'numeric'],
            'description_place_rando' => ['required', 'text'],
            'distance_place_rando' => ['required', 'numeric'],
            'difficulty_place_rando' => ['required', 'in:Facile,Moyen,Difficile'],
            'estimated_time_place_rando' => ['required', 'date_format:H:i'],
            'image_place_rando' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:10000'],
            'map_place_rando' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:10000'],
        ]);

        $image_place_rando = "image_place_rando";
        if ($request->hasFile('image_place_rando')) {
            $filenameWithExt = $request->file('image_place_rando')->getClientOriginalName();
            $filenameWithoutExt = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image_place_rando')->getClientOriginalExtension();
            $image_place_rando = $filenameWithoutExt . '_' . time() . '.' . $extension;
            $path = $request->file('image_place_rando')->storeAs('public/uploads', $image_place_rando);
        } else {
            $image_place_rando = Null;
        }
        $map_place_rando = "map_place_rando";
        if ($request->hasFile('map_place_rando')) {
            $filenameWithExt = $request->file('map_place_rando')->getClientOriginalName();
            $filenameWithoutExt = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('map_place_rando')->getClientOriginalExtension();
            $map_place_rando = $filenameWithoutExt . '_' . time(). '.' . $extension;
            $path = $request->file('map_place_rando')->storeAs('public/uploads', $map_place_rando);
        } else {
            $map_place_rando = Null;
        }
        $place_rando ->update(array_merge($request->all(), ['image_place_rando' => $image_place_rando, 'map_place_rando' => $map_place_rando ] ));
        if ($place_rando) {

        return response()->json([
            'status' => 'Success',
            'data' => $place_rando,
        ]);
        }
    /**
     * Remove the specified resource from storage.
     */
    }
    public function destroy(Place_rando $place_rando)
    {
        $place_rando->delete();
        return response()->json(null, 204);
    }
// {"conversationId":"ee274cb3-b8e9-49d3-9a37-5f5df5c5c873","source":"instruct"}

    /**
     * Handle file upload and return the filename.
     */
//     private function handleFileUpload(Request $request, $fieldName)
//     {
//         if ($request->hasFile($fieldName)) {
//             $filenameWithExt = $request->file($fieldName)->getClientOriginalName();
//             $filenameWithoutExt = pathinfo($filenameWithExt, PATHINFO_FILENAME);
//             $extension = $request->file($fieldName)->getClientOriginalExtension();
//             $filename = $filenameWithoutExt . '_' . time() . '.' . $extension;
//             $path = $request->file($fieldName)->storeAs('public/uploads', $filename);
//             return $filename;
//         }
//         return null;
//     }
}
