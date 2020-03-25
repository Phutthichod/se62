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
                // $table->unsignedBigInteger('user_id');
                // $table->unsignedBigInteger('borrowing_list_id');
                $table->boolean('read')->nullable();
                $table->string('title')->nullable();
                $table->string('body')->nullable();
                $table->unsignedBigInteger('log_id')->nullable();
                // $table->foreign('borrowing_list_id')->references('id')->on('borrowing_list')->onDelete('cascade');
                // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->foreign('log_id')->references('id')->on('log_borrowing')->onDelete('cascade');
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
