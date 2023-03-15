<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaymentController;
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
        Route::get('logout', 'logout')->name('login.logout');
    });
    Route::controller(CompanyController::class)->group(function () {
        Route::get('company', 'create')->name('company.create');
        Route::post('company', 'store')->name('company.store');
    });
    Route::controller(InvoiceController::class)->group(function () {
        Route::get('invoices/create', 'create')->name('invoices.create');
        Route::post('invoices', 'store')->name('invoices.store');
        Route::get('invoices/create/massive', 'massive')->name('invoices.massive');
        Route::post('invoices/massive', 'storeMassive')->name('invoices.store.massive');
        Route::get('invoices', 'index')->name('invoices.index');
    });
    Route::controller(PaymentController::class)->group(function () {
        Route::get('payments', 'index')->name('payments.index');
    });
});
