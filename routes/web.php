<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;

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

Route::controller(App\Http\Controllers\Controller::class)->group( function () {

    Route::get('/', function () {
        if (request()->search) {
            $search = User::where('name', 'like', '%' . request()->search . '%')->get();
            return view('welcome')->with('search', $search);
        }
        else {
            return view('welcome');
        }
    });
});
