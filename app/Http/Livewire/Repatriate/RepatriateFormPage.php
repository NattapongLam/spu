<?php

namespace App\Http\Livewire\Repatriate;

use Livewire\Component;
use App\Models\BorrowHd;
use App\Models\BorrowStatus;
use Illuminate\Support\Facades\DB;

class RepatriateFormPage extends Component
{
    public $idKey = 0;
    public $sta_id = 4;
    public $equs = [];

    protected $listeners = [
        'editRepatriate' => 'edit',
        'btnCreateeditRepatriate' => 'resetInput'
    ];

    public function edit($id)
    {
        $่hd = DB::table('borrow_hds')->where('id',$id)->first();
        $this->idKey = $่hd->id;
        // if($this->idKey){
        //     $this->equs = DB::table('borrow_dts')->where('borrhd_id',$this->idKey)->get();
        // } 
    }
    public function resetInput()
    {
        $this->reset('idKey');
    }

    public function save()
    { 
        $stat = BorrowStatus::where('id',$this->sta_id)->first();
        $่hd = BorrowHd::where('id',$this->idKey)->update([
            'sta_id' => $this->sta_id,
            'borr_hd_status' => $stat->name,
        ]);
        $this->resetInput();
        $this->dispatchBrowserEvent('swal',[
            'title' => 'บันทึกข้อมูลเรียบร้อย',
            'timer' => 3000,
            'icon' => 'success',
            'url' => route('repatriate.list')
        ]); 
        $this->emit('modalHide'); 
    }

    public function render()
    {
        return view('livewire.repatriate.repatriate-form-page');
    }
}
