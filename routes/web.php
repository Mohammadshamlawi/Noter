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
Route::get('/{item}', [HomeController::class, 'index'])->name('main');

// Route::get('/notes', [HomeController::class, 'notes'])->name('notes');
// Route::get('/projects', [HomeController::class, 'projects']);
// Route::get('/collections', [HomeController::class, 'collections']);

Route::view('/welcome', 'welcome');
Route::view('/test', 'test');

Route::fallback([HomeController::class, 'index']);