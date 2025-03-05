<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
Route::get('/', function () {
    return view('welcome');
});


Route::get("/dashboard",            [DashboardController::class, "index"])->name('dashboard');
Route::get("/employee",             [EmployeeController::class, "index"])->name('employee');
Route::get("/employee/search",      [EmployeeController::class, "search"])->name('employee_search');
Route::get("/employee/create",      [EmployeeController::class, "create"])->name('employee_create');
Route::post("/employee/create",     [EmployeeController::class, "store"])->name('employee_store');
Route::get("/employee/edit/{id}",   [EmployeeController::class, "edit"])->name('employee_edit');
Route::post("/employee/edit/{id}",  [EmployeeController::class, "update"])->name('employee_update');
Route::get("/employee/delete/{id}", [EmployeeController::class, "destroy"])->name('employee_delete');
