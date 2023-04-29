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
    public function rulesValidate()
    {
        if($this->idKey)
        {
            return[
                'name' => 'required',
                'email'=> "required|unique:users,email,".$this->idKey,              
            ];
        }else
        {
            return[
                'name' => 'required',
                'email'=> "required|unique:users,email",
                'password' => 'required|min:9',
                'name'=> "required|unique:users,name,",
            ];
        }
    }

    protected $messages = [
        'name.required' => 'กรุณากรอกชื่อ - นามสกุล',
        'email.required' => 'กรุณากรอกอีเมล',
        'password.required' => 'กรุณากรอกรหัสผ่าน',
        'email.unique' => 'อีเมลนี้มีอยู่ในระบบแล้ว',
        'name.unique' => 'ชื่อนี้มีอยู่ในระบบแล้ว',
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
        $this->validate($this->rulesValidate(),$this->messages);
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
