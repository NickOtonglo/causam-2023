<?php

use Illuminate\Support\Facades\Route;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('login', '\App\Http\Controllers\AuthController@login');
Route::post('logout', '\App\Http\Controllers\AuthController@logout')->middleware(['auth:sanctum']);

// Mailing routes
Route::post('/', '\App\Http\Controllers\MailController@store');
// Route::get('/email', function() {
//     Mail::send(new ContactFormMail());
//     return new ContactFormMail();
// });

Route::get('/cache/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');

    return "Cache cleared!";
 });

Route::view('/', 'index')->name('index');
// Route::view('/articles', 'app');
Route::view('/{any?}', 'app')
    ->name('dashboard')
    ->where('any', '.*');
