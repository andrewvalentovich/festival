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
Route::get('/live', [App\Http\Controllers\HomeController::class, 'live'])->name('live');
Route::get('/partners', [App\Http\Controllers\HomeController::class, 'partners'])->name('partners');
Route::get('/contacts', [App\Http\Controllers\HomeController::class, 'contacts'])->name('contacts');
Route::get('/decrees', [App\Http\Controllers\HomeController::class, 'decrees'])->name('decrees');
Route::get('/documents', [App\Http\Controllers\HomeController::class, 'documents'])->name('documents');
Route::get('/calendar', [App\Http\Controllers\HomeController::class, 'calendar'])->name('calendar');

Route::get('/contests', [App\Http\Controllers\Contests\IndexController::class, 'index'])->name('contests.index');
Route::get('/contests/art', [App\Http\Controllers\Contests\IndexController::class, 'art'])->name('contests.art');
Route::get('/contests/poetry', [App\Http\Controllers\Contests\IndexController::class, 'poetry'])->name('contests.poetry');
Route::get('/contests/music', [App\Http\Controllers\Contests\IndexController::class, 'music'])->name('contests.music');
Route::post('/contests/send', [App\Http\Controllers\Contests\IndexController::class, 'send'])->name('contests.send');

Route::get('/galleries', [App\Http\Controllers\Galleries\IndexController::class, 'index'])->name('galleries.index');
Route::get('/galleries/{slug}', [App\Http\Controllers\Galleries\IndexController::class, 'detail'])->name('galleries.detail');

Route::get('/archive', [App\Http\Controllers\Articles\IndexController::class, 'index'])->name('articles.index');
Route::get('/archive/{slug}', [App\Http\Controllers\Articles\IndexController::class, 'detail'])->name('articles.detail');

Route::get('/events', [App\Http\Controllers\Events\IndexController::class, 'index'])->name('events.index');
Route::get('/events/{slug}', [App\Http\Controllers\Events\IndexController::class, 'detail'])->name('events.detail');


// Страница, на которую перенаправляются пользователи не имеющие роли администратора
// Но которые пытались попасть в админку
Route::get('/auth_abort', [App\Http\Controllers\HomeController::class, 'auth_abort'])->name('auth_abort');

// Админка
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', IndexController::class)->name('admin.index');

    Route::group(['as' => 'admin.'], function() {
        Route::resource('jury', \App\Http\Controllers\Admin\JuryController::class); // CRUD model Jury
        Route::resource('appeals', \App\Http\Controllers\Admin\AppealController::class); // CRUD model Appeal
        Route::resource('contacts', \App\Http\Controllers\Admin\ContactController::class); // CRUD model Contact
        Route::resource('partners', \App\Http\Controllers\Admin\PartnerController::class); // CRUD model Partner
        Route::resource('articles', \App\Http\Controllers\Admin\ArticleController::class); // CRUD model Article
        Route::resource('events', \App\Http\Controllers\Admin\EventController::class); // CRUD model Event
        Route::resource('albums', \App\Http\Controllers\Admin\AlbumController::class); // CRUD model Album
        Route::resource('documents', \App\Http\Controllers\Admin\DocumentController::class); // CRUD model Document
        Route::resource('decrees', \App\Http\Controllers\Admin\DecreeController::class); // CRUD model Decree

        // Планировалось класть контент страниц в таблицу `options`, используется только для страницы "О фестивале"
        Route::resource('options', \App\Http\Controllers\Admin\OptionController::class); // CRUD model Option

        // docs: https://laravel.com/docs/10.x/controllers
        Route::resource('albums.photos', \App\Http\Controllers\Admin\PhotoController::class)->shallow(); // CRUD model Photo

        Route::get('/about', [\App\Http\Controllers\Admin\AboutController::class, 'show'])->name('about.show');
        Route::get('/about/edit', [\App\Http\Controllers\Admin\AboutController::class, 'edit'])->name('about.edit');
        Route::patch('/about', [\App\Http\Controllers\Admin\AboutController::class, 'update'])->name('about.update');
    });
});
