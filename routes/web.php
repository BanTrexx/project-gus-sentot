<?php

use App\Http\Controllers\DistrictController;
use App\Http\Controllers\VillageController;
use App\Http\Controllers\CoordinatorController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::controller(DistrictController::class)->group(function() {
    Route::get('district', 'index');
    Route::get('district/add', 'addDistrict');
});
Route::controller(VillageController::class)->group(function() {
    Route::get('village', 'index');
    Route::get('village/add', 'addVillage');
});
Route::controller(CoordinatorController::class)->group(function() {
    Route::get('coordinator', 'index');
    Route::get('coordinator/add', 'addCoordinator');
});