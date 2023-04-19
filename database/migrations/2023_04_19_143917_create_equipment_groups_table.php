<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipmentGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment_groups', function (Blueprint $table) {
            $table->id();
            $table->string('grou_code')->comment('กลุ่มวัสดุอุปกรณ์');
            $table->string('grou_name')->comment('ชื่อวัสดุอุปกรณ์');
            $table->string('emp_name')->comment('ผู้บันทึก');
            $table->boolean('grou_status')->default(true)->comment('สถานะ True-ใช้งาน False-ยกเลิก');
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
        Schema::dropIfExists('equipment_groups');
    }
}
