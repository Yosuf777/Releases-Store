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
//releses route 
Route::get('/show/{id}', [ReleaseController::class, 'show'])->name('show');
Route::get('/relase/create', [ReleaseController::class, 'create'])->name('create');
Route::post('/store', [ReleaseController::class, 'store'])->name('store');
Route::get('/edit/{id}', [ReleaseController::class, 'edit'])->name('edit');
Route::put('/update/{id}', [ReleaseController::class, 'update'])->name('update');
Route::post('/delete/{id}', [ReleaseController::class, 'destroy'])->name('delete');

//pages route 
Route::get('/page/create', [PageController::class, 'create'])->name('page.create');

Route::post('/page/store', [PageController::class, 'store'])->name('page.store');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
