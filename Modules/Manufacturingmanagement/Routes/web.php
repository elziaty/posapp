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

Route::prefix('Manufacturingmanagement')->group(function() {
    Route::get('/', 'ManufacturingmanagementController@index');
});

Route::middleware('web', 'SetSessionData', 'auth', 'language', 'timezone', 'AdminSidebarMenu')->prefix('Manufacturingmanagement')->group(function () {
    Route::get('dashboard', [\Modules\Manufacturingmanagement\Http\Controllers\ManufacturingmanagementController::class, 'dashboard']);

    //Installation routes
    Route::get('/install', [Modules\Manufacturingmanagement\Http\Controllers\InstallController::class, 'index']);
    Route::get('/install/update', [Modules\Manufacturingmanagement\Http\Controllers\InstallController::class, 'update']);
    Route::get('/install/uninstall', [Modules\Manufacturingmanagement\Http\Controllers\InstallController::class, 'uninstall']);
});

