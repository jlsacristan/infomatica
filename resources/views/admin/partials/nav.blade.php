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
      <a class="navbar-brand main-title" href="#">infoMática</a>
    </div> <!-- Fin Cabecera -->

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"> <!-- Recogido por Responsive -->
      <!-- Enlaces -->
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Categorias</a></li>
        <li><a href="#">Productos</a></li>
        <li><a href="#">Pedidos</a></li>
        <li><a href="#">Usuarios</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            <i class="fa fa-user"></i> {{ Auth::user()->user }} <span class="caret"></span>
          </a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="{{ route('home') }}">Regresar a infoMática</a></li>
            <li><a href="{{ route('logout') }}">Finalizar sesión</a></li>
          </ul>
        </li>
      </ul> <!-- Fin Enlaces -->
    </div> <!-- Fin Recogido por Responsive -->
  </div> <!-- Fin Contenedor -->
</nav> <!-- Fin Nav --> 