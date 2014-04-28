@extends('layouts.base')

@section('content')

<div class="container">

<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::to('usuarios') }}">Usuarios del Sistema</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('usuarios') }}">Listar Usuarios</a></li>
		<li><a href="{{ URL::to('usuarios/create') }}">Crear Usuario</a>
	</ul>
</nav>

<h1>Perfil de {{ $user->username }}</h1>

	<div class="jumbotron text-center">
		<h2>{{ $user->username }}</h2>
		<p>
			<strong>Email:</strong> {{ $user->email }}<br>
			<strong>Tipo de Usuario:</strong> {{ $user->name }}
		</p>
	</div>

</div>

@stop
