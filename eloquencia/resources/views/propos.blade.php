<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Eloquéncia</title>
  <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .timeline-step {
    position: relative;
    padding-left: 30px;
    border-left: 3px solid #ffc107;
    }
    .timeline-step::before {
    content: '';
    position: absolute;
    left: -9px;
    top: 5px;
    width: 15px;
    height: 15px;
    background-color: #ffc107;
    border-radius: 50%;
    }

    @keyframes scroll {
      0%   { transform: translateX(100%); }
      100% { transform: translateX(-100%); }
    }
  </style>
</head>
<body class="pt-5 bg-light">

  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg bg-warning shadow-sm fixed-top">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" width="40" height="40" class="me-2">
        <strong>Eloquéncia</strong>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="menu">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="{{ url('/rejoindre') }}">Rejoindre</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ url('/blog') }}">Blog</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ url('/#partenaire') }}">Partenaires</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ url('/reduction') }}">Réduction</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ url('/#contact') }}">Contact</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ url('/propos') }}">A propos</a></li>
          <li class="nav-item"><a class="nav-link" href="">Connexion</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <section class="py-5 bg-light">
  <div class="container">
    <h2 class="text-center fw-bold mb-5">Notre parcours</h2>
    
    <div class="timeline">
      <div class="timeline-step mb-5">
        <h5 class="fw-bold text-warning">2018</h5>
        <p>Création d’Eloquéncia par Marouan Jlassi, un projet scolaire devenu national.</p>
      </div>
      <div class="timeline-step mb-5">
        <h5 class="fw-bold text-warning">2020</h5>
        <p>Lancement du premier concours d’éloquence régional à Avignon.</p>
      </div>
      <div class="timeline-step mb-5">
        <h5 class="fw-bold text-warning">2023</h5>
        <p>Création de la plateforme de cours en ligne. +100 jeunes accompagnés.</p>
      </div>
      <div class="timeline-step">
        <h5 class="fw-bold text-warning">2024</h5>
        <p>Objectif national : ateliers dans 10 villes, +1 000 jeunes à former</p>
      </div>
    </div>
  </div>
  </section>


  <footer class="bg-light text-center py-3">
  <div class="container">
    <small class="text-muted">
      © 2024 <strong>Eloquência</strong> | Fait avec <span style="color: #e25555;">❤</span> et hébergé à Marseille
    </small>
  </div>
  </footer>

  <!-- Scripts Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
