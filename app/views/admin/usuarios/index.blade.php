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

<h1>Gestión de Usuarios del Sistema</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<td>ID</td>
			<td>Usuario</td>
			<td>Tipo Usuario</td>
			<td>E-mail</td>
			<td>Acciones</td>
		</tr>
	</thead>
	<tbody>
	@foreach($users as $value)
		<tr>
			<td>{{$value->Usuidentificador}}</td>
			<td>{{$value->Usuario}}</td>
			<td>{{$value->UsuNombre}}</td>
			<td></td>

			<!-- we will also add show, edit, and delete buttons -->
			<td>
				<!-- mostrar info del usuario (uses the show method found at GET /usuarios/{id} -->
				<a class="btn btn-small btn-success" href="{{ URL::to('usuarios/' . $value->Usuidentificador) }}">Ver info</a>

				<!-- editar usuario (uses the edit method found at GET /usuarios/{id}/edit -->
				<a class="btn btn-small btn-info" href="{{ URL::to('usuarios/' . $value->Usuidentificador . '/edit') }}">Editar</a>
				
				<a class="btn btn-small btn-info" href="{{ URL::to('usuarios/delete/' . $value->Usuidentificador ) }}">Eliminar</a>
			</td>
		</tr>
	@endforeach
	</tbody>
</table>

</div>
@stop
