<?php

class Publicacion extends Eloquent{


	protected $table = 'publicaciones';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	**/
	public function usuario()
	{
		return $this->belongsTo('Usuario','Usuidentificador');

	}

}
