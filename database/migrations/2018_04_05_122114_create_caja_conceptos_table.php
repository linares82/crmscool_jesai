<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCajaConceptosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	    Schema::create('caja_conceptos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->float('monto');
            $table->boolean('activo');
            $table->integer('usu_alta_id')->unsigned();
            $table->integer('usu_mod_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('usu_mod_id')->references('id')->on('users');
            $table->foreign('usu_alta_id')->references('id')->on('users');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('caja_conceptos');
	}

}
