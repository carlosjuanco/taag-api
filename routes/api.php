<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;

Route::post('login', [AuthController::class, 'login']);
Route::get('check', [AuthController::class, 'check']);
Route::post('logout', [AuthController::class, 'logout']);

Route::resource('users', UserController::class)->only(['store']);

Route::get('companies/get-all-companies', [CompanyController::class, 'getAllCompanies'])
	->name('companies-get-all-companies.getAllCompanies');
Route::get('companies', [CompanyController::class, 'index'])->name('companies.index');
Route::resource('companies', CompanyController::class)->only(['store', 'update', 'destroy']);

Route::get('employees', [EmployeeController::class, 'index'])->name('employees.index');
Route::resource('employees', EmployeeController::class)->only(['store', 'update', 'destroy']);
