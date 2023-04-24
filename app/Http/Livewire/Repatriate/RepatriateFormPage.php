<?php

namespace App\Http\Livewire\Repatriate;

use App\Models\JobSite;
use Livewire\Component;
use App\Models\BorrowDt;
use App\Models\BorrowHd;
use App\Models\BorrowStatus;
use Illuminate\Support\Facades\DB;

class RepatriateFormPage extends Component
{
    public $idKey = 0;
    public $borr_hd_date;
    public $borr_hd_docuno;
    public $borr_hd_desc;
    public $req_job_id;
    public $emp_name;
    public $app_reamrk;
    public $sta_id=4;
    public $send_remark;
    public $equs = [];

    public function mount($id = 0)
    {
        if($id)
        {
            $hd = BorrowHd::findOrFail($id);
            $this->idKey = $hd->id;
            $this->borr_hd_date = $hd->borr_hd_date;
            $this->borr_hd_docuno = $hd->borr_hd_docuno;
            $this->borr_hd_desc = $hd->borr_hd_desc;
            $this->req_job_id = $hd->req_job_id;
            $this->emp_name = $hd->emp_name;
            $this->app_reamrk = $hd->app_reamrk; 
            $this->send_remark = $hd->send_remark;
            $this->equs = BorrowDt::where('borrhd_id',$this->idKey)->get();        
        }
    }

    public function resetInput()
    {
        $this->reset('idKey');
    }

    public function save()
    { 
        $stat = BorrowStatus::where('id',$this->sta_id)->first();
        $hd = BorrowHd::where('id',$this->idKey)->update([
            'sta_id' => $this->sta_id,
            'borr_hd_status' => $stat->name,
            'send_remark' =>  $this->send_remark,
        ]);
        $this->dispatchBrowserEvent('swal',[
            'title' => 'บันทึกข้อมูลเรียบร้อย',
            'timer' => 3000,
            'icon' => 'success',
            'url' => route('repatriate.list')
        ]);   
    }

    public function render()
    {
        return view('livewire.repatriate.repatriate-form-page',[
            'req' => JobSite::where('id','<>',1)->get(),
        ])->extends('layouts.main');
    }
}
