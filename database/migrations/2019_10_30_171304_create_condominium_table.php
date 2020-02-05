<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCondominiumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('condominiums', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('phone');
            $table->string('email', 40)->unique();
            $table->string('address');
            $table->boolean('active');

            $table->unsignedBigInteger('type_condominium_id')->unsigned();
            $table->unsignedBigInteger('create_by')->unsigned();
            $table->unsignedBigInteger('update_by')->unsigned()->nullable();

            $table->foreign('create_by')->references('id')->on('users');
            $table->foreign('update_by')->references('id')->on('users');
            $table->foreign('type_condominium_id')->references('id')->on('condominium_types');
            
            $table->softDeletes();
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
        Schema::dropIfExists('condominiums');
    }
}
