<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transactions extends Model
{
    use HasFactory;

    protected $table = 'transactions';

    protected $primaryKey = 'TransactionID';

    protected $fillable = [
        'SaleID',
        'CustomerID',
        'TransactionDate',
        'PaymentMethod',
        'TotalAmount',
        'CashReceived',
        'ChangeGiven',
        'CheckNumber',
        'CreditCardNumber',
        'ExpiryDate'
    ];

    public $timestamps = false; // Assuming you don't need timestamps for this model
}