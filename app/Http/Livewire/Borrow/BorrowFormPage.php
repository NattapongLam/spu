<?php

namespace App\Http\Livewire\Borrow;

use App\Models\JobSite;
use Livewire\Component;
use App\Models\BorrowDt;
use App\Models\BorrowHd;
use App\Models\Equipment;
use App\Models\BorrowStatus;
use Illuminate\Support\Facades\DB;

class BorrowFormPage extends Component
{
    public $idKey = 0;
    public $borr_hd_date;
    public $borr_hd_docuno;
    public $borr_hd_number;
    public $borr_hd_desc;
    public $borr_hd_status;
    public $stc_job_id=1;
    public $req_job_id;
    public $emp_name;
    public $sta_id=1;

    public $equs = [];
    public $i = 1;

    public $checkEqu = [];

    protected $listeners =[
        'selectedEqu' => 'selectedEqu'
    ];

    public function selectedEqu($id)
    {
        $equ = Equipment::findOrFail($id);
        if(!empty($this->checkEqu) && in_array($equ->id,$this->checkEqu)){
            return;
        }
        $this->equs[] = [
            'equ_id' => $equ->id,
            'equ_name' => $equ->equ_name,
            'equ_qty' => $equ->equ_qty,
        ];
        array_push($this->checkEqu,$equ->id);
    }

    public function deleteRow($index)
    {
        unset($this->equs[$index]);
    }

    protected $rules =[
        'stc_job_id' => 'required',
        'req_job_id' => 'required',
    ];

    protected $messages = [
        'stc_job_id.required' => 'กรุณากรอกใส่ข้อมูล',
        'req_job_id.required' => 'กรุณากรอกใส่ข้อมูล'
    ];

    public function mount($id = 0)
    {
        if($id)
        {
            $hd = BorrowHd::findOrFail($id);
            $this->idKey = $hd->id;
            $this->borr_hd_date = $hd->borr_hd_date;
            $this->borr_hd_docuno = $hd->borr_hd_docuno;
            $this->borr_hd_number = $hd->borr_hd_number;
            $this->borr_hd_desc = $hd->borr_hd_desc;
            $this->borr_hd_status = $hd->borr_hd_status;
            $this->stc_job_id = $hd->stc_job_id;
            $this->req_job_id = $hd->req_job_id;
            $this->emp_name = $hd->emp_name;
            foreach ($hd->equs as $key => $value) {
                $this->equs[] = [
                    'equ_id' => $value->equ_id,
                    'equ_qty' => $value->equ_qty,
                    'equ_name' => $value->equ_name,
                ];
            }
        }
    }

    public function save()
    {
        $this->validate($this->rules,$this->messages);
        $docs_last = BorrowHd::
        where('borr_hd_docuno', 'like', '%' . date('Ymd') . '%')
        ->orderBy('id', 'desc')->first();
        if ($docs_last) {
            $docs = 'ASS-' . date('Ymd') . '-' . str_pad($docs_last->borr_hd_number + 1, 4, '0', STR_PAD_LEFT);
            $docs_number = $docs_last->borr_hd_number + 1;
        } else {
            $docs = 'ASS-' . date('Ymd') . '-' . str_pad(1, 4, '0', STR_PAD_LEFT);
            $docs_number = 1;
        }
        if($this->equs)
        {
            $stat = BorrowStatus::where('id',$this->sta_id)->first();
        try {
            DB::beginTransaction();
            $hd = BorrowHd::updateOrCreate([
                'id' => $this->idKey
            ],[
                'borr_hd_date' => date('Y-m-d'),
                'borr_hd_docuno' => $docs,
                'borr_hd_number' => $docs_number,
                'borr_hd_desc' => $this->borr_hd_desc,
                'borr_hd_status' => $stat->name,
                'stc_job_id' => $this->stc_job_id,
                'req_job_id' => $this->req_job_id,
                'emp_name' => auth()->user()->name,               
                'created_at' => 1,
                'updated_at' => 1,
                'sta_id' => $this->sta_id
            ]);
            if($this->idKey){
                DB::table('borrow_dts')->where('borrhd_id',$hd->id)->delete();
            }          
            foreach($this->equs as $key => $value)
            {
                $item = BorrowDt::Create([
                    'borrhd_id' => $hd->id,
                    'equ_id'  => $value['equ_id'],
                    'equ_qty' => $value['equ_qty'],
                    'equ_name'=> $value['equ_name'],
                    'created_at' => 1,
                    'updated_at' => 1
                ]);
                $up = DB::table('equipment')->where('id',$value['equ_id'])->update([
                    'doc_status' => 'ขอยืม'
                ]);
            }
            DB::commit();
           
            $this->dispatchBrowserEvent('swal',[
                'title' => 'บันทึกข้อมูลเรียบร้อย',
                'timer' => 3000,
                'icon' => 'success',
                'url' => route('borrow.list')
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return $e;
        }                 
        }
        else{
            $this->dispatchBrowserEvent('swal',[
                'title' => 'ไม่สามารถบันทึกข้อมูลได้',
                'timer' => 3000,
                'icon' => 'info',
            ]);
            return;
        }
        
    }

    public function render()
    {
        $docs_last = BorrowHd::
        where('borr_hd_docuno', 'like', '%' . date('Ymd') . '%')
        ->orderBy('id', 'desc')->first();
        if ($docs_last) {
            $docs = 'ASS-' . date('Ymd') . '-' . str_pad($docs_last->borr_hd_number + 1, 4, '0', STR_PAD_LEFT);
            $docs_number = $docs_last->borr_hd_number + 1;
        } else {
            $docs = 'ASS-' . date('Ymd') . '-' . str_pad(1, 4, '0', STR_PAD_LEFT);
            $docs_number = 1;
        }
        $this->borr_hd_date = date('Y-m-d');
        $this->borr_hd_docuno = $docs;
        $this->borr_hd_number = $docs_number;
        $this->emp_name = auth()->user()->name;
        return view('livewire.borrow.borrow-form-page',[
            'stc' => JobSite::get(),
            'req' => JobSite::where('id','<>',1)->get(),
            'sta' => BorrowStatus::whereIn('id',[1,2])->get()
        ])->extends('layouts.main');
    }
}
