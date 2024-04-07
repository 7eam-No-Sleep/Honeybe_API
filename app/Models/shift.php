<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;

    protected $table = 'shift';

    protected $fillable = [
        'employee_id',
        'shift_time',
        'shift_date',
        'total_transactions',
        'total_cash',
        'total_checks',
        'total_card_sales',
        'total_sales',
    ];
}