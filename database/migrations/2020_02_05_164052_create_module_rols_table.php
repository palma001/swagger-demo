<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModuleRolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_rols', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('module_id')->unsigned();
            $table->unsignedBigInteger('rol_id')->unsigned();
            $table->string('permissions');
            $table->unsignedBigInteger('created_by')->unsigned();
            $table->unsignedBigInteger('updated_by')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('module_id')->references('id')->on('modules');
            $table->foreign('rol_id')->references('id')->on('rols');

            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('module_rols');
    }
}
