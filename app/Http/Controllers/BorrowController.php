<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BorrowController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function borday(Request $request)
    {
        $dateend = $request->dateend ? $request->dateend : date("Y-m-d");
        $datestart = $request->datestart ? $request->datestart : date("Y-m-d",strtotime("-1 month",strtotime($dateend)));
        $data = DB::table('vw_borrowday_report')->whereBetween('borr_hd_date',[$datestart,$dateend])->get();
        return view('borrowreport.borrowreport-day',[
            'dateend' => $dateend,
            'datestart' => $datestart,
            'data' => $data,
        ]);
    }
}
