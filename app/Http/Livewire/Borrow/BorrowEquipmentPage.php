<?php

namespace App\Http\Livewire\Borrow;

use Livewire\Component;
use App\Models\Equipment;
use Livewire\WithPagination;

class BorrowEquipmentPage extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";
    
    public $searchTerm;

    public function render()
    {
        $equs = Equipment::where('job_id',1)->where('equ_status',true);
        if($this->searchTerm){
            $equs = $equs
            ->where('equ_code','LIKE',"%{$this->searchTerm}%")
            ->orWhere('equ_name','LIKE',"%{$this->searchTerm}%");
        }
        $equs = $equs->paginate(10);
        return view('livewire.borrow.borrow-equipment-page',[
            'equs' => $equs
        ]);
    }
}
