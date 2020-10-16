<!-- Index de la app -->

<!-- Usar el template 'store' -->
@extends('store.template')

<!-- Declarar una sección que se va a rellenar en otro lugar -->
@section('content')

<!-- Vista Slider -->
@include('store.partials.slider')

<section class="container text-center">
	<div id="products">
		<!-- mostrar los productos -->
		@foreach($products as $product) 
			<article class="product white-panel">
				<h3 class="title">{{ $product->name }}</h3>
				<hr>
				<!-- Buscar en todo el proyecto la carpeta 'img' y visualizar la imagen que corresponde -->
				<img src="{{ asset('img/') }}/{{ $product->image }}" width="200" />
				<div class="product-info panel">
					<p>{{ $product->short_description }}</p>
					<h3>
						<span class="label label-success">
							Precio: {{ number_format($product->price, 2) }}€
						</span>
					</h3>
					<p>
						<!-- Btn añadir al carrito -->
						<a class="btn btn-warning" href="{{ route('cart-add', $product->link) }}"><i class="fa fa-cart-plus"></i> Lo quiero</a>
						<!-- Generar la Url, navegar en la app -->
						<a class="btn btn-primary" href="{{ route('product-detail', $product->link) }}"><i class="fa fa-chevron-circle-right"></i> Leer más</a>

					</p>
				</div>
			</article>
		@endforeach
	</section>
</div>	

<!-- Paginador -->
<div align="right" class="paginador">
	{!! $products->render() !!}
</div>	

<!-- Fin de sección -->
@stop	
