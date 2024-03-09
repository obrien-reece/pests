<?php

use App\Http\Controllers\FarmController;
use App\Http\Controllers\PestInfoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\Analytics;
use App\Http\Controllers\pages\AccountSettingsAccount;
use App\Http\Controllers\pages\AccountSettingsNotifications;
use App\Http\Controllers\pages\AccountSettingsConnections;
use App\Http\Controllers\PestController;

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

  Route::group(['prefix' => 'pests/'], function() {
    Route::get('{farmer}/{location}/', [PestController::class, 'index'])->name('index-of-pests');
    Route::get('{pest}', [PestController::class, 'show'])->name('show-pest');
    Route::get('upload/{id}', [PestInfoController::class, 'create'])->name('store-pest');
    Route::get('', [PestInfoController::class, 'showpests'])->name('showpests');
  });

  Route::get('/pages/pest/upload/{id}', [PestInfoController::class, 'index'])->name('pest-info-upload');

  // pages
  Route::get('/pages/account-settings-account', [AccountSettingsAccount::class, 'index'])->name('pages-account-settings-account');
  Route::patch('/pages/account-settings-account', [AccountSettingsAccount::class, 'update'])->name('pages-account-settings-account-update');
  Route::delete('/pages/account-settings-account/{id}', [AccountSettingsAccount::class, 'destroy'])->name('pages-account-settings-account-delete');
  Route::get('/pages/account-settings-notifications', [AccountSettingsNotifications::class, 'index'])->name('pages-account-settings-notifications');
  Route::get('/pages/account-settings-connections', [AccountSettingsConnections::class, 'index'])->name('pages-account-settings-connections');

  Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

});
