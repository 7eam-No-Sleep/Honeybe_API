<?php

namespace App\Http\Controllers;

use App\Models\transactions;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    public function index()
    {
        $transactions = transactions::all();

        return response()->json($transactions);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'SaleID' => 'required',
            'CustomerID' => 'required',
            'TransactionDate' => 'required|date',
            'PaymentMethod' => 'required',
            'TotalAmount' => 'required|numeric',
            'CashReceived' => 'nullable|numeric',
            'ChangeGiven' => 'nullable|numeric',
            'CheckNumber' => 'nullable|string|max:20',
            'CreditCardNumber' => 'nullable|string|max:16',
            'ExpiryDate' => 'nullable|date'
        ]);

        $transaction = transactions::create($validatedData);

        return response()->json($transaction, 201);
    }
}