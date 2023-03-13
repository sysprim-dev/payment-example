<?php

use App\Http\Controllers\DocumentController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

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
})->name('home');

Route::name('documentations.')->prefix('documentations')->group(function () {
    Route::controller(LoginController::class)->group(function () {
        Route::get('login', 'create')->name('login.create');
        Route::post('login', 'store')->name('login.store');
    });
});
