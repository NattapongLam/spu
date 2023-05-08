<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\RepairController;
use App\Http\Livewire\Borrow\BorrowFormPage;
use App\Http\Livewire\Borrow\BorrowListPage;
use App\Http\Livewire\Repair\RepairFormPage;
use App\Http\Livewire\Repair\RepairListPage;
use App\Http\Controllers\DashboardController;
use App\Http\Livewire\JobSite\JobSiteListPage;
use App\Http\Livewire\Borrow\BorrowApprovalPage;
use App\Http\Livewire\Employee\EmployeeListPage;
use App\Http\Livewire\Employee\EmployeeRolePage;
use App\Http\Livewire\Repair\RepairApprovalPage;
use App\Http\Livewire\Repair\RepairFinishedPage;
use App\Http\Livewire\Equipment\EquipmentFormPage;
use App\Http\Livewire\Equipment\EquipmentListPage;
use App\Http\Livewire\Repatriate\RepatriateFormPage;
use App\Http\Livewire\Repatriate\RepatriateListPage;
use App\Http\Livewire\Repatriate\RepatriateApproFormPage;
use App\Http\Livewire\Repatriate\RepatriateApproListPage;
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

Route::group([
    'prefix' => 'equipments',
    'as' => 'equipment.',
    'middleware' =>  ['auth','role:admin']
],function(){
    Route::get('/', EquipmentListPage::class)->name('list');
    Route::get('/create', EquipmentFormPage::class)->name('create');
    Route::get('/update/{id}', EquipmentFormPage::class)->name('update');
});

Route::group([
    'prefix' => 'borrows',
    'as' => 'borrow.',
    'middleware' =>  ['auth','role:admin|employee|repairman']
],function(){
    Route::get('/', BorrowListPage::class)->name('list');
    Route::get('/create', BorrowFormPage::class)->name('create');
    Route::get('/update/{id}', BorrowFormPage::class)->name('update');
    Route::get('/approval/{id}', BorrowApprovalPage::class)->name('approval');
});

Route::group([
    'prefix' => 'repatriates',
    'as' => 'repatriate.',
    'middleware' =>  ['auth','role:admin|employee|repairman']
],function(){
    Route::get('/', RepatriateListPage::class)->name('list');
    Route::get('/update/{id}', RepatriateFormPage::class)->name('update');
});

Route::group([
    'prefix' => 'approvals',
    'as' => 'approval.',
    'middleware' =>  ['auth','role:admin']
],function(){
    Route::get('/', RepatriateApproListPage::class)->name('list');
    Route::get('/update/{id}', RepatriateApproFormPage::class)->name('update');
});

Route::group([
    'prefix' => 'borrowreports',
    'as' => 'borrowreport.',
    'middleware' =>  ['auth','role:admin|employee|repairman']
],function(){
    Route::get('/borday', [BorrowController::class,'borday'])->name('borday.index');  
});

Route::group([
    'prefix' => 'repairs',
    'as' => 'repair.',
    'middleware' =>  ['auth','role:admin|employee|repairman']
],function(){
    Route::get('/', RepairListPage::class)->name('list');
    Route::get('/create', RepairFormPage::class)->name('create');
    Route::get('/update/{id}', RepairFormPage::class)->name('update');
    Route::get('/approval/{id}', RepairApprovalPage::class)->name('approval');
    Route::get('/finished/{id}', RepairFinishedPage::class)->name('finished');
});

Route::group([
    'prefix' => 'repairreports',
    'as' => 'repairreport.',
    'middleware' =>  ['auth','role:admin|employee|repairman']
],function(){
    Route::get('/repday', [RepairController::class,'repday'])->name('repday.index');  
});