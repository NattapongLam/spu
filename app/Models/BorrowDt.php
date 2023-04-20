<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowDt extends Model
{
    use HasFactory;
    protected $fillable = [
        'borrhd_id',
        'equ_id',
        'equ_qty',
        'equ_name'
    ];
}
