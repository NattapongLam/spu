<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowHdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrow_hds', function (Blueprint $table) {
            $table->id();
            $table->date('borr_hd_date')->comment('วันที่');
            $table->string('borr_hd_docuno')->comment('เลขที่เอกสาร');
            $table->integer('borr_hd_number')->comment('รันเลขที่');
            $table->text('borr_hd_desc')->nullable();
            $table->string('borr_hd_status')->comment('สถานะเอกสาร');
            $table->bigInteger('stc_job_id')->comment('ไซต์ที่ถูกยืม');
            $table->bigInteger('req_job_id')->comment('ไซต์ที่ยืม');
            $table->string('emp_name')->comment('ผู้บันทึก');
            $table->string('app_name')->nullable()->comment('ผู้อนุมัติ');
            $table->bigInteger('sta_id');
            $table->text('app_reamrk')->nullable();
            $table->text('return_name')->nullable();
            $table->text('return_remark')->nullable();
            $table->text('send_remark')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borrow_hds');
    }
}
