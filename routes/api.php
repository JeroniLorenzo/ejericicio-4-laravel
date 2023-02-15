<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\MovieController as Movie;



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

Route::get('movies', [Movie::class, 'index']);
Route::get('movies/title={value}', [Movie::class, 'getByTitle']);
Route::get('movies/{id}', [Movie::class, 'getById']);
Route::post('movies/{author_id}', [Movie::class, 'store']);
Route::delete('movies/{id}', [Movie::class, 'destroy']);
Route::put('movies', [Movie::class, 'update']);