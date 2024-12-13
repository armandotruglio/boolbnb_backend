<?php

use App\Http\Controllers\Api\Admin\PropertyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//API Routes for properties
Route::apiResource('admin/properties', PropertyController::class);
//API Rutes for services
Route::apiResource('admin/services', App\Http\Controllers\Api\Admin\ServiceController::class);
//API Routes for messages
Route::apiResource('admin/messages', App\Http\Controllers\Api\Admin\MessageController::class);


//API Route to filter properties
Route::post("/filter", [PropertyController::class, "filter"])->name("api.filter");

//API Route to filter sponsorship's properties
Route::get('/sponsored', [PropertyController::class, 'getSponsoredProperties'])->name('api.sponsored');
