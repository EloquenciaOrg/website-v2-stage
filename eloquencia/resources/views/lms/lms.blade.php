@extends('layouts.base_lms')

@section('content')

  <!-- Contenu principal -->
  <div class="container py-5">
    <div class="text-center mb-4">
      <h1 class="fw-bold">Bienvenue @auth('member') {{ Auth::guard('member')->user()->firstname }} @endauth</h1>
    </div>

    <blockquote class="blockquote text-center text-muted mt-4">
      <p>"{{ $citation['text'] }}"</p>
      <footer class="blockquote-footer">{{ $citation['author'] }}</footer>
    </blockquote>

    <!-- Message d'accueil -->
    @if(isset($setting->title) && isset($setting->content))
    <div class="alert alert-warning">
        <h5><strong>{{ $setting->title }}</strong></h5>
        <div>{!! html_entity_decode($setting->content) !!}</div>
    </div>
    @endif

  <div class="container my-5">
  <div class="row g-5 align-items-center">
    
    <div class="col-md-6 border-end border-2">
      <!-- <iframe 
        src="https://docs.google.com/forms/d/e/1FAIpQLScZBBZXxCYXq9HF4w6ErpxBCdsdLS882Hrf2Rz3g39OpMhhMw/viewform?embedded=true" 
        width="100%" height="550" frameborder="0" marginheight="0" marginwidth="0">
        Chargement…
      </iframe> -->
    </div>

    <!-- Colonne Carousel -->
    <div class="col-md-6 text-center">
      <h3 class="fw-semibold mb-4">📸 Des images de notre dernier événement</h3>

      <div id="eloquenceCarousel" class="carousel slide rounded shadow" data-bs-ride="carousel">
        <div class="carousel-inner rounded">
          <div class="carousel-item active">
            <img src="/images/Eloquencia_groupe.png" class="d-block w-100 img-fluid" alt="Eloquencia groupe">
          </div>
          <div class="carousel-item">
            <img src="/images/marouan_gateau 2.png" class="d-block w-100 img-fluid" alt="Marouan gâteau 2">
          </div>
          <div class="carousel-item">
            <img src="/images/marouan_gateau.png" class="d-block w-100 img-fluid" alt="Marouan gâteau">
          </div>
        </div>

        <!-- Contrôles flèches -->
        <button class="carousel-control-prev" type="button" data-bs-target="#eloquenceCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#eloquenceCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon"></span>
        </button>
      </div>
    </div>
    
  </div>
</div>

@endsection