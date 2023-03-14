<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/pacientes/list',[App\Http\Controllers\PacienteController::class, 'list']);
Route::get('/pacientes/CEP',[App\Http\Controllers\PacienteController::class, 'getCEP']);

Route::post('/pacientes/upload', [App\Http\Controllers\PacienteController::class,'upload_csv_file'])->name('upload');

Route::resource('pacientes',App\Http\Controllers\PacienteController::class)->only(['index','store','show','update','destroy']);

