<!-- Pestaña Conócenos -->

<!-- Usar el template 'store' -->
@extends('store.template')

<!-- Declarar una sección que se va a rellenar en otro lugar -->
@section('content')

<section class="container">
	<div class="page-header text-center">
		<h1><i class="fa fa-info-circle"></i> Conócenos</h1>
	</div>

	<div class="row">
			<div class="col-md-6">
				<p class="info">				
					<b>infoMática</b> nace en 2016. En todo momento hemos apostado por la venta online de productos
					informáticos, algo que no para de innovar y crecer. 
					Todo esto nació como un proyecto ilusionante, puesto en marcha por un único atrevido, 
					poco a poco se ha integrado en el mundo de la venta informática online.
					La idea principal es y siempre será poder ofrecer a todos los amantes de la informática y
					las nuevas tecnologías productos específicos a precios asequibles sin renunciar a la calidad.
					Todo, manteniendo la esencia del pequeño comercio, estanco cerca de los clientes y ofreciendo
					un trato personalizado.
					Hicimos de esas máximas nuestra filosofía y pronto conseguimos ganarnos la confianza de los consumidores.<br/><br/>
					Tras un comienzo fulgurante, en muy poco tiempo, <a href="#" 
					target="_blank">infoMática</a> se afianzó como punto de referencia en 
					la venta online de productos informáticos y tecnológicos en España, 
					contando con miles de compradores en su primer año de vida en la red.<br/><br/>
					Gracias a nuestro esfuerzo diario, al trato personal y directo y a nuestro servicio 
					postventa nos hemos posicionado como la tienda online española de 
					informática y tecnología más visitada.<br/><br/>
					¡¡ GRACIAS por hacer realidad este sueño !!
				</p>
			</div>
			<div class="col-md-6">
				<div style="padding-left:20px;">
					<iframe width="450" height="353" src="//www.youtube.com/embed/MCnf7VWYIDM" frameborder="0" allowfullscreen></iframe>
				</div>
			</div>
	</div>

	<div class="row">
		
		<div class="col-md-4">
			<h3 class="text-center">Atención al cliente</h3>
			<img class="text-center" src="{{ asset('info/info1.jpg') }}" align="center"/>
			<p class="info">
			Si tienes preguntas o deseas recibir información sobre alguno de nuestros artículos, puedes contactar con nosotros <a href="#" target="_blank">creando un ticket</a> en nuestra página web.<br/>
			Recibirás una atención totalmente personalizada ¡y sin esperas! por parte de un equipo de profesionales altamente cualificados.
			</p>
		</div>
		
		<div class="col-md-4">
		<h3 class="text-center">Fácil Navegación</h3>
		<img class="text-center" src="{{ asset('info/info2.jpg') }}" align="center"/>
		<p class="info">
			En Pccomponentes te ofrecemos mucho más que tecnología, te ofrecemos la mejor experiencia de compra: buscador eficaz de artículos, opiniones de otros clientes sobre productos, pago seguro y un sistema de compra fácil y rápido. 
			¡Comprar nunca ha sido tan rápido y sencillo!
		</p>
		</div>
		
		<div class="col-md-4">
		<h3 class="text-center">Compra segura</h3>
		<img class="text-center" src="{{ asset('info/info3.jpg') }}" align="center"/>
		<p class="info">
			Una vez que añadas a la cesta los artículos que deseas comprar podrás escoger la forma de pago segura que mejor se te adapte. <br/>
			Puedes pagar con transferencia o ingreso bancario, tarjeta de débito, contrareembolso, v by Visa, financiación bancaria (ver condiciones) e incluso en metálico si recoges el pedido en tienda.	
		</p>
		</div>

		<div class="col-md-4">
		<h3 class="text-center">Envíos Rápidos</h3>
		<img class="text-center" src="{{ asset('info/info4.jpg') }}" align="center"/>
		<p class="info">
			Antes de efectuar la compra tus gastos de envío se calcularán automáticamente en base a los productos que tengas en la cesta y según la agencia de transportes seleccionada. <br/>
			Procedemos al envío de los pedidos sin demora, normalmente el mismo día que realizas el pedido si los artículos pedidos están en stock.
		</p>
		</div>

		<div class="col-md-4">
		<h3 class="text-center">Servicio Técnico</h3>
		<img class="text-center" src="{{ asset('info/info5.jpg') }}" align="center"/>
		<p class="info">
			En PcComponentes contamos con un gran equipo de profesionales especializado en el montaje y la reparación de equipos informáticos. <br/>
			En nuestras instalaciones disponemos de un área acondicionada donde obtendrás un servicio adecuado a tus necesidades. ¡Optimizamos los tiempos sin renunciar a la calidad!
		</p>
		</div>

		<div class="col-md-4">
		<h3 class="text-center">Tienda Física</h3>
		<img class="text-center" src="{{ asset('info/info6.jpg') }}" align="center"/>
		<p class="info">
			Disponemos de una tienda para la venta directa al público donde podrás realizar tu compra, asesorado por nuestros expertos, o recoger un pedido realizado previamente por internet desde casa. <br/>
			Nuestras instalaciones cuentan con más de 3.000 m2 de almacenaje, para poder albergar el mayor surtido de artículos y garantizarte su disponibilidad.
		</p>
		</div>						

	</div>
	<hr>

</section>

<!-- Fin de sección -->
@stop