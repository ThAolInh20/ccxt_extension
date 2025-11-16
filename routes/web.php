<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BinanceController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/ticker/{base}/{quote}', [BinanceController::class, 'ticker']);
Route::post('/order/{base}/{quote}', [BinanceController::class, 'order']);
Route::get('/balance', [BinanceController::class, 'balance']);
