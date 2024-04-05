<?php

require_once __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';

// Set up the application
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\employees;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

try {
    $employees = employees::all();

    foreach ($employees as $employee) {
        // Check if the password is already hashed
        if (!Hash::needsRehash($employee->password)) {
            // Hash the password
            $hashedPassword = bcrypt($employee->password);

            // Update the employee record with the hashed password
            $employee->password = $hashedPassword;
            $employee->save();
        }
    }

    Log::info('Password hashing completed successfully.');
} catch (\Exception $e) {
    Log::error('An error occurred while hashing passwords: ' . $e->getMessage());
}
