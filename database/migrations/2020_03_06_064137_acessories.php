<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Acessories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accessories', function (Blueprint $table) {
            $table->id();
            $table->string('access_key');
            $table->string('name');
            $table->string('description');
            $table->string('img');
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')->references('id')->on('catagories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('accessories', function(Blueprint $table){
            $table->dropForeign(['type_id']);
        });
        Schema::dropIfExists('accessories');
        Schema::enableForeignKeyConstraints();
    }
}
