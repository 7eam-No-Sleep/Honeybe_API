<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ShiftController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('customer', [CustomerController::class, 'index']);

Route::get('inventory', [InventoryController::class, 'index']);

Route::post('customer', [CustomerController::class, 'store']);

Route::post('inventory', [InventoryController::class, 'store']);

Route::get('transactions', [TransactionsController::class, 'index']);

Route::get('employees', [EmployeeController::class, 'index']);

Route::get('employee/{id}/credentials', [EmployeeController::class, 'getCredentials']);

Route::get('inventory/{ProductID}', [InventoryController::class, 'show']);

Route::post('transactions', [TransactionsController::class, 'store']);

Route::get('/customer/{ContactNumber}', [CustomerController::class, 'getByContactNumber']);

Route::get('shifts', [ShiftController::class, 'index']);

Route::post('shifts', [ShiftController::class, 'store']);