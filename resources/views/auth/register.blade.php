<!-- Formulario de Registro -->
@extends('store.template')

@section('content')
	<div class="container text-center">

		<div class="page-header">
		  <h1><i class="fa fa-user-plus"></i> Registrarse</h1>
		</div>

		<div class="row">
			<div class="col-md-offset-2 col-md-8">
				<div class="page">

				@include('store.partials.errors')

				<form class="form-horizontal" method="post" role="form" action="/auth/register">
				{!! csrf_field() !!}
				    <div class="form-group">
				        <label class="control-label col-xs-3">Email:</label>
				        <div class="col-xs-9">
				            <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
				        </div>
				    </div>
				    <div class="form-group">
				        <label class="control-label col-xs-3">Nombre Completo:</label>
				        <div class="col-xs-9">
				            <input type="text" class="form-control" placeholder="Nombre" name="name" value="{{ old('name') }}">
				        </div>
				    </div>
				    <div class="form-group">
				        <label class="control-label col-xs-3" >Dni:</label>
				        <div class="col-xs-9">
				            <input type="text" class="form-control" placeholder="Dni" name="nif" value="{{ old('nif') }}">
				        </div>
				    </div>
				    <div class="form-group">
				        <label class="control-label col-xs-3">Usuario:</label>
				        <div class="col-xs-9">
				            <input type="user" class="form-control" name="user" placeholder="Usuario" value="{{ old('user') }}">
				        </div>
				    </div>				    				    
				    <div class="form-group">
				        <label class="control-label col-xs-3" >Teléfono:</label>
				        <div class="col-xs-9">
				            <input type="tel" class="form-control" placeholder="Teléfono" name="tlf" value="{{ old('tlf') }}">
				        </div>
				    </div>
				    <div class="form-group">
				        <label class="control-label col-xs-3">Password:</label>
				        <div class="col-xs-9">
				            <input type="password" class="form-control" name="password" placeholder="Contraseña" value="{{ old('password') }}">
				        </div>
				    </div>
				    <div class="form-group">
				        <label class="control-label col-xs-3">Confirmar Password:</label>
				        <div class="col-xs-9">
				            <input type="password" class="form-control" placeholder="Confirmar Contraseña" name="password_confirmation" value="{{ old('password_confirmation') }}">
				        </div>
				    </div>
				    <div class="form-group">
				        <label class="control-label col-xs-3">Dirección:</label>
				        <div class="col-xs-9">
				            <input rows="3" type="text" name="address" value="{{ old('address') }}" class="form-control" placeholder="Dirección"></input>
				        </div>
				    </div>
				    <div class="form-group">
				        <label class="control-label col-xs-3">Código Postal:</label>
				        <div class="col-xs-9"> 
				            <input rows="3" type="text" name="cp" value="{{ old('cp') }}" class="form-control" placeholder="Código Postal"></input>
				        </div>
				    </div>
				    <div class="form-group">
				        <label class="control-label col-xs-3">Localidad:</label>
				        <div class="col-xs-9">
				            <input rows="3" type="text" name="town" value="{{ old('town') }}" class="form-control" placeholder="Localidad"></input>
				        </div>
				    </div>
				    <div class="form-group">
				        <label class="control-label col-xs-3">Provincia:</label>
				        <div class="col-xs-9">
				            <input rows="3" type="text" name="province" value="{{ old('province') }}" class="form-control" placeholder="Provincia"></input>
				        </div>
				    </div>
				    <div class="form-group">
				        <label class="control-label col-xs-3">País:</label>
				        <div class="col-xs-9">
				            <input rows="3" type="text" name="country" value="{{ old('country') }}" class="form-control" placeholder="País"></input>
				        </div>
				    </div>				    				 				    
				    <div class="form-group">
				        <div class="col-xs-offset-3 col-xs-6">
				            <label class="checkbox-inline">
				                <input type="checkbox" value="agree">  Acepto <a href="#">Terminos y condiciones</a>.
				            </label>
				        </div>
				    </div>
				    <br>
				    <div class="form-group">
				        <div class="col-xs-offset-3 col-xs-6">
				            <input type="submit" class="btn btn-primary" value="Enviar">
				            <input type="reset" class="btn btn-default" value="Limpiar">
				        </div>
				    </div>
				</form>
				<hr>

				</div>
			</div>
		</div>
	</div>

@stop
