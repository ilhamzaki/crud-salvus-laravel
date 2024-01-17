<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/login', [AuthController::class,'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class,'auth']);
Route::get('/logout', [AuthController::class,'logout'])->middleware('auth');

Route::controller(EmployeeController::class)->group(function () {
    Route::get('/', 'index')->middleware('auth');
    Route::get('/employee/{id}', 'show')->middleware('auth');

    Route::get('/employee-add', 'create')->middleware('auth');
    Route::post('/employee', 'store')->middleware('auth');

    Route::get('/employee-edit/{id}', 'edit')->middleware('auth');
    Route::put('/employee/{id}', 'update')->middleware('auth');

    Route::put('/employee/{id}', 'update')->middleware('auth');

    Route::delete('/employee-destroy/{id}', 'destroy')->middleware('auth');
});

Route::get('/jobs', [JobController::class,'index'])->middleware('auth');
