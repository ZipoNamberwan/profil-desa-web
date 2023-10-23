<?php

use App\Http\Controllers\RowController;
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

Route::get('/', [App\Http\Controllers\RowController::class, 'index']);

Route::get('/rows/data', [App\Http\Controllers\RowController::class, 'getData']);
Route::resource('rows', RowController::class);



