<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Eloquéncial</title>
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

  <!-- DEMANDE DE REDUCTION -->
  <section class="py-5" id="reduction">
  <div class="container">
    <div class="mx-auto" style="max-width: 700px;">
      <h2 class="text-center fw-bold mb-2">Demander une réduction</h2>
      <p class="text-center text-muted mb-4">Vous êtes étudiant(e) ou mineur(e) ? Envoyez une demande ici.</p>
      @if(session('success'))
          <div class="alert alert-success">
              {{ session('success') }}
          </div>
      @endif
      @if(session('error'))
          <div class="alert alert-danger">
              {{ session('error') }}
          </div>
      @endif

      <form class="bg-white shadow rounded p-4" action="/demande_reduction" method="POST" enctype="multipart/form-data">
      @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Nom complet</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Jean Dupont" required>
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Adresse mail</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="email@example.com" required>
        </div>

        <div class="mb-3">
          <label for="file" class="form-label">Justificatif (PDF, JPG, PNG)</label>
          <input class="form-control" type="file" id="file" name="file" accept=".jpg,.jpeg,.png,.pdf" required>
        </div>

        <p class="text-muted small mt-3">
          Vos données sont utilisées uniquement pour cette demande et seront supprimées une fois traitée.
        </p>

        <div class="text-center mt-4">
          <button type="submit" class="btn btn-warning px-4 fw-semibold">Envoyer</button>
        </div>
      </form>
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
