<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username',20);
            $table->string('thainame',100);
            $table->string('email2',50)->unique()->default(null);
            $table->string('email1',50)->unique()->default(null);
            $table->string('icon',15)->default("img/avatar.png");
            $table->boolean('isAdmin')->default(0);
            $table->enum('permission', [ 'Student','Teacher','Other']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
