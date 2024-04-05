<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transactions extends Model
{
    use HasFactory;

    protected $table = 'transactions';

    protected $fillable = [
        'SaleID',
        'CustomerID',
        'TransactionDate',
        'PaymentMethod',
        'Total Amount'
    ];

    public $timestamps = false;
}