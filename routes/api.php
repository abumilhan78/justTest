<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\city_api;
use App\Http\Controllers\API\college_api;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('cities', [city_api::class, 'index']);
Route::post('cities', [city_api::class, 'store']);
Route::put('cities/{id}', [city_api::class, 'update']);
Route::delete('cities/{id}', [city_api::class, 'destroy']);

Route::get('colleges', [college_api::class, 'index']);
Route::post('colleges', [college_api::class, 'store']);
Route::put('colleges/{id}', [college_api::class, 'update']);
Route::delete('colleges/{id}', [college_api::class, 'destroy']);
