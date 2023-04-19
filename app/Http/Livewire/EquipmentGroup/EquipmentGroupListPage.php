<?php

namespace App\Http\Livewire\EquipmentGroup;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\EquipmentGroup;

class EquipmentGroupListPage extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $searchTerm;

    protected $listeners = [
        'refreshEquipmentGroup' => '$refresh'
    ];

    public function render()
    {
        $grou = EquipmentGroup::query();
        if($this->searchTerm){
            $grou = $grou
            ->where('grou_code','LIKE',"%{$this->searchTerm}%")
            ->orWhere('grou_name','LIKE',"%{$this->searchTerm}%");
        }
        $grou = $grou->paginate(10);
        return view('livewire.equipment-group.equipment-group-list-page',[
            'grou' => $grou
        ])->extends('layouts.main');
    }
}
