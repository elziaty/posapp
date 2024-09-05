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

Route::prefix('GiftCard')->group(function() {
    Route::get('/', 'GiftCardController@index');
});

Route::middleware('web', 'SetSessionData', 'auth', 'language', 'timezone', 'AdminSidebarMenu')->prefix('GiftCard')->group(function () {
    Route::get('dashboard', [\Modules\GiftCard\Http\Controllers\GiftCardController::class, 'dashboard']);

    //Installation routes
    Route::get('/install', [Modules\GiftCard\Http\Controllers\InstallController::class, 'index']);
    Route::get('/install/update', [Modules\GiftCard\Http\Controllers\InstallController::class, 'update']);
    Route::get('/install/uninstall', [Modules\GiftCard\Http\Controllers\InstallController::class, 'uninstall']);
});

