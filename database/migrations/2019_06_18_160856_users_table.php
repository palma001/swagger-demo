<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('lastname');
            $table->string('documents', 10)->unique();
            $table->string('email', 50)->unique();
            $table->string('phone');
            $table->string('password', 100);
            $table->boolean('active');
            $table->string('api_token', 180)->nullable()->unique();
            $table->rememberToken();

            $table->unsignedBigInteger('create_by')->unsigned();
            $table->unsignedBigInteger('update_by')->unsigned()->nullable();
            $table->unsignedBigInteger('rol')->unsigned()->nullable();

            $table->foreign('rol')->references('id')->on('rols');
            $table->foreign('create_by')->references('id')->on('users');
            $table->foreign('update_by')->references('id')->on('users');

            $table->softDeletes(0);
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
        Schema::table('users', function (Blueprint $table) {
            Schema::drop('users');
        });
    }
}
