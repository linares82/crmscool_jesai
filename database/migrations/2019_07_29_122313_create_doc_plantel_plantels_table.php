<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocPlantelPlantelsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('doc_plantel_plantels', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('doc_plantel_id')->unsigned();
            $table->integer('plantel_id')->unsigned();
            $table->date('fec_vigencia')->nullable();
            $table->string('archivo')->nullable();
            $table->integer('usu_alta_id')->unsigned();
            $table->integer('usu_mod_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('usu_mod_id')->references('id')->on('users');
            $table->foreign('usu_alta_id')->references('id')->on('users');
            $table->foreign('plantel_id')->references('id')->on('plantels');
            $table->foreign('doc_plantel_id')->references('id')->on('doc_plantels');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('doc_plantel_plantels');
	}

}
