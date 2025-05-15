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
    .ville-img {
      width: 100%;
      height: 180px;
      object-fit: cover;
      border-radius: 10px;
    }

    .card-ville {
      overflow: hidden;
      border: none;
    }

    .navbar-brand img {
      border-radius: 50%;
    }

    .highlight-bar {
      overflow: hidden;
      white-space: nowrap;
      animation: scroll 12s linear infinite;
      font-weight: bold;
      font-size: 1.1rem;
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
          <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Connexion</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container my-5">

<div class="text-center mb-5">
    <h1 class="fw-bold">Accueil</h1>
    <p class="text-muted">Bienvenue sur la plateforme d'administration d'Eloquéncia</p>
</div>

<div class="row g-4">

    <!-- Leçon -->
    <div class="col-md-4">
        <div class="card h-100 border-0 shadow">
            <div class="card-body text-center">
                <img src="https://img.icons8.com/fluency/48/book.png" alt="Leçons" class="mb-3" width="48">
                <h5 class="card-title fw-bold">Leçons</h5>
                <p class="card-text text-muted">Gérer les leçons du site et de l'application</p>
                <a href="{{ url('/lecons') }}" class="btn btn-warning">Accéder</a>
            </div>
        </div>
    </div>

    <!-- Remises -->
    <div class="col-md-4">
        <div class="card h-100 border-0 shadow">
            <div class="card-body text-center">
                <img src="https://img.icons8.com/fluency/48/discount.png" alt="Remises" class="mb-3" width="48">
                <h5 class="card-title fw-bold">Remises</h5>
                <p class="card-text text-muted">Accéder aux demandes de réduction</p>
                <a href="{{ url('/gestion_reduction') }}" class="btn btn-warning">Accéder</a>
            </div>
        </div>
    </div>

    <!-- Messagerie -->
    <div class="col-md-4">
        <div class="card h-100 border-0 shadow">
            <div class="card-body text-center">
                <img src="https://img.icons8.com/fluency/48/new-post.png" alt="Messagerie" class="mb-3" width="48">
                <h5 class="card-title fw-bold">Messagerie</h5>
                <p class="card-text text-muted">Consulter les messages reçus</p>
                <a href="{{ url('/messagerie') }}" class="btn btn-warning">Accéder</a>
            </div>
        </div>
    </div>

    <!-- Utilisateurs -->
    <div class="col-md-4">
        <div class="card h-100 border-0 shadow">
            <div class="card-body text-center">
                <img src="https://img.icons8.com/fluency/48/user-group-man-man.png" alt="Utilisateurs" class="mb-3" width="48">
                <h5 class="card-title fw-bold">Utilisateurs</h5>
                <p class="card-text text-muted">Gérer les utilisateurs administrateurs</p>
                <a href="{{ url('/gestion_admins') }}" class="btn btn-warning">Accéder</a>
            </div>
        </div>
    </div>

    <!-- Adhérents -->
    <div class="col-md-4">
        <div class="card h-100 border-0 shadow">
            <div class="card-body text-center">
                <img src="https://img.icons8.com/fluency/48/group-foreground-selected.png" alt="Adhérents" class="mb-3" width="48">
                <h5 class="card-title fw-bold">Adhérents</h5>
                <p class="card-text text-muted">Gérer les adhérents de l'association</p>
                <a href="{{ url('/members') }}" class="btn btn-warning">Accéder</a>
            </div>
        </div>
    </div>

    <!-- Paramètres -->
    <div class="col-md-4">
        <div class="card h-100 border-0 shadow">
            <div class="card-body text-center">
                <img src="https://img.icons8.com/fluency/48/settings.png" alt="Paramètres" class="mb-3" width="48">
                <h5 class="card-title fw-bold">Paramètres</h5>
                <p class="card-text text-muted">Modifier les paramètres du site et du LMS</p>
                <a href="{{ url('/parametre') }}" class="btn btn-warning">Accéder</a>
            </div>
        </div>
    </div>

</div>

</div>


  <footer class="bg-light text-center py-3">
  <div class="container">
    <small class="text-muted">
      © 2025 <strong>Eloquéncia</strong> | Fait avec 💙 et hébergé à Marseille | <a href="/mentions_legales">Mentions légales</a>
    </small>
  </div>
  </footer>

  <!-- Scripts Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
