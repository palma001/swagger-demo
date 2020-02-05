<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCondominiumRolUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('condominium_rol_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('rol_id')->unsigned();
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->unsignedBigInteger('created_by')->unsigned();
            $table->unsignedBigInteger('updated_by')->unsigned()->nullable();
            $table->unsignedBigInteger('condominium_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('rol_id')->references('id')->on('rols');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
            $table->foreign('condominium_id')->references('id')->on('condominiums');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('condominium_rol_users');
    }
}
