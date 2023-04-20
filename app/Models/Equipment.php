<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;
    protected $fillable = [
        'equ_code',
        'equ_name',
        'equ_unit',
        'equ_desc',
        'equ_cost',
        'equ_qty',
        'equ_picture',
        'equ_status',
        'group_id',
        'emp_name',
        'job_id'
    ];
    public function EquipmentGroup()
    {
        return $this->belongsTo(EquipmentGroup::class,'group_id');
    }
}
