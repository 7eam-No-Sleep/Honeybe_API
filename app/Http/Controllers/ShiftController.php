<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    public function index()
    {
        $shift = Shift::all();
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

        $shift = Shift::create($validatedData);
        return response()->json($shift, 201);
    }
}