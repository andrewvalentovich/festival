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
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/jury', [App\Http\Controllers\HomeController::class, 'jury'])->name('jury');
Route::get('/video', [App\Http\Controllers\HomeController::class, 'video'])->name('video');
Route::get('/partners', [App\Http\Controllers\HomeController::class, 'partners'])->name('partners');
Route::get('/contacts', [App\Http\Controllers\HomeController::class, 'contacts'])->name('contacts');

Route::get('/galleries', [App\Http\Controllers\Galleries\IndexController::class, 'index'])->name('galleries.index');
Route::get('/galleries/{slug}', [App\Http\Controllers\Galleries\IndexController::class, 'detail'])->name('galleries.detail');

Route::get('/archive', [App\Http\Controllers\Articles\IndexController::class, 'index'])->name('articles.index');
Route::get('/archive/{slug}', [App\Http\Controllers\Articles\IndexController::class, 'detail'])->name('articles.detail');

Route::get('/events', [App\Http\Controllers\Events\IndexController::class, 'index'])->name('events.index');
Route::get('/events/{slug}', [App\Http\Controllers\Events\IndexController::class, 'detail'])->name('events.detail');


// Страница, на которую перенаправляются пользователи не имеющие роли администратора
// Но которые пытались попасть в админку
Route::get('/auth_abort', [App\Http\Controllers\HomeController::class, 'auth_abort'])->name('auth_abort');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', IndexController::class)->name('admin.index');

    Route::group(['as' => 'admin.'], function() {
        Route::resource('jury', \App\Http\Controllers\Admin\JuryController::class); // CRUD model Jury
        Route::resource('contacts', \App\Http\Controllers\Admin\ContactController::class); // CRUD model Contact
        Route::resource('partners', \App\Http\Controllers\Admin\PartnerController::class); // CRUD model Partner
        Route::resource('articles', \App\Http\Controllers\Admin\ArticleController::class); // CRUD model Article
        Route::resource('events', \App\Http\Controllers\Admin\EventController::class); // CRUD model Event
        Route::resource('albums', \App\Http\Controllers\Admin\AlbumController::class); // CRUD model Album
        Route::resource('documents', \App\Http\Controllers\Admin\DocumentController::class); // CRUD model Document
        Route::resource('decrees', \App\Http\Controllers\Admin\DecreeController::class); // CRUD model Decree
        Route::resource('options', \App\Http\Controllers\Admin\OptionController::class); // CRUD model Option

        // docs: https://laravel.com/docs/10.x/controllers
        Route::resource('albums.photos', \App\Http\Controllers\Admin\PhotoController::class)->shallow(); // CRUD model Photo

        Route::get('/about', [\App\Http\Controllers\Admin\AboutController::class, 'index'])->name('about.index');
        Route::patch('/about', [\App\Http\Controllers\Admin\AboutController::class, 'update'])->name('about.update');
    });
});
