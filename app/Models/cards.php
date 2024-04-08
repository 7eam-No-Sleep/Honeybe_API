<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cards extends Model
{
    use HasFactory;

    protected $table = 'cards';

    protected $primaryKey = 'CardNumber';

    protected $fillable =[
        'Balance',
        'Status'
    ];
    public $timestamps = false;
}
