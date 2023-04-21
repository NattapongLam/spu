<?php

namespace App\Http\Livewire\Repair;

use App\Models\Repair;
use Livewire\Component;
use App\Models\RepairStatus;
use Livewire\WithPagination;

class RepairListPage extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $searchTerm;
    
    public function render()
    {
        $rep = Repair::leftjoin('repair_statuses','repairs.sta_id','=','repair_statuses.id')
        ->leftjoin('job_sites','repairs.job_id','=','job_sites.id')
        ->select('repairs.*','repair_statuses.name as sta_name','job_sites.job_name as job_name');
        if($this->searchTerm){
            $rep = $rep
            ->where('rep_docuno','LIKE',"%{$this->searchTerm}%")
            ->orwhere('equ_name','LIKE',"%{$this->searchTerm}%");
        }
        $rep = $rep->paginate(15);
        return view('livewire.repair.repair-list-page',[
            'rep' => $rep,           
        ])->extends('layouts.main');
    }
}
