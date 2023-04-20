<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowDtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrow_dts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('borrhd_id')->comment('หัวเอกสาร');
            $table->bigInteger('equ_id')->comment('วัสดุอุปกรณ์');
            $table->integer('equ_qty')->comment('จำนวน');
            $table->string('equ_name')->comment('ชื่อวัสดุอุปกรณ์');
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
        Schema::dropIfExists('borrow_dts');
    }
}
