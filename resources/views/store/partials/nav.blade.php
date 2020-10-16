<!-- Barra de Navegación -->

<nav class="navbar navbar-default"> <!-- Nav -->
  <div class="container-fluid"> <!-- Contenedor -->
    <div class="navbar-header"> <!-- Cabecera -->
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <!-- Responsive -->
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand main-title" href="{{ route('home') }}">infoMática</a>
    </div> <!-- Fin Cabecera -->

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"> <!-- Recogido por Responsive -->
    <!-- Buscador -->
    <div class="col-sm-3 col-md-3">
        <form class="navbar-form navbar-left" method="get" action="{{url('home/searchredirect')}}" role="search">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search" name="search">
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>   
        </div>
        </form>
    </div>
      <!-- Enlaces -->
      <ul class="nav navbar-nav navbar-right">
        <!-- Carrito -->
        <li><a href="{{ route('cart-show') }}"><i class="fa fa-shopping-cart"></i></a></li>
        <!-- Categorias -->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Categorías<span class="caret"></span></a>
          <!-- SubCategorias -->
          <ul class="dropdown-menu" role="menu">
            @foreach($categories as $category)
              <li>
                <a href="{{ route('category', $category->id.'-'.$category->link) }}">{{ $category->name }}</a>  
              </li>
            @endforeach    
          </ul>
        </li> 
        <li><a href="{{ route('conocenos') }}">Conócenos<span class="sr-only">(current)</span></a></li>
        <li><a href="{{ route('contacto') }}">Contacto<span class="sr-only">(current)</span></a></li>
        <!-- Vista Parcial User -->
        @include('store.partials.menu-user')
      </ul> <!-- Fin Enlaces -->
    </div> <!-- Fin Recogido por Responsive -->
  </div> <!-- Fin Contenedor -->
</nav> <!-- Fin Nav --> 
