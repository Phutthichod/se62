<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BorrowingListStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('borrowing_list')) {
            Schema::create('log_borrowing', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('borrowing_list_id');
                $table->dateTime('datetime_start')->nullable();
                $table->dateTime('datetime_end')->nullable();
                $table->string('description')->nullable();
                $table->enum('title',['รออนุมัติ','รอรับ','ยกเลิก','ไม่อนุมัติ','ยืมแล้ว','คืนแล้ว',"ยืมเกิน"]);
                $table->foreign('borrowing_list_id')->references('id')->on('borrowing_list')->onDelete('cascade');
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
        Schema::dropIfExists('borrowing_status');
    }
}
