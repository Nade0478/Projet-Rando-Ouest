<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\API\RoleController;
use App\Http\Controllers\API\ArticleController;
use App\Http\Controllers\API\OpinionController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\Place_randoController;
use App\Http\Controllers\API\Manage_placeController;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// route api user
Route::apiResource('user', UserController::class);

// route api admin
Route::apiResource('admin', UserController::class);

// route api article
Route::apiResource('article', ArticleController::class);

// route api place_rando
Route::apiResource('place_rando', Place_randoController::class);

// route api category
Route::apiResource('category', CategoryController::class);

// route api opinion
Route::apiResource('opinion', OpinionController::class);

// route api manage_place
Route::apiResource('manage_place', Manage_placeController::class);

// route api role
Route::apiResource('role', RoleController::class);

// Accessible à tous
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

//Seulement accessible via le JWT
Route::middleware('auth:api')->group(function() {
    Route::get('/currentuser', [AuthController::class, 'currentUser']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
