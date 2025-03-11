<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $places = Place::all();
        return response()->json($places);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'name_place' => ['required', 'string', 'max:255'],
            'latitude_place' => ['required', 'numeric'],
            'longitude_place' => ['required', 'numeric'],
            'description_place' => ['required', 'string'],
            'distance_place' => ['required', 'numeric'],
            'difficulty_place' => ['required', 'in:Facile,Moyen,Difficile'],
            'estimated_time_place' => ['required', 'date_format:H:i'],
        ]);

        $image_place = "image_place";
        if ($request->hasFile('image_place')) {
            $filenameWithExt = $request->file('image_place')->getClientOriginalName();
            $filenameWithoutExt = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image_place')->getClientOriginalExtension();
            $image_place = $filenameWithoutExt . '_' . time() . '.' . $extension;
            $path = $request->file('image_place')->storeAs('public/uploads', $image_place);
        } else {
            $image_place = Null;
        }
        $map_place = "map_place";
        if ($request->hasFile('map_place')) {
            $filenameWithExt = $request->file('map_place')->getClientOriginalName();
            $filenameWithoutExt = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('map_place')->getClientOriginalExtension();
            $map_place = $filenameWithoutExt . '_' . time(). '.' . $extension;
            $path = $request->file('map_place')->storeAs('public/uploads', $map_place);
        } else {
            $map_place = Null;
        }
        $place = Place::create(array_merge($request->all(), ['image_place' => $image_place, 'map_place' => $map_place ] ));
        if ($place) {

        return response()->json([
            'status' => 'Success',
            'data' => $place,
        ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Place $place)
    {
        return response()->json($place);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Place $place)
    {
        $request->validate([

            'name_place' => ['required', 'string', 'max:255'],
            'latitude_place' => ['required', 'numeric'],
            'longitude_place' => ['required', 'numeric'],
            'description_place' => ['required', 'text'],
            'distance_place' => ['required', 'numeric'],
            'difficulty_place' => ['required', 'in:Facile,Moyen,Difficile'],
            'estimated_time_place' => ['required', 'date_format:H:i'],
            'image_place' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:10000'],
            'map_place' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:10000'],
        ]);

        $image_place = "image_place";
        if ($request->hasFile('image_place')) {
            $filenameWithExt = $request->file('image_place')->getClientOriginalName();
            $filenameWithoutExt = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image_place')->getClientOriginalExtension();
            $image_place = $filenameWithoutExt . '_' . time() . '.' . $extension;
            $path = $request->file('image_place')->storeAs('public/uploads', $image_place);
        } else {
            $image_place = Null;
        }
        $map_place = "map_place";
        if ($request->hasFile('map_place')) {
            $filenameWithExt = $request->file('map_place')->getClientOriginalName();
            $filenameWithoutExt = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('map_place')->getClientOriginalExtension();
            $map_place = $filenameWithoutExt . '_' . time(). '.' . $extension;
            $path = $request->file('map_place')->storeAs('public/uploads', $map_place);
        } else {
            $map_place = Null;
        }
        $place ->update(array_merge($request->all(), ['image_place' => $image_place, 'map_place' => $map_place ] ));
        if ($place) {

        return response()->json([
            'status' => 'Success',
            'data' => $place,
        ]);
        }
    /**
     * Remove the specified resource from storage.
     */
    }
    public function destroy(Place $place)
    {
        $place->delete();
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
