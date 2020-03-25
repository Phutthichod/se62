<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BorrowingList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        if (Schema::hasTable('users')) {
            Schema::create('borrowing_list', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id');
                $table->string('teacher_name')->nullable();
                $table->unsignedBigInteger('staff_id')->nullable();
                $table->string('project_name')->nullable();
                $table->string('description')->nullable();
                $table->enum('status',['รออนุมัติ','รอรับ','ยกเลิก','ไม่อนุมัติ','ยืมแล้ว','คืนแล้ว',"ยืมเกิน"]);
                $table->dateTime('update')->nullable();
                $table->dateTime('date_borrow')->nullable();
                $table->integer('period')->default(0);
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->foreign('staff_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::disableForeignKeyConstraints();
        Schema::table('borrowing_list', function(Blueprint $table){
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('borrowing_list');
        Schema::enableForeignKeyConstraints();
    }
}
