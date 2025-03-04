<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
Route::get('/', function () {
    return view('welcome');
});


Route::get("/dashboard", [DashboardController::class, "index"])->name('dashboard');
Route::get("/employee", [EmployeeController::class, "index"])->name('employee');
Route::get("/employee/create", [EmployeeController::class, "create"])->name('employee.create');