<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inventory extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $primaryKey = 'ProductID';

    protected $fillable=[
        'ProductName',
        'Category',
        'Description',
        'Material',
        'Size',
        'Color',
        'CostPrice',
        'SellingPrice',
        'QuantityInStock'
    ];
    public $timestamps = false;
}