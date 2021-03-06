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

<h1>Crear Usuario</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all() )}}

{{ Form::open(array('url' => 'usuarios/create')) }}

	<div class="form-group">
		{{ Form::label('username', 'Usuario') }}
		{{ Form::text('username', Input::old('username'), array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('email', 'Email') }}
		{{ Form::email('email', Input::old('email'), array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('name', 'Tipo Usuario') }}
		{{ Form::select('tipousuarios[]',$tipousuarios, Usuario::onTipoUsuarios($tipousuarios->id), array('multiple' => 'multiple', 'class' => 'form-control')) }}
	</div>

	{{ Form::submit('Crear Usuario!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>

@stop
