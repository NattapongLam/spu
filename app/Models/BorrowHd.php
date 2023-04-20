<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowHd extends Model
{
    use HasFactory;
    protected $fillable = [
        'borr_hd_date',
        'borr_hd_docuno',
        'borr_hd_number',
        'borr_hd_desc',
        'borr_hd_status',
        'stc_job_id',
        'req_job_id',
        'emp_name',
        'app_name',
        'sta_id',
        'app_reamrk'
    ];
    public function equs()
    {
        return $this->hasMany(BorrowDt::class,'borrhd_id');
    }
}
