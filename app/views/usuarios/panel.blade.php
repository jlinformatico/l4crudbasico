@extends('layouts.base')

@section('content')
<div class="container">
	<h1>Bienvenido {{ Auth::user()->name; }}</h1>
		{{ HTML::link('/logout', 'Cerrar sesión.') }}
	<h1>Accede a tu panel de {{ Auth::user()->PK_Usuario; }}</h1>
		{{ HTML::link('/usuarios', 'Gestionar usuarios.') }}
</div>
@stop
