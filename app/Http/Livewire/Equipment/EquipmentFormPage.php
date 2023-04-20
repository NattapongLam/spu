<?php

namespace App\Http\Livewire\Equipment;

use App\Models\JobSite;
use Livewire\Component;
use App\Models\Equipment;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Models\EquipmentGroup;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;

class EquipmentFormPage extends Component
{
    use WithFileUploads;
    
    public $idKey = 0;
    public $equ_code;
    public $equ_name;
    public $equ_unit;
    public $equ_cost=0;
    public $equ_qty=1;
    public $equ_picture;
    public $equ_desc;
    public $equ_status = 1;
    public $group_id;
    public $emp_name;
    public $job_id=1;

    protected $rules = [
        'equ_code' => "required",
        'equ_name' => "required",
        'equ_unit' => "required",
        'equ_cost' => "required",
        'equ_qty' => "required",
        'group_id' => "required",
    ];

    protected $messages = [
        'equ_code.required' => 'กรุณากรอกใส่ข้อมูล',
        'equ_name.required' => 'กรุณากรอกใส่ข้อมูล',
        'equ_unit.required' => 'กรุณากรอกใส่ข้อมูล',
        'equ_cost.required' => 'กรุณากรอกใส่ข้อมูล',
        'equ_qty.required' => 'กรุณากรอกใส่ข้อมูล',
        'group_id.required' => 'กรุณากรอกใส่ข้อมูล',
    ];

    public function resetInput()
    {
        $this->reset('idKey');
        $this->reset('equ_code');
        $this->reset('equ_name');
        $this->reset('equ_unit');
        $this->reset('equ_cost');
        $this->reset('equ_qty');
        $this->reset('equ_picture');
        $this->reset('equ_desc');
        $this->reset('equ_status');
        $this->reset('group_id');
        $this->reset('job_id');
    }

    public function storeImage()
    {
        if(!$this->equ_picture){
            return null;
        }
        $img = ImageManagerStatic::make($this->equ_picture)->encode('png');
        $name = date('YmdHis').Str::random().'.png';
        Storage::disk('equipment')->put($name,$img);
        return $name;
    }

    public function mount($id = 0)
    {
        if($id > 0)
        {
            $equ = Equipment::findOrfail($id);
            $this->idKey = $equ->id;
            $this->equ_code = $equ->equ_code;
            $this->equ_name = $equ->equ_name;
            $this->equ_unit= $equ->equ_unit;
            $this->equ_cost= $equ->equ_cost;
            $this->equ_qty= $equ->equ_qty;
            $this->equ_desc= $equ->equ_desc;
            $this->equ_status= $equ->equ_status;
            $this->group_id= $equ->group_id;
        }
    }
    public function save()
    {
        $this->validate($this->rules,$this->messages);
        $equ = new Equipment();
        if($this->idKey > 0){
            $equ = Equipment::findOrfail($this->idKey);     
            $equ->equ_picture = $this->equ_picture ? $this->storeImage() : $equ->equ_picture; 
        }else{           
            $equ->equ_picture= $this->storeImage();
        }
        $equ->equ_code = $this->equ_code;
        $equ->equ_name = $this->equ_name;
        $equ->equ_unit = $this->equ_unit;
        $equ->equ_cost = $this->equ_cost;
        $equ->equ_qty = 1;
        $equ->equ_desc = $this->equ_desc;
        $equ->equ_status = $this->equ_status;
        $equ->group_id = $this->group_id;
        $equ->emp_name = auth()->user()->name;
        $equ->job_id = $this->job_id;
        $equ->save();
        $this->resetInput();
        $this->dispatchBrowserEvent('swal',[
            'title' => 'บันทึกข้อมูลเรียบร้อย',
            'timer' => 3000,
            'icon' => 'success',
            'url' => route('equipment.list')
        ]);
    }

    public function render()
    {
        return view('livewire.equipment.equipment-form-page',[
            'eqgroup'  => EquipmentGroup::where('grou_status',1)->get(),
            'job' => JobSite::where('job_status',1)->get()
        ])->extends('layouts.main');
    }
}
