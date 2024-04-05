<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class employees extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable;

    protected $table = 'employee';

    protected $primaryKey = 'employee_id';

    protected $fillable = [
        'password',
        'full_name',
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
        return $user && $credentials['password'] === $user->password;
    }
}


