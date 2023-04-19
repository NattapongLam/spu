<?php

namespace App\Http\Livewire\EquipmentGroup;

use Livewire\Component;
use App\Models\EquipmentGroup;

class EquipmentGroupFormPage extends Component
{
    public $idKey = 0;
    public $grou_code;
    public $grou_name;
    public $grou_status=1;

    protected $listeners = [
        'editEquipmentGroup' => 'edit',
        'btnCreateEquipmentGroup' => 'resetInput'
    ];

    protected $rules = [
        'grou_code' => 'required',
        'grou_name' => 'required',
    ];

    protected $messages = [
        'grou_code.required' => 'กรุณากรอกใส่ข้อมูล',
        'grou_name.required' => 'กรุณากรอกใส่ข้อมูล',
    ];

    public function resetInput()
    {
        $this->reset('idKey');
        $this->reset('grou_code');
        $this->reset('grou_name');
        $this->reset('grou_status');
    }

    public function edit($id)
    {
        $grou = EquipmentGroup::findOrFail($id);
        $this->idKey = $grou->id;
        $this->grou_code = $grou->grou_code;
        $this->grou_name = $grou->grou_name;
        $this->grou_status = $grou->grou_status;
    }

    public function save()
    {
        $this->validate($this->rules,$this->messages);
        EquipmentGroup::updateOrCreate([
            'id' => $this->idKey
        ],[
            'grou_code' => $this->grou_code,
            'grou_name' => $this->grou_name,
            'grou_status' => $this->grou_status,
            'emp_name' => auth()->user()->name
        ]);
        $this->resetInput();
        $this->emit("refreshEquipmentGroup");
        $this->dispatchBrowserEvent('swal',[
            'title' => 'บันทึกข้อมูลเรียบร้อย',
            'timer' => 3000,
            'icon' => 'success'
        ]);
        $this->emit('modalHide');
    }

    public function render()
    {
        return view('livewire.equipment-group.equipment-group-form-page');
    }
}
