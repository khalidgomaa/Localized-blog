<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\SettingController;

Route::get('/', function () {
    return view('dashboard.index');
});

Route::prefix('dashboard')->name('dashboard.')->group(function () {
    Route::view('/settings', 'dashboard.settings')->name('settings');
    Route::POST('/settings/update', [SettingController::class, 'update'])->name('settings.update');

});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
