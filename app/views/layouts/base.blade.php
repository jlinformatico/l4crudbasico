<!DOCTYPE html>
<html lang="es">

<head>	
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="capacitate con cursos a costos sociales en el instituto nacional de estadística e informática">
    <meta name="author" content="ineidevs">
    
	<title>Escuela Nacional de Estadística e Informática - INEI TACNA</title>
	
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}" />
	
	<!-- Add custom CSS here -->
	<link rel="stylesheet" href="{{ URL::asset('css/modern-business.css') }}" />
	<link rel="stylesheet" href="{{ URL::asset('font-awesome/css/font-awesome.min.css') }}" />

</head>
<body>
<div class="container-full">

	<header class="row">
		@include('layouts.secciones.header')
	</header>

	<div class="row"> 
		@yield('content')
	</div>

	<footer class="row">
		@include('layouts.secciones.footer')
	</footer>
</div>
	<!-- JS -->
	<script src="{{ URL::asset('js/jquery-1.10.2.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.js') }}"></script>
    <script src="{{ URL::asset('js/modern-business.js') }}"></script>
</body>
</html>
