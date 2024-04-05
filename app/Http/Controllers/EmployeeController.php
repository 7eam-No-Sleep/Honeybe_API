<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\employees;
use Illuminate\Support\Facades\Auth;


class EmployeeController extends Controller
{
    public function index(){
        $employee = employees::all();

        return response() -> json($employee);
    }
    public function getCredentials($id, Request $request)
{
    // Retrieve employee by ID
    $employee = employees::findOrFail($id);

    // Validate password (not needed for plain text passwords)
    if ($employee->password === $request->password) {
        // Password matches, generate token
        $token = $this->generateToken($employee);

        // Token generated successfully, return token and user role
        return response()->json([
            'token' => $token,
            'role' => $employee->role,
        ]);
    } else {
        // Password does not match, return error
        return response()->json([
            'error' => 'Unauthorized',
        ], 401);
    }
}

private function generateToken($employee)
{
    // Generate a unique token for the employee
    $token = bin2hex(random_bytes(32));

    // Store the token in the database or wherever you want to store it
    // For simplicity, you can just return the token without storing it

    return $token;
}
}