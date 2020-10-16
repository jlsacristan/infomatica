<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
			$table->increments('id');
            $table->string('name', 100);
            $table->string('email')->unique();
            $table->string('user', 50)->unique();
			$table->string('nif', 9)->unique();
            $table->string('password', 60);
            $table->enum('type', ['user', 'admin']);
            $table->boolean('online');
			$table->integer('tlf');
            $table->string('address', 80);
			$table->string('cp', 6);
            $table->string('town', 60);
            $table->string('province', 40);
            $table->string('country', 40);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
