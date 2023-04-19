<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_sites', function (Blueprint $table) {
            $table->id();
            $table->string('job_code')->comment('ไซต์งาน');
            $table->string('job_name')->comment('ชื่อไซต์งาน');
            $table->string('emp_name')->comment('ผู้บันทึก');
            $table->boolean('job_status')->default(true)->comment('สถานะ True-ใช้งาน False-ยกเลิก');
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
        Schema::dropIfExists('job_sites');
    }
}
