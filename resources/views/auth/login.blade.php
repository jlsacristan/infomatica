<!-- Inicio de Sesión -->
@extends('store.template')

<!-- Sección 'Login' -->
@section('content')
	<div class="container text-center">
		<div class="page-header">
			<h1><i class="fa fa-user"></i> Iniciar sesión</h1>
		</div>

		<div class="row">
			<div class="col-md-offset-3 col-md-6">
				<div class="page">

					<!-- Si email o password son incorrectos informar al usuario -->
					@include('store.partials.errors')

					<form class="form-group" method="POST" action="/auth/login">
						<!-- importante --> 
					    {!! csrf_field() !!} <!-- usado para proteger a los formularios de la aplicación de ataques de tipo CSRF --> 

					    <legend>Introduce tu email y contraseña</legend>					 
				            <div class="input-group" style="width:97%;">
				                <span class="input-group-addon" style="width:40px;">
				                	<i class="fa fa-at"></i>
				                </span>
				                <input class="form-control" type="email" placeholder="email" name="email" value=" {{ old('email') }}"/>
				            </div>

				            <div class="input-group" style="width:97%;">
				                <span class="input-group-addon" style="width:40px;">
				                	<i class="fa fa-key"></i>
				                </span>
				                <input class="form-control" type="password" placeholder="contraseña" name="password" id="password" required />
				            </div>

				            <div class="form-group">
					        	<input type="checkbox" name="remember"> Recordar en este equipo
					    	</div>
					    <div class="form-group">
					        <button class="btn btn-primary" type="submit">Acceder</button>
					    </div>
					</form>
				</div>
			</div>
		</div>
	</div>

@stop