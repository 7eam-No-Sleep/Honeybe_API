<?php

namespace App\Http\Controllers;

use App\Models\shift;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    public function index()
    {
        $shift = shift::all();
        return response()->json($shift);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'employee_id' => 'required|integer',
            'shift_time' => 'required|numeric',
            'shift_date' => 'required|date',
            'total_transactions' => 'required|integer',
            'total_cash' => 'nullable|numeric',
            'total_checks' => 'nullable|numeric',
            'total_card_sales' => 'nullable|numeric',
            'total_sales' => 'nullable|numeric',
        ]);

        $shift = shift::create($validatedData);
        return response()->json($shift, 201);
    }
    public function show($shift_id){
        $shift = shift::findOrFail($shift_id);
        return response()->json($shift);
    }
    public function updateShift(Request $request, $shift_id){
        $shift = shift::find($shift_id);
        if (!$shift){
            return response()->json(['error' => 'Shift not found'], 404);
        }
        $shift ->update($request->all());
        return response()->json(['message'=>'shift updated successfully'], 200 );

    }
}