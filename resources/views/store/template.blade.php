 <!-- Templates / Plantillas -
  -	Utilizadas para ahorrar código -->

  <!-- Blade / motor de plantillas de Laravel -->

 <!-- Template Única -->

 <!DOCTYPE HTML>
 <html lang="es">
 <head>
 	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 	<title>@yield('title', 'infoMática')</title>
 	<!-- Enlace externo BootStrap -->
 	<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/lumen/bootstrap.min.css" rel="stylesheet">
 	<!-- Enlace externo Iconos -->
 	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet">
 	<!-- Estilo Propio Css -->
 	<link href="{{ asset('css/main.css') }}" rel="stylesheet">
 	<!-- Google Fonts -->
 	<link href='https://fonts.googleapis.com/css?family=Quicksand|Hammersmith+One' rel='stylesheet' type='text/css'>
 </head>
 <body>
 		<!-- Mostrar mensaje de compra exitosa si el usuario compra un pedido correctamente -->
 		@if(\Session::has('message'))
			@include('store.partials.messages')
		@endif

 		<!--vista menú de navegación-->
 		@include('store.partials.nav')

 		<!-- Vista que nos permite definir áreas del archivo que se van a poder sustituir -->
 		@yield('content')

 		<!--vista de footer-->
 		@include('store.partials.footer')

 		<!--vista de pie de página-->
 		@include('store.partials.foot')

 		<!-- Enlaces jQuery -->
 		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script src="{{ asset('js/pinterest_grid.js') }}"></script>
		<script src="{{ asset('js/main.js') }}"></script>
 </body>
 </html>