<?php

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

Route::prefix('WeightedAverage')->group(function() {
    Route::get('/', 'WeightedAverageController@index');
});

Route::middleware('web', 'SetSessionData', 'auth', 'language', 'timezone', 'AdminSidebarMenu')->prefix('WeightedAverage')->group(function () {
    Route::get('dashboard', [\Modules\WeightedAverage\Http\Controllers\WeightedAverageController::class, 'dashboard']);

    //Installation routes
    Route::get('/install', [Modules\WeightedAverage\Http\Controllers\InstallController::class, 'index']);
    Route::get('/install/update', [Modules\WeightedAverage\Http\Controllers\InstallController::class, 'update']);
    Route::get('/install/uninstall', [Modules\WeightedAverage\Http\Controllers\InstallController::class, 'uninstall']);
});

