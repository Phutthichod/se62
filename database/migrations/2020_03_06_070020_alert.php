<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Alert extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('users') && Schema::hasTable('borrowing_list')) {
            Schema::create('alert', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id');
                $table->unsignedBigInteger('borrowing_list_id');
                $table->boolean('read')->nullable();
                $table->string('title')->nullable();
                $table->string('body')->nullable();
                $table->enum('type',['ขออนุมัติ','อนุมัติแล้ว','ได้รับแล้ว','ยกเลิกแล้ว','ไม่อนุมัติ','คืนแล้ว']);
                $table->foreign('borrowing_list_id')->references('id')->on('borrowing_list');
                $table->foreign('user_id')->references('id')->on('users');
            });
     }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alert');
    }
}
