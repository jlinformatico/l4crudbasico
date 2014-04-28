<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicacionesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//tabla publicaciones
		Schema::create('publicaciones',function($table)
		{
			$table->engine = 'InnoDB';
	        $table->increments('Pubidentificador');
			//$table->unsignedInteger('user_id');
			$table->integer('FK_Usuario')->unsigned();
			$table->foreign('FK_Usuario')->references('Usuidentificador')->on('usuarios');
	        $table->string('PubTitulo',150);
			$table->string('PubUrl',150);
			$table->text('PubContenido');
			$table->integer('PubEstado');
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
		//
		Schema::drop('publicaciones');
	}

}
