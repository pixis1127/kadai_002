<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\CompanyController;

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
    return redirect('/stores');
});

Route::get('/company', [CompanyController::class, 'index'])->name('company');

Route::post('reviews', [ReviewController::class, 'store'])->name('reviews.store');

Route::get('stores/{store}/favorite', [StoreController::class, 'favorite'])->name('stores.favorite');

Route::post('reservations', [ReservationController::class, 'store'])->name('reservations.store');

Route::resource('stores', StoreController::class);
Auth::routes(['verify' => true]);

Route::controller(UserController::class)->group(function () {
    Route::get('users/mypage', 'mypage')->name('mypage');
    Route::get('users/mypage/edit', 'edit')->name('mypage.edit');
    Route::put('users/mypage', 'update')->name('mypage.update');
    Route::get('users/mypage/password/edit', 'edit_password')->name('mypage.edit_password');
    Route::put('users/mypage/password', 'update_password')->name('mypage.update_password'); 
    Route::get('users/mypage/favorite', 'favorite')->name('mypage.favorite');
});


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
