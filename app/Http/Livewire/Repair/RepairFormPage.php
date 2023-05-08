<?php

namespace App\Http\Livewire\Repair;

use App\Models\Repair;
use App\Models\JobSite;
use Livewire\Component;
use App\Models\Equipment;
use App\Models\RepairStatus;
use Illuminate\Support\Facades\DB;

class RepairFormPage extends Component
{
    public $idKey = 0;
    public $rep_date;
    public $rep_docuno;
    public $rep_number;
    public $sta_id=1;
    public $job_id=1;
    public $equ_id;
    public $rep_desc;
    
    protected $rules =[
        'job_id' => 'required',
        'equ_id' => 'required',
        'rep_desc' => 'required',
    ];

    protected $messages = [
        'job_id.required' => 'กรุณากรอกใส่ข้อมูล',
        'equ_id.required' => 'กรุณากรอกใส่ข้อมูล',
        'rep_desc.required' => 'กรุณากรอกใส่ข้อมูล'
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
        }
    }

    public function save()
    {
        $this->validate($this->rules,$this->messages);
        $docs_last = Repair::where('rep_docuno', 'like', '%' . date('Ymd') . '%')
        ->orderBy('id', 'desc')->first();
        if ($docs_last) {
            $docs = 'MTN-' . date('Ymd') . '-' . str_pad($docs_last->rep_number + 1, 4, '0', STR_PAD_LEFT);
            $docs_number = $docs_last->rep_number + 1;
        } else {
            $docs = 'MTN-' . date('Ymd') . '-' . str_pad(1, 4, '0', STR_PAD_LEFT);
            $docs_number = 1;
        }
        $equ = Equipment::where('id',$this->equ_id)->first();
        try {
            DB::beginTransaction();
            $hd = Repair::updateOrCreate([
                'id' => $this->idKey
            ],[
                'rep_date' => date('Y-m-d'),
                'rep_docuno' => $docs,
                'rep_number' => $docs_number,
                'sta_id' => $this->sta_id,
                'job_id' => $this->job_id,
                'equ_id' => $this->equ_id,
                'rep_desc' => $this->rep_desc,
                'emp_name' => auth()->user()->name,               
                'created_at' => 1,
                'updated_at' => 1,
                'equ_name' => $equ->equ_name
            ]);
            $up = Equipment::where('id',$this->equ_id)->update([
                'doc_status' => 'รอส่งซ่อม'
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
        $docs_last = Repair::where('rep_docuno', 'like', '%' . date('Ymd') . '%')
        ->orderBy('id', 'desc')->first();
        if ($docs_last) {
            $docs = 'MTN-' . date('Ymd') . '-' . str_pad($docs_last->rep_number + 1, 4, '0', STR_PAD_LEFT);
            $docs_number = $docs_last->rep_number + 1;
        } else {
            $docs = 'MTN-' . date('Ymd') . '-' . str_pad(1, 4, '0', STR_PAD_LEFT);
            $docs_number = 1;
        }
        $this->rep_date = date('Y-m-d');
        $this->rep_docuno = $docs;
        $this->rep_number = $docs_number;
        return view('livewire.repair.repair-form-page',[
            'sta' => RepairStatus::whereIn('id',[1,2])->get(),
            'job' => JobSite::where('id',1)->get(),
            'equ' => Equipment::where('equ_status',true)->where('job_id',1)->where('doc_status','พร้อมยืม')->get()
        ])->extends('layouts.main');
    }
}
