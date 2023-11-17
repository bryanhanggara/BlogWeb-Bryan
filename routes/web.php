<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ArtikelController;
use App\Http\Controllers\Admin\CrudArtikelController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('blog', [BlogController::class,'index'])->name('blog');
Route::get('/blog/{id}', [BlogController::class, 'show'])->name('view.blog');

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function() {
    Route::get('/', [ArtikelController::class, 'index'])->name('admin.index');
    Route::resource('blog', CrudArtikelController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
