<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Eloquéncia</title>
  <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


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


  <!-- BLOG -->
  <div class="container" id="blog">
    <h2 class="text-center fw-bold mb-5 mt-5">Blog :</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
      
      @foreach ($blogs as $blog)
          <div class="col">
              <a href="{{ $blog->link ?? '#' }}" class="text-decoration-none text-dark">
                  <div class="card h-100 shadow border-0">
                      <img src="{{ asset($blog->image) }}" class="card-img-top"
                          style="height: 180px; object-fit: cover; border-radius: 10px 10px 0 0;">
                      <div class="card-body text-center">
                          <h5 class="fw-bold">{{ $blog->title }}</h5>
                          <p class="text-muted">{{ $blog->description }}</p>
                      </div>
                  </div>
              </a>
          </div>
      @endforeach  

    </div>
  </div>

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
