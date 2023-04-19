<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Livewire\JobSite\JobSiteListPage;
use App\Http\Livewire\Employee\EmployeeListPage;
use App\Http\Livewire\Employee\EmployeeRolePage;
use App\Http\Livewire\EquipmentGroup\EquipmentGroupListPage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[DashboardController::class,'index'] );

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::group([
    'prefix' => 'employees',
    'as' => 'employee.',
    'middleware' =>  ['auth','role:admin']
],function(){
    Route::get('/', EmployeeListPage::class)->name('list');
    Route::get('/role-emp/{id}', EmployeeRolePage::class)->name('role.emp');
});

Route::group([
    'prefix' => 'equ-groups',
    'as' => 'equ-group.',
    'middleware' =>  ['auth','role:admin']
],function(){
    Route::get('/', EquipmentGroupListPage::class)->name('list');
});

Route::group([
    'prefix' => 'job-sites',
    'as' => 'job-site.',
    'middleware' =>  ['auth','role:admin']
],function(){
    Route::get('/', JobSiteListPage::class)->name('list');
});
