<?php

use App\Http\Controllers\DistrictController;
use App\Http\Controllers\VillageController;
use App\Http\Controllers\CoordinatorController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SupporterController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('district', DistrictController::class);
Route::resource('village', VillageController::class);
Route::resource('coordinator', CoordinatorController::class);
Route::resource('supporter', SupporterController::class);
