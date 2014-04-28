@extends('layouts.base')

@section('content')
<div class="container">
	<h1>Bienvenido</h1>
		{{ HTML::link('/logout', 'Cerrar sesión.') }}
</div>
@stop
