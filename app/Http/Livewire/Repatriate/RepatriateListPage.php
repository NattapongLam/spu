<?php

namespace App\Http\Livewire\Repatriate;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class RepatriateListPage extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $searchTerm;

    protected $listeners = [
        'refreshRepatriate' => '$refresh'
    ];


    public function render()
    {
        $borr = DB::table('borrow_hds')
        ->join('job_sites','borrow_hds.req_job_id','=','job_sites.id')
        ->where('borrow_hds.emp_name',auth()->user()->name)
        ->select('borrow_hds.*','job_sites.job_name as job_name')
        ->where('borrow_hds.sta_id',3);  
        if($this->searchTerm){
            $borr = $borr
            ->where('borr_hd_docuno','LIKE',"%{$this->searchTerm}%")
            ->orwhere('job_name','LIKE',"%{$this->searchTerm}%");
        }
        $borr = $borr->paginate(15);
        return view('livewire.repatriate.repatriate-list-page',[
            'borr' => $borr
        ])->extends('layouts.main');
    }
}
