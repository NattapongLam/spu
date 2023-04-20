<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment', function (Blueprint $table) {
            $table->id();
            $table->string('equ_code')->comment('วัสดุอุปกรณ์');
            $table->string('equ_name')->comment('ชื่อวัสดุอุปกรณ์');
            $table->string('equ_unit')->comment('หน่วย');
            $table->text('equ_desc')->nullable('รายละเอียดเพิ่มเติม');
            $table->decimal('equ_cost',8,2)->comment('ราคาต้นทุน');
            $table->integer('equ_qty')->comment('จำนวน');
            $table->string('equ_picture')->nullable()->comment('รูป');
            $table->boolean('equ_status')->default(true)->comment('สถานะ True-ใช้งาน False-ยกเลิก');
            $table->foreignId('group_id')->references('id')->on('equipment_groups')->onDelete('cascade');
            $table->timestamps();
            $table->string('emp_name')->comment('ผู้บันทึก');
            $table->bigInteger('job_id')->comment('สถานที่');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipment');
    }
}
