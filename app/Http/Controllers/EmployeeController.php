<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employees;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = employees::all();
        return response()->json($employees);
    }

    public function getCredentials($id, Request $request)
    {
        // Retrieve employee by ID
        $employee = employees::findOrFail($id);
    
        // Validate password (not needed for plain text passwords)
        if ($employee->employee_passcode === $request->password) {
            // Update last_login
            $employee->last_login = now();
            $employee->save();
    
            // Generate token
            $token = $this->generateToken($employee);
    
            // Token generated successfully, return token and user role
            return response()->json([
                'token' => $token,
                'role' => $employee->role,
                'userID'=> $employee->employee_id
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
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'employee_passcode' => 'required|string|max:255',
            'role' => 'required|string|in:manager,sales',
        ]);

        // Create a new employee record
        $employee = employees::create($validatedData);

        // Return the created employee as JSON response
        return response()->json($employee, 201);
    }
    public function updateLogoutTime($id)
    {
        // Find the employee by ID
        $employee = employees::find($id);

        // Check if the employee exists
        if (!$employee) {
            return response()->json(['error' => 'Employee not found'], 404);
        }

        // Update the last_logout field
        $employee->last_logout = now(); // Use Laravel's now() helper to get the current date and time

        // Save the changes to the database
        $employee->save();

        // Return a success response
        return response()->json(['message' => 'Logout time updated successfully'], 200);
    }
}