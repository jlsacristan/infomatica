<!-- Carrito de Compra -->

@extends('store.template')

@section('content')

<section class="container text-center">
	<div class="page-header">
		<h1><i class="fa fa-shopping-cart"></i> Mi Carrito de Compra</h1>
	</div>

	<div class="table-cart">
		<!-- Si la variable de sesión Cart contiene articulos... -->
		@if(count($cart))

		<p>
			<a href="{{ route('cart-trash') }}" class="btn btn-danger">
				Vaciar carrito <i class="fa fa-trash"></i>
			</a>
		</p>

		<div class="table-responsive">
			<table class="table table-striped table-hover table-bordered">
				<thead>
					<tr>
						<th>Imagen</th>
						<th>Producto</th>
						<th>Precio</th>
						<th>Cantidad</th>
						<th>Subtotal</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($cart as $articulo)
					<tr>
						<td><img src="{{ asset('img/') }}/{{ $articulo->image }}"/></td>
						<td>{{ $articulo->name }}</td>
						<td>{{ number_format($articulo->price,2) }}€</td>
						<td>
							<input class="btn-update-item" 
							data-href="{{ route('cart-update', $articulo->link) }}"
							data-id = "{{ $articulo->id }}"
							type="number" 
							min="1" 
							max="{{ $articulo->quantity_stock }}"
							value="{{ $articulo->quantity_item }}"
							id="product_{{ $articulo->id }}" />
							<i class="fa fa-refresh"></i>

							<!-- <a href="" class="btn btn-warning btn-update-item"
							data-href="{{ route('cart-update', $articulo->link) }}"
							data-id = "{{ $articulo->id }}">
								<i class="fa fa-refresh"></i>
							</a> -->					
						</td>
						<td>{{ number_format($articulo->price * $articulo->quantity_item,2) }}€</td>
						<td>
							<a href="{{ route('cart-delete', $articulo->link) }}" class="btn btn-danger"><i class="fa fa-remove"></i>
							</a>
						</td>
					</tr>
					@endforeach
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td align="right">
							<p class="precio">Importe:</p>
						</td>
						<td align="center">
							<p>{{ number_format($total,2) }}€</p>	
						</td>
						<td></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td align="right">
							<p class="precio">IVA (21%):</p>
						</td>
						<td align="center">
							<p>{{ number_format($total * 0.21,2) }}€</p>
						</td>
						<td></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td align="right">
							<p class="precio">Total:</p>
						</td>
						<td align="center">
							<p>{{ number_format($total * 1.21,2) }}€</p>
						</td>
						<td></td>
					</tr>					
		<!-- Si la variable de sesión Cart, no contiene articulos... -->
		@else
			<!-- Muestra mensaje de aviso al usuario -->
			<h3><p>No hay productos en el carrito</p></h3>	
		@endif
				</tbody>
			</table>
			<hr>

			<p>
				<a href="{{ route('home') }}" class="btn btn-primary">
					<i class="fa fa-chevron-circle-left"></i> Seguir comprando
				</a>

				<a href="{{ route('order-detail') }}" class="btn btn-primary">
				 Continuar <i class="fa fa-chevron-circle-right"></i>
				</a>
			</p>
		</div>
	</div>
</section>	

@stop
