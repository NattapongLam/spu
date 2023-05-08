<?php

namespace App\Http\Livewire\Repair;

use App\Models\Repair;
use App\Models\JobSite;
use Livewire\Component;
use App\Models\Equipment;
use App\Models\RepairStatus;
use Illuminate\Support\Facades\DB;

class RepairFinishedPage extends Component
{
    public $idKey = 0;
    public $rep_date;
    public $rep_docuno;
    public $rep_number;
    public $sta_id=3;
    public $job_id;
    public $equ_id;
    public $rep_desc;
    public $app_reamrk;
    public $equ_guarantee;
    public $rep_timeline=1;
    public $rep_cost=0;
    public $rep_vendor;
    public $fin_remark;
    
    protected $rules =[
        'fin_remark' => 'required',
    ];

    protected $messages = [
        'fin_remark.required' => 'กรุณากรอกใส่ข้อมูล',
    ];

    public function mount($id = 0)
    {
        if($id)
        {
            $hd = Repair::findOrFail($id);
            $this->idKey = $hd->id;
            $this->rep_date = $hd->rep_date;
            $this->rep_docuno = $hd->rep_docuno;
            $this->rep_number = $hd->rep_number;
            $this->sta_id = $hd->sta_id;
            $this->job_id = $hd->job_id;
            $this->equ_id = $hd->equ_id;
            $this->rep_desc = $hd->rep_desc;
            $this->app_reamrk = $hd->app_reamrk;
            $this->equ_guarantee = $hd->equ_guarantee;
            $this->rep_timeline = $hd->rep_timeline;
            $this->rep_cost = $hd->rep_cost;
            $this->rep_vendor = $hd->rep_vendor;
        }
    }

    public function save()
    {
        $this->validate($this->rules,$this->messages);
        try {
            DB::beginTransaction();
            $hd = Repair::updateOrCreate([
                'id' => $this->idKey
            ],[
                'sta_id' => 3,
                'fin_remark' => $this->fin_remark,
                'app_name' => auth()->user()->name,               
                'updated_at' => 1,
                'equ_guarantee' => $this->equ_guarantee,
                'rep_timeline' => $this->rep_timeline,
                'rep_cost' => $this->rep_cost,
                'rep_vendor' => $this->rep_vendor
            ]);
            $up = Equipment::where('id',$this->equ_id)->update([
                'doc_status' => 'พร้อมยืม'
            ]);
            DB::commit();
            $this->dispatchBrowserEvent('swal',[
                'title' => 'บันทึกข้อมูลเรียบร้อย',
                'timer' => 3000,
                'icon' => 'success',
                'url' => route('repair.list')
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return $e;
        }        
    }

    public function render()
    {
        return view('livewire.repair.repair-finished-page',[
            'sta' => RepairStatus::whereIn('id',[3])->get(),
            'job' => JobSite::get(),
            'equ' => Equipment::get()
        ])->extends('layouts.main');
    }
}
