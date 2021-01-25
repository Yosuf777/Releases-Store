<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [PageController::class, 'index'])->name('index');
Route::get('/relase', [ReleaseController::class, 'index'])->name('release');

Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/show/{id}', [ReleaseController::class, 'show'])->name('show');

Route::get('/create', [ReleaseController::class, 'create'])->name('create');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
