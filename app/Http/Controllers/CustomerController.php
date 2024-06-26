<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customers; // Change the import to use the correct model name

class CustomerController extends Controller
{
    public function index()
    {
        $customers = customers::all(); // Adjust the model name here

        return response()->json($customers);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'FirstName' => 'required|string|max:255',
            'LastName' => 'required|string|max:255',
            'ContactNumber' => 'required|string|max:20',
            'Email' => 'nullable|string|email|max:255',
            'Street1' => 'nullable|string|max:255',
            'AptNo' => 'nullable|string|max:50',
            'City' => 'nullable|string|max:100',
            'State' => 'nullable|string|max:100',
            'ZipCode' => 'nullable|string|max:20',
            'Birthdate' => 'nullable|date',
        ]);

        $customer = customers::create($validatedData); // Adjust the model name here

        return response()->json(['message' => 'Customer created successfully', 'customer' => $customer], 201);
    }

    public function getByContactNumber($ContactNumber){
        $customer = customers::where('ContactNumber', $ContactNumber)->first();
        if(!$customer) {
            return response()->json(['message' => 'Customer not found'], 404);
        }
        return response()->json($customer);
    }
    public function show($CustomerID){
        $customers = customers::findOrFail($CustomerID);
        return response()->json($customers);
    }

    public function updateCustomer(Request $request, $id){
        $customer = customers::find($id);
        if (!$customer){
            return response()->json(['error' => 'Customer not found'], 404);
        }
        $customer ->update($request->all());
        return response()->json(['message'=>'Customer updated successfully'], 200);
    }
}
