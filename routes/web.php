<?php

use App\Http\Controllers\DistrictController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VillageController;
use App\Http\Controllers\CoordinatorController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SupporterController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\Auth\CoordinatorAuthController;
use App\Http\Controllers\ResponsibleController;

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

Auth::routes();

Route::get('/', function () {
    return redirect('/home');
});


//Route::get('register/coordinator', [CoordinatorAuthController::class, 'register'])->name('register.coordinator');
//Route::post('register/coordinator', [CoordinatorAuthController::class, 'registered'])->name('register.coordinator');


Route::middleware('auth.multiple')->group(function () {
    Route::prefix('home')->group(function () {
        Route::get('', [HomeController::class, 'index'])->name('home');
        Route::get('{id}', [HomeController::class, 'show'])->name('home.show');
    });

    Route::resource('district', DistrictController::class);
    Route::resource('village', VillageController::class);
    Route::resource('coordinator', CoordinatorController::class);
    Route::resource('supporter', SupporterController::class);
    Route::resource('responsible', ResponsibleController::class);

    Route::get('export/voter-list', [ExportController::class, 'exportVoterList'])->name('export.voter-list.index');
    Route::post('export/voter-list', [ExportController::class, 'exportedVoterList'])->name('export.voter-list.store');
});
