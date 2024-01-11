<?php

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

Route::controller(EmployeeController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/employee/{id}', 'show');

    Route::get('/employee-add', 'create');
    Route::post('/employee', 'store');

    Route::get('/employee-edit/{id}', 'edit');
    Route::put('/employee/{id}', 'update');

    Route::put('/employee/{id}', 'update');

    Route::delete('/employee-destroy/{id}', 'destroy');
});

Route::get('/jobs', [JobController::class,'index']);
