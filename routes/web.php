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
Route::get('/release', [ReleaseController::class, 'index'])->name('release');

Route::get('/about', [PageController::class, 'about'])->name('about');
//releses route 
Route::get('/show/{id}', [ReleaseController::class, 'show'])->name('show');
Route::get('/release/create', [ReleaseController::class, 'create'])->name('create');
Route::post('/store', [ReleaseController::class, 'store'])->name('store');
Route::get('/edit/{id}', [ReleaseController::class, 'edit'])->name('edit');
Route::put('/update/{id}', [ReleaseController::class, 'update'])->name('update');
Route::post('/delete/{id}', [ReleaseController::class, 'destroy'])->name('delete');

//tags route 

//  Route::get('/tag/show/{id}', [TagController::class, 'show'])->name('tag.show');
// Route::get('/teg/create', [TagController::class, 'create'])->name('tag.create');
// Route::post('/teg/store', [TagController::class, 'store'])->name('tag.store');
 Route::get('/tag/tag/edit/{id}', [TagController::class, 'edit'])->name('tag.edit');
// Route::put('/tag/update/{id}', [TagController::class, 'update'])->name('tag.update');
// Route::post('/tag/delete/{id}', [TagController::class, 'destroy'])->name('tag.delete');

//pages route 
Route::get('/page/show/{id}', [PageController::class, 'show'])->name('page.show');
Route::get('/page/create/{id}', [PageController::class, 'create'])->name('page.create');
Route::post('/page/store', [PageController::class, 'store'])->name('page.store');
Route::get('/page/edit/{id}', [PageController::class, 'edit'])->name('page.edit');
Route::put('/page/update/{id}', [PageController::class, 'update'])->name('page.update');
Route::post('/page/delete/{id}', [PageController::class, 'destroy'])->name('page.delete');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
