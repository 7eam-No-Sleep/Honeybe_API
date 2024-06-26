<?php

use App\Http\Controllers\ItemsController;
use App\Http\Controllers\SalesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\CardsController;



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

Route::get('customers', [CustomerController::class, 'index']);

Route::get('inventory', [InventoryController::class, 'index']);

Route::post('customers', [CustomerController::class, 'store']);

Route::post('inventory', [InventoryController::class, 'store']);

Route::get('transactions', [TransactionsController::class, 'index']);

Route::get('employees', [EmployeeController::class, 'index']);

Route::get('employee/{id}/credentials', [EmployeeController::class, 'getCredentials']);

Route::get('inventory/{ProductID}', [InventoryController::class, 'show']);

Route::post('transactions', [TransactionsController::class, 'store']);

Route::get('/customers/{ContactNumber}', [CustomerController::class, 'getByContactNumber']);

Route::get('shift', [ShiftController::class, 'index']);

Route::post('shift', [ShiftController::class, 'store']);

Route::post('employees', [EmployeeController::class, 'store']);

Route::put('/employee/{id}/logout', [EmployeeController::class, 'updateLogoutTime']);

Route::put('/inventory/products/{id}', [InventoryController::class, 'updateProduct']);

Route::get('customers/{CustomerID}', [CustomerController::class, 'show']);

Route::put('customers/{id}', [CustomerController::class,'updateCustomer']);

Route::get('cards', [CardsController::class, 'index']);

Route::post('cards', [CardsController::class, 'store']);

Route::put('cards/{CardNumber}', [CardsController::class, 'updateCard']);

Route::get('cards/{CardNumber}', [CardsController::class, 'show']);

Route::post('sales', [SalesController::class, 'store']);

Route::post('items_sold', [ItemsController::class, 'store']);

Route::get('transactions/{TransactionID}', [TransactionsController::class, 'show']);

Route::get('items_sold/{SaleID}', [ItemsController::class, 'show']);

Route::patch('/employees/{employee_id}/hours', [EmployeeController::class, 'updateHours']);

Route::get('shift/{shift_id}', [ShiftController::class, 'show']);

Route::put('shift/{shift_id}', [ShiftController::class,'updateShift']);

