<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Eloquência - Accueil</title>
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
<body class="text-center pt-5 bg-light">

  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg bg-warning shadow-sm fixed-top">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center" href="#">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" width="40" height="40" class="me-2">
        <strong>Eloquência</strong>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="menu">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="#">Accueil</a></li>
          <li class="nav-item"><a class="nav-link" href="#">À propos</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Nos actions</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Événements</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Partenaires</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- BANNIÈRE DÉFILANTE -->
   
  <div class="mt-3 bg-light">
    <div class="highlight-bar text-center">
      🎤 Prochain événement : Tournoi d’éloquence – inscriptions ouvertes jusqu’au 30 avril 2025 !
    </div>
  </div>

  <!-- TITRE -->
  <div class="bg-light">
    <h1 class="fw-bold fs-1 padding-top bg-light">Eloquéncia</h1>
    <p class="lead bg-light">La plateforme de cours en ligne pour apprendre à parler en public</p>
  </div>

  <!-- CAROUSEL -->
  <div id="carouselEloquencia" class="carousel slide mt-4 bg-light" data-bs-ride="carousel" data-bs-interval="3000">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{ asset('images/carousel1_2.jpg') }}" class="d-block w-100" alt="Image 1" style="height: 400px; object-fit: cover;">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('images/carousel2_2.jpg') }}" class="d-block w-100" alt="Image 2" style="height: 400px; object-fit: cover;">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselEloquencia" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselEloquencia" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </button>
  </div>

  <!-- SECTION PARTENAIRES -->
  <section class="py-5 bg-light">
    <div class="container">
      <h2 class="text-center fw-bold mb-5">Nos Partenaires</h2>
      <!-- Partenaire 1 -->
      <div class="row g-4">
        <div class="col-md-4">
        <div class="d-flex align-items-center mb-3">
          <img src="{{ asset('images/logo.png') }}" alt="Logo partenaire" class="me-3 rounded-circle" style="width: 60px; height: 60px; object-fit: cover;">
          <div class="bg-white rounded shadow-sm p-4 h-100 text-start">
            <h5>Partenaire 1</h5>
            <p class="text-muted">Engagé pour l’éducation et la prise de parole des jeunes.</p>
            <a href="#" class="btn btn-sm btn-outline-warning mt-3 align-self-start">En savoir plus</a>
          </div>
        </div>
      </div>
        <!-- Partenaire 2 -->
        <div class="col-md-4">
          <img src="{{ asset('images/logo.png') }}" alt="Logo partenaire" class="me-3 rounded-circle" style="width: 60px; height: 60px; object-fit: cover;">
          <div class="bg-white rounded shadow-sm p-4 text-start">
            <h5>Partenaire 2</h5>
            <p class="text-muted">Soutien aux événements culturels et inclusifs.</p>
            <a href="#" class="btn btn-sm btn-outline-warning mt-3 align-self-start">En savoir plus</a>
          </div>
        </div>
        <!-- Partenaire 3 -->
        <div class="col-md-6 col-lg-4 ">
            <div class="bg-white rounded shadow-sm p-4 h-100 d-flex flex-column">
              <div class="d-flex align-items-center mb-3">
                <img src="{{ asset('images/logo.png') }}" alt="Logo partenaire" class="me-3 rounded-circle" style="width: 60px; height: 60px; object-fit: cover;">
                <div>
                  <h5 class="mb-0">Gojo</h5>
                  <small class="text-muted">Depuis Janvier 2023</small>
                </div>
              </div>
              <p class="text-muted flex-grow-1">
                Accompagnement des jeunes dans leurs projets éducatifs à travers des ateliers et des événements nationaux.
              </p>
              <a href="#" class="btn btn-sm btn-outline-warning mt-3 align-self-start">En savoir plus</a>
            </div>
        </div>
      </div>
    </div>
  </section>

  <!-- FORMULAIRE DE CONTACT -->
  <section class="py-5 bg-light" >
    <div class="container">
      <h2 class="text-center mb-4 fw-bold">Contactez-nous</h2>
      <form class="p-4 shadow bg-warning rounded mx-auto" style="max-width: 600px;">
        <div class="mb-3">
          <label for="name" class="form-label">Nom</label>
          <input type="text" class="form-control" id="name" placeholder="Votre nom" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Adresse email</label>
          <input type="email" class="form-control" id="email" placeholder="Votre email" required>
        </div>
        <div class="mb-3">
          <label for="message" class="form-label">Message</label>
          <textarea class="form-control" id="message" rows="4" placeholder="Votre message..." required></textarea>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-light px-4">Envoyer</button>
        </div>
      </form>
    </div>
  </section>

  <!-- Scripts Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
