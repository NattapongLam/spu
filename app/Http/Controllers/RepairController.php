<?php

namespace App\Http\Controllers;

use App\Models\Repair;
use Illuminate\Http\Request;

class RepairController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function repday(Request $request)
    {
        $dateend = $request->dateend ? $request->dateend : date("Y-m-d");
        $datestart = $request->datestart ? $request->datestart : date("Y-m-d",strtotime("-1 month",strtotime($dateend)));
        $data = Repair::leftjoin('repair_statuses','repairs.sta_id','=','repair_statuses.id')
        ->leftjoin('job_sites','repairs.job_id','=','job_sites.id')
        ->select('repairs.*','repair_statuses.name as sta_name','job_sites.job_name as job_name')
        ->whereBetween('rep_date',[$datestart,$dateend])->get();
        return view('repairreport.repairreport-day',[
            'dateend' => $dateend,
            'datestart' => $datestart,
            'data' => $data,
        ]);
    }
}
