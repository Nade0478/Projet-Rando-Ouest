<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;


Route::get('/', function () {
    return response()->json(['message' => 'Bienvenue sur l\'API Laravel'], 200);
});



