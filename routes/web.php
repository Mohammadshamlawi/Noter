<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/home', [HomeController::class, 'index']);
Route::get('/{item}', [HomeController::class, 'index'])->name('index');
Route::get('/{item}/create', [HomeController::class, 'create'])->name('create');
Route::post('/{item}', [HomeController::class, 'store'])->name('store');
Route::get('/{item}/{id}', [HomeController::class, 'show'])->name('show');
Route::get('/{item}/{id}/edit', [HomeController::class, 'edit'])->name('edit');
Route::patch('/{item}/{id}', [HomeController::class, 'update'])->name('update');
Route::delete('/{item}/{id}', [HomeController::class, 'destroy'])->name('destroy');

Route::view('/welcome', 'welcome');
Route::view('/test', 'test');

Route::fallback([HomeController::class, 'index']);
