<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactionDetailController;
use App\Http\Controllers\SerialNumberController;
use App\Http\Controllers\ReportController;

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

Route::get('/login', [AuthManager::class, "login"])->name ('login');
Route::post('/login', [AuthManager::class, "loginPost"])->name ('login.post');

Route::get('/registration', [AuthManager::class, "registration"])->name('registration');
Route::post('/registration', [AuthManager::class, "registrationPost"])->name ('registration.post');

Route::get('/logout', [AuthManager::class, "logout"])->name('logout');

Route::middleware(['can:manage-items'])->group(function () {
    Route::resource('/items', ItemController::class);
});

Route::middleware(['can:manage-transaction'])->group(function () {
    Route::resource('/transactions', TransactionController::class);
});

Route::middleware(['can:manage-serialnumber'])->group(function () {
    Route::resource('/serial_numbers', SerialNumberController::class);
});

Route::middleware(['can:manage-transactiondetail'])->group(function () {
    Route::resource('/transaction_details', TransactionDetailController::class);
});

Route::middleware(['can:access-reports'])->group(function () {
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
});

Route::get('/graphs', [TransactionController::class, 'graphs'])->name('transactions.graphs');

