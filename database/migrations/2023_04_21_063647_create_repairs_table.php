<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepairsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repairs', function (Blueprint $table) {
            $table->id();
            $table->date('rep_date')->comment('วันที่');
            $table->string('rep_docuno')->comment('เลขที่เอกสาร');
            $table->integer('rep_number')->comment('รันเลขที่');
            $table->bigInteger('sta_id');
            $table->bigInteger('job_id');
            $table->bigInteger('equ_id')->comment('วัสดุอุปกรณ์');
            $table->string('equ_name')->comment('ชื่อวัสดุอุปกรณ์');
            $table->text('rep_desc')->nullable();
            $table->string('emp_name')->comment('ผู้บันทึก');
            $table->string('app_name')->nullable()->comment('ผู้อนุมัติ');          
            $table->text('app_reamrk')->nullable();
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
        Schema::dropIfExists('repairs');
    }
}
