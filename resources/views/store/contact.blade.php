<!-- Pestaña Contacto del Menu de Navegación -->

<!-- Usar el template 'store' -->
@extends('store.template')

<!-- Declarar una sección que se va a rellenar en otro lugar -->
@section('content')

<section class="container">
	
	<div class="page-header text-center">
		<h1><i class="fa fa-envelope"></i> Contacto</h1>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div id="accordion" role="tablist" aria-multiselectable="true">
			  
			 <div class="panel panel-default">
			    <div class="panel-heading" role="tab" id="headingOne">
			      <h4 class="panel-title">
			      <i class="fa fa-envelope-o"></i>
			        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
			       		¿Dónde nos encontramos?  
			        </a>
			      </h4>
			    </div>
			    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
			    	<dl class="contact-address text-center">
			    		<br />
			    		<dd>
							<span class="contact-street">
							<i class="fa fa-home" style="font-size:18px;color:blue"></i>
							 C/ Falsa, 123
							 <br />
							</span>
						</dd>
			    		<dd>
							<span class="contact-street">
							 Mota del Cuervo 
							 <br />
							</span>
						</dd>
			    		<dd>
							<span class="contact-street">
							 16630
							 <br />
							</span>
						</dd>						
			    		<dd>
							<span class="contact-street">
							 Cuenca
							 <br />
							</span>
						</dd>
			    		<dd>
							<span class="contact-street">
							 España
							 <br /><br />
							</span>
						</dd>
			    		<dd>
							<span class="contact-street">
							<i class="fa fa-phone-square" style="font-size:18px;color:red"></i>
							 677 21 64 98
							 <br />
							</span>
						</dd>						
			    	</dl> 
			    </div>
			</div>
			    
			<div class="panel panel-default">
			    <div class="panel-heading" role="tab" id="headingTwo">
			      <h4 class="panel-title">
			      <i class="fa fa-map-marker"></i>
			        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
			        	Localización
			        </a>
			      </h4>
			    </div>
			    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
			    	<div class="map-responsive col-lg-10">
			    	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3078.8335170231826!2d-2.871616385112072!3d39.49567371906204!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd6844631b6cb175%3A0x9888b6936a6fcbe5!2sCalle+Prado%2C+16630+Mota+del+Cuervo%2C+Cuenca%2C+Espa%C3%B1a!5e0!3m2!1ses!2sus!4v1463079185328" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
			    	</div>
			    </div>
			</div>

			  <div class="panel panel-default">
			    <div class="panel-heading" role="tab" id="headingThree">
			      <h4 class="panel-title">
			      <i class="fa fa-question-circle"></i>
			        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
			        	Formulario de Contacto
			        </a>
			      </h4>
			    </div>
			    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
			    
			    <div class="contact-form">
			    	@include('store.partials.errors')

			    	<form action="" method="" class="form-horizontal text-center" role="form">
			    	{!! csrf_field() !!}
			    		<legend>Envíar un correo electrónico</legend>
			    			<p><b>Todos los campos son obligatorios *</b></p>
  							<div class="form-group">
    							<div class="col-lg-10 control-input">
      								<input type="text" name="name" class="form-control"placeholder="Nombre *">
    							</div>
  							</div>
  							<div class="form-group">
    							<div class="col-lg-10 control-input">
      								<input type="email" name="email" class="form-control"placeholder="Email *">
    							</div>
  							</div>
  							<div class="form-group">
    							<div class="col-lg-10 control-input">
      								<input type="text" name="subject" class="form-control"placeholder="Asunto *">
    							</div>
  							</div>
  							<div class="form-group">
    							<div class="col-lg-10 control-input">
      								<textarea class="form-control" name="message" placeholder="Mensaje *" rows="3"></textarea>
    							</div>
  							</div>
				    		<div class="form-group">
						        <div class="col-xs-offset-3 col-xs-6">
						            <input type="submit" class="btn btn-primary" value="Enviar">
						        </div>
				    		</div> 	
			    	</form>	
			    </div>
			    </div>
	  		</div>
			
			</div>
		</div>
	</div>
	<hr>

</section>

<!-- Fin de sección -->
@stop