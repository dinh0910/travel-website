<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HotelController;
use App\Http\Controllers\Admin\HotelPageController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\JourneyController;
use App\Http\Controllers\Admin\LogController;
use App\Http\Controllers\Admin\PlaceController;
use App\Http\Controllers\Admin\TourController;
use App\Http\Controllers\Admin\TourPageController;
use App\Models\Place;
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
});

Route::prefix('login-admin')->middleware('log')->group(function () {
  Route::get('/login-admin', [AdminController::class, 'login'])->name('admin.login');
  Route::post('/login-admin', [AdminController::class, 'postLoginAdmin']);
});

Route::prefix('admin')->middleware('admin')->group(function () {
  Route::middleware('log')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.index');
    Route::get('/library', [ImageController::class, 'library'])->name('admin.library');
    Route::get('/upload-image', [ImageController::class, 'index'])->name('admin.image');
    Route::post('/upload-image', [ImageController::class, 'upload'])->name('admin.upload');
    Route::delete('/library', [ImageController::class, 'destroy'])->name('image.delete');

    //Places
    Route::resource('place', PlaceController::class);

    //Hotels
    Route::resource('hotel', HotelController::class);
    Route::get('/hotelpage', [HotelController::class, 'hotelPage'])->name('hotelpage.index');
    Route::post('/hotelpage', [HotelController::class, 'createHotelPage'])->name('hotelpage.create');
    Route::put('/hotelpage/{id}', [HotelPageController::class, 'updateHotelPage'])->name('hotelpage.update');
    Route::put('/hotel-page/{id}', [HotelPageController::class, 'updateHotelPg'])->name('hotelpage.update.hp');
    Route::delete('/hotelpage/{hotelpage}', [HotelPageController::class, 'destroy'])->name('hotelpage.destroy');

    //Tours
    Route::resource('tour', TourController::class);
    Route::get('/tourpage', [TourController::class, 'tourPage'])->name('tour.tourpage');
    Route::post('/tourpage', [TourController::class, 'createTourPage'])->name('tourpage.create');
    Route::put('/tourpage/{id}', [TourPageController::class, 'updateTourPage'])->name('tourpage.update');
    Route::put('/tour-page/{id}', [TourPageController::class, 'updateTourPg'])->name('tourpage.update.tp');
    Route::delete('/tourpage/{tourpage}', [TourPageController::class, 'destroy'])->name('tourpage.destroy');

    //Logs
    Route::get('/log', [LogController::class, 'index'])->name('admin.log');
  });
});
