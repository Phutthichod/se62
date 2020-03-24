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
            $table->string('access_key')->nullable();
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('icon')->default("img/avatar.png");
            $table->integer('number')->default(1);
            $table->boolean('isBorrow')->default(1);
            $table->unsignedBigInteger('catagories_id');
            $table->foreign('catagories_id')->references('id')->on('catagories')->onDelete('cascade');
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
            $table->dropForeign(['catagories_id']);
        });
        Schema::dropIfExists('accessories');
        Schema::enableForeignKeyConstraints();
    }
}
