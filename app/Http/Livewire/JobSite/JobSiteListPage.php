<?php

namespace App\Http\Livewire\JobSite;

use App\Models\JobSite;
use Livewire\Component;
use Livewire\WithPagination;

class JobSiteListPage extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $searchTerm;

    protected $listeners = [
        'refreshJobSite' => '$refresh'
    ];

    public function render()
    {
        $job = JobSite::query();
        if($this->searchTerm){
            $job = $job
            ->where('job_code','LIKE',"%{$this->searchTerm}%")
            ->orWhere('job_name','LIKE',"%{$this->searchTerm}%");
        }
        $job = $job->paginate(10);
        return view('livewire.job-site.job-site-list-page',[
            'job' => $job
        ])->extends('layouts.main');
    }
}
