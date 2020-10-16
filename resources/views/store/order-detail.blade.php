<!-- Detalle del Pedido -->

@extends('store.template')

<!-- Sección del Detalle del Pedido -->
@section('content')
	
	<section class="container text-center">
		<div class="page-header">
			<h1><i class="fa fa-shopping-cart"></i> Detalle del pedido</h1>
		</div>

		<div class="page">
			<div class="table-responsive">
				<h3>Datos de Facturación</h3>
				<table class="table table-bordered">
				<tr>
					<td>
						{{ Auth::user()->name . " (" . Auth::user()->nif .")" }}	
					</td>
				</tr>
				<tr>
					<td>
						C/ {{ Auth::user()->address }}
					</td>
				</tr>
				<tr>	
					<td>
						{{ Auth::user()->town ." - (". Auth::user()->cp .") " }}
					</td>
				</tr>
				<tr>
					<td>
						{{ Auth::user()->province .", ". Auth::user()->country }}
					</td>
				</tr>
				</table>
			</div>	
			<div class="table-responsive">
				<h3>Datos del pedido</h3>
				<table class="table table-striped table-hover table-bordered">
					<tr>
						<th>Producto</th>
						<th>Precio</th>
						<th>Cantidad</th>
						<th>Subtotal</th>
					</tr>
					@foreach($cart as $articulo)
						<tr>
							<td>{{ $articulo->name }}</td>
							<td>{{ number_format($articulo->price,2) }}€</td>
							<td>{{ $articulo->quantity_item }}</td>
							<td>{{ number_format($articulo->price * $articulo->quantity_item,2) }}€</td>
						</tr>
					@endforeach
					<tr>
						<td colspan="4"></td>
					</tr>	
					<tr>
						<td></td>
						<td></td>
						<td align="right">
							<p class="precio">Importe:</p>
						</td>
						<td align="center">
							<p>{{ number_format($total,2) }}€</p>	
						</td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td align="right">
							<p class="precio">IVA (21%):</p>
						</td>
						<td align="center">
							<p>{{ number_format($total * 0.21,2) }}€</p>
						</td>
					</tr>				
					<tr>
						<td></td>
						<td></td>
						<td align="right">
							<p class="precio">Total:</p>
						</td>
						<td align="center">
							<p>{{ number_format($total * 1.21,2) }}€</p>
						</td>
					</tr>					
				</table>
				<p>* Gastos de Envío: 5.50€</p>		
				<hr>
				<p>
					<a href="{{ route('cart-show') }}" class="btn btn-primary">
						<i class="fa fa-chevron-circle-left"></i> Volver
					</a>

					<a href="{{ route('payment') }}" class="btn btn-success">
						Pagar con <i class="fa fa-cc-paypal fa-2x"></i>
					</a>
				</p>
			</div>
		</div>
	</section>

@stop