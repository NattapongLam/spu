<?php

namespace App\Http\Livewire\Employee;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class EmployeeFormPage extends Component
{
    public $idKey = 0;
    public $name;
    public $email;
    public $password;
    public $status=1;

    protected $listeners = [
        'editEmployee' => 'edit',
        'btnCreateEmployee' => 'resetInput'
    ];

    protected $rules = [
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
    ];

    protected $messages = [
        'name.required' => 'กรุณากรอกชื่อ - นามสกุล',
        'email.required' => 'กรุณากรอกอีเมล',
        'password.required' => 'กรุณากรอกรหัสผ่าน'
    ];

    public function resetInput()
    {
        $this->reset('idKey');
        $this->reset('name');
        $this->reset('email');
        $this->reset('password');
    }

    public function edit($id)
    {
        $employee = User::findOrFail($id);
        $this->idKey = $employee->id;
        $this->name = $employee->name;
        $this->email = $employee->email;
        $this->status = $employee->status;
    }
    public function save()
    {
        $this->validate($this->rules,$this->messages);
        $employee = new User();
        if($this->idKey > 0){
            $employee = User::findOrfail($this->idKey);     
            $employee->password = $this->password ? Hash::make($this->password) : $employee->password;    
        }else{           
            $employee->password= Hash::make($this->password);
        }
        $employee->name = $this->name;
        $employee->email = $this->email;
        $employee->status = $this->status;
        $employee->save();
        $this->resetInput();
        $this->emit("refreshEmployee");
        $this->dispatchBrowserEvent('swal',[
            'title' => 'บันทึกข้อมูลพนักงานเรียบร้อย',
            'timer' => 3000,
            'icon' => 'success'
        ]);
        $this->emit('modalHide');
    }

    public function render()
    {
        return view('livewire.employee.employee-form-page');
    }
}
