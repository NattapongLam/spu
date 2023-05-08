<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repair extends Model
{
    use HasFactory;
    protected $fillable = [
        'rep_date',
        'rep_docuno',
        'rep_number',
        'sta_id',
        'job_id',
        'equ_id',
        'equ_name',
        'rep_desc',
        'emp_name',
        'app_name',
        'app_reamrk',
        'equ_guarantee',
        'rep_timeline',
        'rep_cost',
        'rep_vendor',
        'fin_remark'
    ];
}
