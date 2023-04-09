<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::apiResource('articles', \App\Http\Controllers\Api\ArticlesController::class);
Route::get('articles', '\App\Http\Controllers\Api\ArticlesController@index');
Route::get('articles/{article}', '\App\Http\Controllers\Api\ArticlesController@show');

// Route::apiResource('tags', \App\Http\Controllers\Api\TagsController::class);
Route::get('tags/{tag}', '\App\Http\Controllers\Api\TagsController@show');
Route::get('articles/{article}/tags', '\App\Http\Controllers\Api\ArticlesController@getTags');
Route::get('tags/{tag}/articles', '\App\Http\Controllers\Api\TagsController@getArticles');

Route::get('check-auth', '\App\Http\Controllers\AuthController@checkAuth');

Route::middleware(['auth:sanctum'])->group(function() {
    // Route::post('logout', '\App\Http\Controllers\AuthController@logout');
    Route::post('articles', '\App\Http\Controllers\Api\ArticlesController@store');
    Route::patch('articles/{article}/edit', '\App\Http\Controllers\Api\ArticlesController@update');
    Route::delete('articles/{article}', '\App\Http\Controllers\Api\ArticlesController@destroy');

    Route::get('tags', '\App\Http\Controllers\Api\TagsController@index');
    Route::post('tags', '\App\Http\Controllers\Api\TagsController@store');
    Route::patch('tags/{tag}', '\App\Http\Controllers\Api\TagsController@update');
    Route::delete('tags/{tag}', '\App\Http\Controllers\Api\TagsController@destroy');
});
