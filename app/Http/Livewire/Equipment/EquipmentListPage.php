<?php

namespace App\Http\Livewire\Equipment;

use Livewire\Component;
use App\Models\Equipment;
use Livewire\WithPagination;

class EquipmentListPage extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $searchTerm;

    public function render()
    {
        $equ = Equipment::leftjoin('job_sites','equipment.job_id','=','job_sites.id')
        ->orderBy('equ_code','ASC')
        ->select('equipment.*','job_sites.job_name as job_name');
        if($this->searchTerm){
            $equ = $equ
            ->where('equ_code','LIKE',"%{$this->searchTerm}%")
            ->orwhere('equ_name','LIKE',"%{$this->searchTerm}%");
        }
        $equ = $equ->paginate(15);
        return view('livewire.equipment.equipment-list-page',[
            'equ' => $equ
        ])->extends('layouts.main');
    }
}
