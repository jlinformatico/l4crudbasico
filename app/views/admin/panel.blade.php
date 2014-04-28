@extends('layouts.base')

@section('content')
<div class="container">
	<h1>Bienvenido {{ Auth::Usuario()->UsuNombre; }}</h1>
		{{ HTML::link('/logout', 'Cerrar sesión.') }}
	<h1>Accede a tu Panel de {{ Auth::Usuario()->Usuario; }}</h1>
		{{ HTML::link('/usuarios', 'Gestionar usuarios.') }}
</div>
@stop
