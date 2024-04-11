<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Items;

class ItemsController extends Controller
{
    public function store(Request $request){
        $validatedData = $request->validate([
            'SaleID'=> 'required|integer',
            'ProductID'=>'required|integer',
            'QuantitySold'=>'required|integer',
            'PricePerItem'=>'required|numeric'
        ]);

        $items = Items::create($validatedData);

        return response()->json($items, 201);
    }
}
