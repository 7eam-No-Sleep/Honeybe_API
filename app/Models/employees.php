<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class employees extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable;

    protected $table = 'employees'; // Correct table name

    protected $primaryKey = 'employee_id';

    protected $fillable = [
        'employee_id', // Add 'employee_id' to the fillable attributes
        'first_name', // Add 'first_name' to the fillable attributes
        'last_name', // Add 'last_name' to the fillable attributes
        'address', // Add 'address' to the fillable attributes
        'phone_number', // Add 'phone_number' to the fillable attributes
        'employee_passcode', // Add 'employee_passcode' to the fillable attributes
        'last_login', // Add 'last_login' to the fillable attributes
        'last_logout', // Add 'last_logout' to the fillable attributes
        'total_hours_worked', // Add 'total_hours_worked' to the fillable attributes
        'role'
    ];

    public $timestamps = false;

    /**
     * Validate the user's credentials.
     *
     * @param  array  $credentials
     * @return bool
     */
    public function validateCredentials(array $credentials)
    {
        $user = $this->where('employee_id', $credentials['employee_id'])->first();

        // Check if the user exists and the passwords match
        return $user && $credentials['employee_passcode'] === $user->employee_passcode;
    }
}

