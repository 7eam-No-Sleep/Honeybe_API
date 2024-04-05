<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\inventory;

class InventoryController extends Controller
{
    public function index(){
        $inventory = inventory::all();

        return response() -> json($inventory);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'ProductName'=>'required|string|max:255',
            'Category'=>'required|string|max:255',
            'Description'=>'nullable|string|max:255',
            'Material'=>'nullable|string|max:255',
            'Size'=>'nullable|string|max:10',
            'Color'=>'nullable|string|max:50',
            'CostPrice'=>'required|numeric|min:0',
            'SellingPrice'=>'required|numeric|min:0',
            'QuantityInStock'=>'required|integer|min:0'
        ]);

        $inventory = inventory::create($validatedData);
        
        return response()->json(['message'=>'Product created successfully', 'inventory' => $inventory], 201);
     }
     public function show($ProductID){
        $inventory = inventory::findOrFail($ProductID);
    
        return response()->json($inventory);
    }
}
