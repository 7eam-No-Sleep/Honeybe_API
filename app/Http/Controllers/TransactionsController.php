<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\transactions;

class TransactionsController extends Controller
{
    public function index(){
        $transactions = transactions::all();

        return response() -> json($transactions);
    }
}