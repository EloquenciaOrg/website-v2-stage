<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Eloquéncia</title>
  <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/propos.css') }}">
  <!-- Icons8 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <!-- AOS -->
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">


  <style>
    
  </style>
</head>
<body class="bg-light">

  <!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Eloquéncia</title>
  <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="d-flex">
  <!-- Sidebar -->
  <aside class="d-flex flex-column bg-white border-end shadow-sm" style="width: 260px; min-height: 100vh;">
  <!-- Logo -->
  <div class="d-flex align-items-center px-3 py-4 border-bottom">
    <img src="{{ asset('images/logo.png') }}" alt="Logo" width="36" height="36" class="me-2">
    <span class="fs-5 fw-bold text-dark">Eloquéncia</span>
  </div>

  <!-- Nav -->
  <ul class="nav nav-pills flex-column mb-auto px-3 py-3">
    <li class="nav-item mb-2">
      <a href="{{ url('/lms/lms') }}" class="nav-link text-dark fw-bold border">
        <i class="bi-house"></i> Accueil
      </a>
    </li>
  @foreach ($chapters as $chapter)
    <li class="nav-item">
      <a href="{{ url('/lms/chapitre/' . $chapter->ID) }}" class="nav-link text-dark fw-semibold d-flex align-items-center">
        <i class="bi bi-book me-2"></i> {{ $chapter->name }}
      </a>
    </li>
  @endforeach
</ul>

  @auth('member')
  <div class="mt-auto px-3 pb-5">
    <form method="POST" action="/logout">
      @csrf
      <button type="submit" class="btn btn-outline-dark w-100 d-flex align-items-center justify-content-center">
        <i class="bi bi-box-arrow-right me-2"></i> Déconnexion
      </button>
    </form>
  </div>
  @endauth
</aside>

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
      <iframe 
        src="https://docs.google.com/forms/d/e/1FAIpQLScZBBZXxCYXq9HF4w6ErpxBCdsdLS882Hrf2Rz3g39OpMhhMw/viewform?embedded=true" 
        width="100%" height="550" frameborder="0" marginheight="0" marginwidth="0">
        Chargement…
      </iframe>
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

    <footer class="bg-light text-center py-3">
  <div class="container">
    <small class="text-muted">
      © 2025 <strong>Eloquéncia</strong> | Fait avec 💙 et hébergé en France | <a href="/mentions_legales">Mentions légales</a>
    </small>
  </div>
  </footer>
</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- AOS JS -->
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init();
</script>

</body>
</html>