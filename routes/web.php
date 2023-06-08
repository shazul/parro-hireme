<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\PositionController;
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

Route::view('/', 'home');
Route::resource('companies', CompanyController::class)->except([
    'edit', 'update', 'destroy'
]);
Route::resource('clients', ClientController::class)->except([
    'show', 'edit', 'update'
]);
Route::resource('positions', PositionController::class)->except([
    'show', 'edit', 'update', 'destroy'
]);

Route::post('positions/{position}/hire', [PositionController::class, 'hire'])->name('positions.hire');
