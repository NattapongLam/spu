<?php

namespace App\Http\Livewire\JobSite;

use App\Models\JobSite;
use Livewire\Component;

class JobSiteFormPage extends Component
{
    public $idKey = 0;
    public $job_code;
    public $job_name;
    public $job_status=1;

    protected $listeners = [
        'editJobSite' => 'edit',
        'btnCreateJobSite' => 'resetInput'
    ];

    protected $rules = [
        'job_code' => 'required',
        'job_name' => 'required',
    ];

    protected $messages = [
        'job_code.required' => 'กรุณากรอกใส่ข้อมูล',
        'job_name.required' => 'กรุณากรอกใส่ข้อมูล',
    ];

    public function resetInput()
    {
        $this->reset('idKey');
        $this->reset('job_code');
        $this->reset('job_name');
        $this->reset('job_status');
    }

    public function edit($id)
    {
        $่job = JobSite::findOrFail($id);
        $this->idKey = $่job->id;
        $this->job_code = $่job->job_code;
        $this->job_name = $่job->job_name;
        $this->job_status = $่job->job_status;
    }

    public function save()
    {
        $this->validate($this->rules,$this->messages);
        JobSite::updateOrCreate([
            'id' => $this->idKey
        ],[
            'job_code' => $this->job_code,
            'job_name' => $this->job_name,
            'job_status' => $this->job_status,
            'emp_name' => auth()->user()->name
        ]);
        $this->resetInput();
        $this->emit("refreshJobSite");
        $this->dispatchBrowserEvent('swal',[
            'title' => 'บันทึกข้อมูลเรียบร้อย',
            'timer' => 3000,
            'icon' => 'success'
        ]);
        $this->emit('modalHide');
    }

    public function render()
    {
        return view('livewire.job-site.job-site-form-page');
    }
}
