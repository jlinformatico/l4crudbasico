<?php

/**
 * Agregamos un usuario nuevo a la base de datos.
 */
class UsuarioTableSeeder extends Seeder {
    public function run(){
        Usuario::create(array(
			'Usuario'  => '46835554',
			'UsuNombre'  => 'Jorge Linares Vera',
            'password' => Hash::make('admin'),
            'UsuEstado'=> 1,
        ));
    }
}
