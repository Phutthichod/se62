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
            $table->string('username');
            $table->string('firstName',50);
            $table->string('lastName',50);
            $table->string('department',50);
            $table->string('thainame',100);
            $table->string('faculty',50);
            $table->string('email2')->unique();
            $table->string('email1')->unique();
            $table->string('icon',15);
            $table->boolean('isAdmin');
            $table->enum('permission', [ 'User','Teacher','Other']);
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
