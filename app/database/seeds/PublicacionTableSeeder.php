<?php

/**
 * Agregamos un usuario nuevo a la base de datos.
 */
class PublicacionTableSeeder extends Seeder {
    public function run(){
        Publicacion::create(array(
			'FK_Usuario'  => 1,
			'PubTitulo'  => 'Cursos ENEI',
            'PubUrl' => 'Cursos-ENEI',
			'PubContenido' => 'Se dictan cursos de capacitacion',
            'PubEstado'=> 1,
        ));
    }
}
