<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ReleaseController;


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


Route::get('/', [PageController::class, 'index'])->name('index');;
Route::get('/about', [PageController::class, 'about'])->name('about');


//release routes need to change 
// Route::get('/posts','PostsController@index')->name('posts.index');
 Route::get('/release', [ReleaseController::class, 'index'])->name('release');

 // Route::get('/posts/{id}','PostsController@show')->name('posts.show');
 Route::get('/show/{id}', [ReleaseController::class, 'show'])->name('show');

 // Route::get('/posts/create','PostsController@create')->name('posts.create');

// Route::post('/posts','PostsController@store')->name('posts.store');

// Route::get('/posts/{id}/edit','PostsController@edit')->name('posts.edit');
// Route::put('/posts/{id}','PostsController@update')->name('posts.update');

// Route::delete('/posts/{id}','PostsController@destroy')->name('posts.destroy');

// Auth::routes();

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('home', 'home')->name('home');
});

