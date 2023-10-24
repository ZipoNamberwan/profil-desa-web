<?php

use App\Http\Controllers\CharacteristicController;
use App\Http\Controllers\IndicatorController;
use App\Http\Controllers\PeriodController;
use App\Http\Controllers\RowController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UnitController;
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

Route::get('/', [RowController::class, 'index']);

Route::get('/rows/data', [RowController::class, 'getData']);
Route::resource('rows', RowController::class);

Route::get('/characteristics/data', [CharacteristicController::class, 'getData']);
Route::resource('characteristics', CharacteristicController::class);

Route::get('/periods/data', [PeriodController::class, 'getData']);
Route::resource('periods', PeriodController::class);

Route::get('/units/data', [UnitController::class, 'getData']);
Route::resource('units', UnitController::class);

Route::get('/subjects/data', [SubjectController::class, 'getData']);
Route::resource('subjects', SubjectController::class);

Route::get('/indicators/data', [IndicatorController::class, 'getData']);
Route::resource('indicators', IndicatorController::class);



