<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BalanceInformationController;

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

// Route::get('/', [OrderController::class, 'index']);  
// Route::post('/checkout', [OrderController::class, 'checkout']);  
// // Route::post('/midtrans-callback', [OrderController::class, 'callback']);  
// Route::get('/invoice/{id}', [OrderController::class, 'invoice']);   

Route::get('/migrate', function () {
    \Artisan::call('migrate');
    return \Artisan::output();
});

Route::get('/', [BalanceInformationController::class, 'index']);  
Route::get('/balance', [BalanceInformationController::class, 'index']);  

Route::get('/balance/deposit', [BalanceInformationController::class, 'deposit']);  
Route::post('/balance/topup', [BalanceInformationController::class, 'topup']);  


Route::get('/balance/withdraw', [BalanceInformationController::class, 'withdraw']);  
Route::post('/balance/withdrawal', [BalanceInformationController::class, 'withdrawal']);  


Route::get('/balance/invoice/{id}', [BalanceInformationController::class, 'invoice']);   
