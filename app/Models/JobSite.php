<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSite extends Model
{
    use HasFactory;
    protected $fillable = [
        'job_code',
        'job_name',
        'emp_name',
        'job_status'
    ];
}
