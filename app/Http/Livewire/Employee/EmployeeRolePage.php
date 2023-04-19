<?php

namespace App\Http\Livewire\Employee;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class EmployeeRolePage extends Component
{
    public $role;
    public $employee;

    public function mount($id)
    {
        $employee = User::findOrFail($id);
        if($employee)
        {
            $this->role = !empty($employee->getRoleNames()[0]) ? $employee->getRoleNames()[0] : '';
            $this->employee = $employee;
        }
    }
    public function save()
    {
        $role = Role::where('name',$this->role)->first();
        $this->employee->syncRoles($role);
        $this->dispatchBrowserEvent('swal',[
            'title' => 'บันทึกข้อมูลสิทธิเรียบร้อย',
            'timer' => 3000,
            'icon' => 'success',
            'url' => route('employee.list')
        ]);
    }

    public function render()
    {
        return view('livewire.employee.employee-role-page',[
            'roles' => Role::all()
        ])->extends('layouts.main');
    }
}
