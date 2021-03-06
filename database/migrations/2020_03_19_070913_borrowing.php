<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Borrowing extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('accessories')&&Schema::hasTable('borrowing_list')&&Schema::hasTable('icon')) {
            //
            Schema::create('borrowing', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('access_id');
                $table->unsignedBigInteger('borrowing_list_id');
                $table->integer('number');
                $table->foreign('access_id')->references('id')->on('accessories')->onDelete('cascade');
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
        Schema::dropIfExists('borrowing');
    }
}
