<?php

use App\Http\Controllers\FarmController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\Analytics;
use App\Http\Controllers\pages\AccountSettingsAccount;
use App\Http\Controllers\pages\AccountSettingsNotifications;
use App\Http\Controllers\pages\AccountSettingsConnections;
use App\Http\Controllers\pages\MiscError;
use App\Http\Controllers\pages\MiscUnderMaintenance;

Auth::routes();


Route::group(['middleware' => 'auth'], function() {

  // Quiz for farmers when they register
  Route::group(['as' => 'farmer.quiz.', 'prefix' => 'farmerquiz/'], function() {
    Route::get('stepone', [FarmController::class, 'stepone'])->name('stepone.farm');
    Route::post('stepone', [FarmController::class, 'submitstepone'])->name('stepone.store');
    Route::get('steptwo', [FarmController::class, 'steptwo'])->name('steptwo.pesthistory');
    Route::post('steptwo', [FarmController::class, 'submitsteptwo'])->name('steptwo.store');
    Route::get('stepthree', [FarmController::class, 'stepthree'])->name('stepthree.pesthistory');
    Route::post('stepthree', [FarmController::class, 'submitsstepthree'])->name('stepthree.store');
    Route::get('farmersanswers', [FarmController::class, 'farmersanswers'])->name('farmersanswers');
    Route::post('farmersanswers', [FarmController::class, 'confirmfarmersanswers'])->name('confirmfarmersanswers');
  });


  // Main Page Route
  Route::get('/', [Analytics::class, 'index'])->name('dashboard-analytics');

  // pages
  Route::get('/pages/account-settings-account', [AccountSettingsAccount::class, 'index'])->name('pages-account-settings-account');
  Route::post('/pages/account-settings-account', [AccountSettingsAccount::class, 'update'])->name('pages-account-settings-account-update');
  Route::get('/pages/account-settings-notifications', [AccountSettingsNotifications::class, 'index'])->name('pages-account-settings-notifications');
  Route::get('/pages/account-settings-connections', [AccountSettingsConnections::class, 'index'])->name('pages-account-settings-connections');
  Route::get('/pages/misc-error', [MiscError::class, 'index'])->name('pages-misc-error');
  Route::get('/pages/misc-under-maintenance', [MiscUnderMaintenance::class, 'index'])->name('pages-misc-under-maintenance');

  Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

});
