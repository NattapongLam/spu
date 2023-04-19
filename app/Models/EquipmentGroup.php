<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipmentGroup extends Model
{
    use HasFactory;
    protected $fillable = [
        'grou_code',
        'grou_name',
        'emp_name',
        'grou_status'
    ];
}
