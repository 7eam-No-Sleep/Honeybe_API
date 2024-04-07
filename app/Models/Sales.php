<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $table = 'sales';

    protected $primaryKey = 'SaleID';

    protected $fillable = [
        'CustomerID',
        'SaleDate',
        'ItemsSold',
        'TotalPrice',
        'employee_id'
    ];

    public $timestamps = false;
}