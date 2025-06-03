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


  <style>
    
  </style>
</head>
<body class="bg-light">

  <!-- SIDEBAR -->
<div class="d-flex">
  <aside class="d-flex flex-column bg-warning shadow-sm p-3" style="width: 240px; min-height: 100vh;">
    <!-- Logo -->
    <a href="{{ url('/') }}" class="d-flex align-items-center mb-4 text-dark text-decoration-none">
      <img src="{{ asset('images/logo.png') }}" alt="Logo" width="36" height="36" class="me-2">
      <span class="fs-5 fw-bold">Eloquéncia</span>
    </a>

    <!-- Navigation -->
    <ul class="nav nav-pills flex-column gap-1">
      <li class="nav-item">
        <a href="{{ url('/rejoindre') }}" class="nav-link text-dark d-flex align-items-center">
          <i class="bi bi-person-plus me-2"></i> Rejoindre
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url('/blog') }}" class="nav-link text-dark d-flex align-items-center">
          <i class="bi bi-journal-text me-2"></i> Blog
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url('/#partenaire') }}" class="nav-link text-dark d-flex align-items-center">
          <i class="bi bi-people me-2"></i> Partenaires
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url('/reduction') }}" class="nav-link text-dark d-flex align-items-center">
          <i class="bi bi-tag me-2"></i> Réduction
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url('/#contact') }}" class="nav-link text-dark d-flex align-items-center">
          <i class="bi bi-envelope me-2"></i> Contact
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url('/propos') }}" class="nav-link text-dark d-flex align-items-center">
          <i class="bi bi-info-circle me-2"></i> À propos
        </a>
      </li>

      @auth('member')
        <li class="nav-item mt-auto">
          <form method="POST" action="/logout">
            @csrf
            <button type="submit" class="btn btn-dark w-100 d-flex justify-content-center align-items-center mt-2">
              <i class="bi bi-box-arrow-right me-1"></i> Déconnexion
            </button>
          </form>
        </li>
      @endauth
    </ul>
  </aside>

  <div class="container py-5">
    <!-- Titre principal -->
    <div class="text-center mb-4">
        <h1 class="fw-bold">Bienvenue Test Eltchi</h1>
    </div>

    <!-- Carte de bienvenue -->
    <div class="alert alert-warning welcome-card mb-5 p-4">
        <h5><strong>Bienvenue sur Eloquéncia !</strong></h5>
        <p class="mb-1">
            Le <strong>chapitre 1</strong> est en cours de finalisation !
        </p>
        <p>
            Si vous connaissez des personnes compétentes en éloquence,<br>
            contactez-nous à <a href="mailto:contact@eloquencia.org">contact@eloquencia.org</a><br>
            Merci !
        </p>
    </div>

    <!-- Bloc Leçon suivante -->
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm welcome-card">
                <div class="card-header bg-warning text-white text-center fw-semibold fs-5">
                    Leçon suivante
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title">🎉 Félicitations !</h5>
                    <p class="card-text">Vous avez terminé toutes les leçons disponibles.</p>
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
</body>
</html>