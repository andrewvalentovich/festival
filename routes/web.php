<?php

use App\Http\Controllers\Admin\IndexController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');


Route::group(['prefix' => 'admin'], function () {
    Route::get('/', IndexController::class)->name('admin.index');

    Route::resource('jury', \App\Http\Controllers\Admin\JuryController::class); // CRUD model Jury
    Route::resource('partners', \App\Http\Controllers\Admin\PartnerController::class); // CRUD model Partner
    Route::resource('articles', \App\Http\Controllers\Admin\ArticleController::class); // CRUD model Article
    Route::resource('events', \App\Http\Controllers\Admin\EventController::class); // CRUD model Event
    Route::resource('albums', \App\Http\Controllers\Admin\AlbumController::class); // CRUD model Album

    // docs: https://laravel.com/docs/10.x/controllers
    Route::resource('albums.photos', \App\Http\Controllers\Admin\PhotoController::class)->shallow(); // CRUD model Photo
});
