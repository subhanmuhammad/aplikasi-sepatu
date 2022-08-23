<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\SepatuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingpageController;
use Illuminate\Routing\Route as RoutingRoute;

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

// Route::get('/', function () {
//     return view('welcome');
// });




Route::get('/', [LandingpageController::class, 'index'])->name('landingpage');

Route::get('/banner/store', [BannerController::class, 'store']);
// Route::get("/sepatu", [SepatuController::class, 'index']);

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::post('/post_login', 'authenticate')->name('post_login');
    Route::get('logout', 'logout');
});


Route::group(['middleware' => 'Auth'], function () {
    Route::group(['midleware' => ['CekUserLogin :admin']], function () {
        Route::get('/dashboard', [DashboardController::class, 'index']);
        Route::controller(SepatuController::class)->group(function () {
            Route::get('/sepatu', 'index');
            Route::get('/sepatu/store', 'store');
            Route::delete('/sepatu/{id}', 'destroy');
        });
    });
    Route::group(['midleware' => ['CekUserLogin :user']], function () {
        Route::get('/dashboard', [DashboardController::class, 'index']);
        Route::controller(SepatuController::class)->group(function () {
            Route::get('/sepatu', 'index');
        });
    });
});
