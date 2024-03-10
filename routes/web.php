<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ImageController;
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

Route::get('/', function () {
  return view('welcome');
})->middleware('log');



Route::prefix('login-admin')->middleware('log')->group(function () {
  Route::get('/login-admin', [AdminController::class, 'login'])->name('admin.login');
  Route::post('/login-admin', [AdminController::class, 'postLoginAdmin']);
});

Route::prefix('admin')->middleware('admin')->group(function () {
  Route::middleware('log')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.index');
    Route::get('/images', [ImageController::class, 'index'])->name('admin.image');
  });
});
