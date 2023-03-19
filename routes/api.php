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

Route::apiResource('articles', \App\Http\Controllers\Api\ArticlesController::class);
Route::post('articles/{article}/edit', '\App\Http\Controllers\Api\ArticlesController@update');

Route::apiResource('tags', \App\Http\Controllers\Api\TagsController::class);
Route::get('articles/{article}/tags', '\App\Http\Controllers\Api\ArticlesController@getTags');
Route::get('tags/{tag}/articles', '\App\Http\Controllers\Api\TagsController@getArticles');
