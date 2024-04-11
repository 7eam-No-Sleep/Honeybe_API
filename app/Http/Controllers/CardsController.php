<?php

namespace App\Http\Controllers;
use App\Models\cards;
use Illuminate\Http\Request;

class CardsController extends Controller
{
    public function index(){
        $cards = cards::all();
        return response()->json($cards);
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'Balance'=>'required|integer',
            'Status'=>'required|string|in:Active, Inactive'
        ]);

        $cards = cards::create($validatedData);
        return response()->json($cards, 201);
    }
    public function updateCard(Request $request, $CardNumber){
        $cards = cards::find($CardNumber);
        if(!$cards){
            return response()->json(['error'=>'Card Not Found'], 404);
        }
        $cards ->update($request->all());
        return response()->json(['message'=>'Card Updated Successfully'], 200);
    }
    public function show ($CardNumber){
        $cards = cards::findOrFail($CardNumber);
        return response()->json($cards);
    }
}
