<div class="alert alert-info alert-dismissible text-center" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
	<h2>
	<strong>
	<i class="fa fa-info-circle"></i>
	<!-- Recuperar la variable de sesión con el mensaje de 'Compra exitosa' de PaypalController -->
	</strong> {{ \Session::get('message') }}
	</h2>
</div>