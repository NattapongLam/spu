<?php

namespace App\Http\Livewire\Borrow;

use App\Models\User;
use Livewire\Component;
use App\Models\BorrowHd;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class BorrowListPage extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $searchTerm;
    
    public function render()
    {
        $emp = User::where('name','=',auth()->user()->name)
        ->where('name','like','admin%')->first();
        if($emp){
            $borr = DB::table('borrow_hds')
            ->join('job_sites','borrow_hds.req_job_id','=','job_sites.id')
            ->select('borrow_hds.*','job_sites.job_name as job_name');
        }
        else{
            $borr = DB::table('borrow_hds')
            ->join('job_sites','borrow_hds.req_job_id','=','job_sites.id')
            ->where('borrow_hds.emp_name',auth()->user()->name)
            ->select('borrow_hds.*','job_sites.job_name as job_name');
        }
        
        if($this->searchTerm){
            $borr = $borr
            ->where('borr_hd_docuno','LIKE',"%{$this->searchTerm}%")
            ->orwhere('job_name','LIKE',"%{$this->searchTerm}%");
        }
        $borr = $borr->paginate(15);
        return view('livewire.borrow.borrow-list-page',[
            'borr' => $borr
        ])->extends('layouts.main');
    }
}
