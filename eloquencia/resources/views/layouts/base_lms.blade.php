<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Eloquéncia</title>
  <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Styles personnalisés -->
  <link rel="stylesheet" href="{{ asset('css/propos.css') }}">

  <!-- AOS (animations scroll) -->
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
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

    <!-- Navigation -->
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
  <main class="flex-grow-1">
    @yield('content')

    <footer class="bg-light text-center py-3">
    <div class="container">
        <small class="text-muted">
        © 2025 <strong>Eloquéncia</strong> | Fait avec 💙 et hébergé en France | <a href="/mentions_legales">Mentions légales</a>
        </small>
    </div>
    </footer>
  </main>

</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>AOS.init();</script>

</body>
</html>
