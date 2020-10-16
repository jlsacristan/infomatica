<!-- Slider de Imágenes -->

<div id="slider" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#slider" data-slide-to="0" class="active"></li>
    <li data-target="#slider" data-slide-to="1"></li>
    <li data-target="#slider" data-slide-to="2"></li>
    <li data-target="#slider" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="{{ asset('slider/slide1.jpg') }}" alt="slide1">
        <div class="carousel-caption">
        </div>
      </div>
      <div class="item">
        <img src="{{ asset('slider/slide2.jpg') }}" alt="slide2">
        <div class="carousel-caption">
        </div>
      </div>
      <div class="item">
        <img src="{{ asset('slider/slide3.jpg') }}" alt="slide3">
        <div class="carousel-caption">
        </div>
      </div>
      <div class="item">
        <img src="{{ asset('slider/slide4.jpg') }}" alt="slide4">
        <div class="carousel-caption">
        </div>
      </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#slider" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Anterior</span>
  </a>
  <a class="right carousel-control" href="#slider" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Siguiente</span>
  </a>
</div><hr>
</div>