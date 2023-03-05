<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\FrontController::class, 'index'])->name('front.home');
Route::get('/volunteer-detail', [App\Http\Controllers\FrontController::class, 'detail'])->name('front.volunteer-detail');
Route::get('/vvol-social', [App\Http\Controllers\FrontController::class, 'detail'])->name('front.vvol-social');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/settings', [App\Http\Controllers\HomeController::class, 'settings'])->name('settings');
Route::post('/save-settings', [App\Http\Controllers\HomeController::class, 'saveSettings'])->name('save-settings');
Route::get('/page-content', [App\Http\Controllers\HomeController::class, 'pageContent'])->name('pageContent');
Route::post('/save-page-settings', [App\Http\Controllers\HomeController::class, 'savePageSettings'])->name('save-page-settings');


Route::get('/video-content', [App\Http\Controllers\HomeController::class, 'videoContent'])->name('videoContent');
Route::get('/delete-video/{id}', [App\Http\Controllers\HomeController::class, 'deleteVideo'])->name('delete-video');
Route::post('/save-video-settings', [App\Http\Controllers\HomeController::class, 'saveVideoSettings'])->name('save-video-settings');

Route::get('/location-pins', [App\Http\Controllers\LocationController::class, 'locationPins'])->name('location-pins');
Route::get('/delete-location-pin/{id}', [App\Http\Controllers\LocationController::class, 'deleteLocationPin'])->name('delete-location-pin');
Route::post('/save-location-pins', [App\Http\Controllers\LocationController::class, 'saveLocationPins'])->name('save-location-pins');


