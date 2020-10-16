<!-- Validar el Inicio de Sesión --> 

<!-- Si el usuario inicia sesión correctamente... -->     
@if(Auth::check())
	<li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
			<!-- Muestra su nombre de Usuario -->
			<span class="usuario">{{ Auth::user()->user }}</span> <span class="caret"></span>
		</a>
		<!-- Junto con un enlace para hacer Logout -->
		<ul class="dropdown-menu" role="menu">
			@if(Auth::user()->type == 'admin')
				<li><a href="admin/home">Ir al Panel de Control</a></li>
			@endif
			<li><a href="{{ route('logout') }}">Finalizar sesión</a></li>
		</ul>
	</li>
<!-- Sino ha iniciado sesión... -->	
@else
	<li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
			<i class="fa fa-user"></i> <span class="caret"></span>
		</a>
		<!-- Damos los enlaces a iniciar sesión y registrar user -->
		<ul class="dropdown-menu" role="menu">
			<li><a href="{{ route('login-get') }}">Iniciar sesión</a></li>
			<li><a href="{{ route('register-get') }}">Registrarse</a></li>
		</ul>
	</li>
@endif