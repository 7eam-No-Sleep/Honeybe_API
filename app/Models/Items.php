<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    use HasFactory;
    
    protected $table = 'items_sold';

    protected $fillable = [
        'SaleID',
        'ProductID',
        'QuantitySold',
        'PricePerItem'
    ];
    public $timestamps = false; // Assuming you don't need timestamps for this model
}
