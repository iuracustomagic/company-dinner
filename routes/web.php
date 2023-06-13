<?php

use App\Http\Controllers\ExcelImportController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\PrintController;
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

Route::get('/', [HomeController::class, 'show']);
Route::get('/repeat', [HomeController::class, 'repeat']);
Route::post('/check', [HomeController::class, 'check'])->name('check');
Route::post('/repeat-check', [HomeController::class, 'repeatCheck'])->name('repeat-check');
Route::post('/upload', [ExcelImportController::class, 'upload'])->name('upload');
Route::get('/orders','PrintController@index');
Route::get('/print-view',[PrintController::class, 'printView'])->name('print-view');
