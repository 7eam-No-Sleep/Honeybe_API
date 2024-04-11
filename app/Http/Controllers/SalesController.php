<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sales;

class SalesController extends Controller
{
    public function store(Request $request){
        $validatedData = $request->validate([
            'CustomerID' => 'nullable|integer', // Assuming nullable and integer type for CustomerID
            'SaleDate' => 'required|date', // SaleDate is required and should be a date
            'ItemsSold' => 'required|integer', // ItemsSold is required and should be an integer
            'TotalPrice' => 'required|numeric|between:0,9999999.99', // TotalPrice is required and should be a numeric value within a specific range
            'Discount' => 'nullable|numeric', // Assuming nullable and numeric type for Discount
            'employee_id' => 'nullable|integer', // Assuming nullable and integer type for employee_id
        ]);
    
        $sale = Sales::create($validatedData);
    
        return response()->json($sale, 201);
    }
}
