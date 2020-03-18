<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Icon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('icon', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("accessories_id")->nullable();
            $table->unsignedBigInteger("catagories_id")->nullable();
            $table->enum('type',[1,2])->default(1);
            $table->string('description',250)->default(null);
            $table->string('icon',15)->default("img/avatar.png");
            $table->foreign('accessories_id')->references('id')->on('accessories');
            $table->foreign('catagories_id')->references('id')->on('catagories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('icon');
    }
}
