<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('employee_id', 'password');
        
        // Use the 'employees' guard for authentication
        if (Auth::guard('employees')->attempt($credentials)) {
            // Authentication successful
            $user = Auth::guard('employees')->user();
            $token = $user->createToken('authToken', ['employee_info' => $user])->accessToken;
            return response()->json(['token' => $token], 200);
        } else {
            // Authentication failed
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
}
