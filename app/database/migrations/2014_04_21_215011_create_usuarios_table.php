<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('usuarios', function($table)
		{
			$table->increments('Usuidentificador');					
			$table->string('Usuario'); //dni
			$table->string('UsuNombre');
			$table->string('password');
			//$table->integer('FK_TipoUsuario')->unsigned();
			//$table->foreign('FK_TipoUsuario')->references('PK_TipoUsuario')->on('t_tipo_usuario');
			$table->integer('UsuEstado');
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
		Schema::drop('usuarios');
	}

}
