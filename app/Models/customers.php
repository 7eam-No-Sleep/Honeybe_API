<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customers extends Model
{
    use HasFactory; 
    
    protected $table = 'customers';

    
    protected $primaryKey = 'CustomerID';

    protected $fillable = [
        'FirstName', 
        'LastName', 
        'ContactNumber', 
        'Email', 
        'Street1', 
        'AptNo', 
        'City', 
        'State', 
        'ZipCode', 
        'Birthdate',
    ];
    public $timestamps = false;
}
