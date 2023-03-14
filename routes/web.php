<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
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
});

Auth::routes();



Route::middleware(['auth:web','config_web'])->group(function() {
    Route::get('/changeLang/{lang}', [HomeController::class, 'changeLang'])->name('changeLang');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('product', ProductController::class);
    Route::resource('category', CategoryController::class);
});
