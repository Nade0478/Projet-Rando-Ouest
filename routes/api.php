<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\RoleController;
use App\Http\Controllers\API\ArticleController;
use App\Http\Controllers\API\OpinionController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\PlaceController;
use App\Http\Controllers\API\Manage_placeController;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Middleware\AdminMiddleware;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// route api user
Route::apiResource('user', UserController::class);

// route api admin
Route::apiResource('admin', UserController::class);

// route api article
Route::apiResource('article', ArticleController::class);

// route api place
Route::apiResource('place', PlaceController::class);

// route api category
Route::apiResource('category', CategoryController::class);

// route api opinion
Route::apiResource('opinion', OpinionController::class);

// route api manage_place
Route::apiResource('manage_place', Manage_placeController::class);

// route api role
Route::apiResource('role', RoleController::class);

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//Seulement accessible via le JWT
Route::middleware('auth:api')->group(function() {
    Route::get('/currentuser', [AuthController::class, 'currentUser']);
    Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware('auth:sanctum')->put('/user/profile', [UserController::class, 'update']);

//Route middlware
Route::middleware([RoleMiddleware::class.':1'])->group(function () {
    Route::get('/admin', [UserController::class, 'index']);
});

Route::middleware([RoleMiddleware::class.':2'])->group(function () {
    Route::get('/profile', [UserController::class, 'show']);
});

// Route::middleware([AdminMiddleware::class])->group(function () {
//     Route::get('/category', [CategoryController::class, 'index']);
// });


});
