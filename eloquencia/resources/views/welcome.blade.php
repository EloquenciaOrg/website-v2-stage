<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Eloquéncia</title>
  <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Icons8 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>

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
          @guest('member')<li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Connexion</a></li>@endguest
          @auth('member')
          <li class="nav-item"><a class="nav-link" href="{{ url('/lms/lms') }}">Accès au LMS</a></li>
          <!--
          <form method="POST" action="{{ route('member.logout') }}">
            @csrf
            <button type="submit" class="btn nav-link">Déconnexion <i class="bi bi-box-arrow-right"></i></button>
          </form>
  -->
          @endauth
        </ul>
      </div>
    </div>
  </nav>

  <!-- BANNIÈRE DÉFILANTE -->
   
  @if($setting)
    <div class="mt-3 bg-light">
      <div class="highlight-bar text-center">
        {!! $setting->content !!}
      </div>
    </div>
  @endif

  @if(session('error'))
    <div class="alert alert-danger text-center">
        {{ session('error') }}
    </div>
@endif

  <!-- TITRE -->
  <div class="bg-light text-center mt-3">
    <!-- <img src="{{ asset('images/logo.png') }}" alt="logo" style="width: 120px; height: 120px;"> -->
    <h1 class="fw-bold fs-1 padding-top bg-light">Eloquéncia</h1>
    <p class="lead bg-light">La plateforme de cours en ligne pour apprendre à parler en public</p>
    <a href="https://www.helloasso.com/associations/eloquencia/adhesions/adhesion" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#helloassoModal">Adhérer</a>
    @guest('member')<a href="{{ url('/login') }}" class="btn btn-sm btn-warning">Connexion</a>@endguest
    @auth('member')<a href="{{ url('/lms/lms') }}" class="btn btn-sm btn-warning">Accès au LMS</a>@endauth
  </div>

  <!-- CAROUSEL -->
  <div id="carouselEloquencia" class="carousel slide mt-4 bg-light" data-bs-ride="carousel" data-bs-interval="6000">
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

  <!-- DEMANDE DE REDUCTION -->
  <p class="text-muted text-center mt-3">
  Étudiant·e ou moins de 18 ans ? Vous pouvez <a href="{{ url('/reduction') }}">faire une demande de réduction ici</a>.
  </p>

  <!-- SECTION ARTICLES -->
  <div class="container py-5">
    <h2 class="text-center mb-4 fw-bold">Article à la une :</h2>
        <div class="row g-4 justify-content-center">
          @foreach($articles as $article)

            <div class="col-md-4">
              <div class="card h-100 shadow">
                <img src="{{ $article->pic }}" alt="Image" class="card-img-top" style="height: 400px; object-fit: cover;">
                <div class="card-body text-center">
                  <h5 class="card-title">{{ $article->title }}</h5>
                  <p class="card-text">{{ $article->summary }}</p>
                  <a href="{{ route('article.show', $article->id) }}" class="btn btn-outline-warning">Lire plus</a>
                </div>
              </div>
            </div>
          @endforeach
        </div>
        <!-- LIEN VERS BLOG -->
        <div class="text-center mt-4">
          <a href="{{ url('/blog') }}" class="btn btn-outline-warning px-4 fw-bold">Voir tous les articles →</a>
        </div>
  </div>

  <!-- SECTION PARTENAIRES -->
  <section class="py-5 bg-light" id="partenaire">
    <div class="container">
      <h2 class="text-center fw-bold mb-5">Nos Partenaires</h2>
        <div class="row g-4 justify-content-center">
            @foreach ($partenaires as $data)
              @php
                $partenaire = json_decode($data->value);
              @endphp
              <div class="col-md-6 col-lg-4">
                <div class="bg-white rounded shadow p-4 h-100 d-flex flex-column">
                  <div class="d-flex align-items-center mb-3">
                    <img src="{{ asset($partenaire->image) }}" alt="Logo partenaire" class="me-3 rounded-circle" style="width: 60px; height: 60px; object-fit: cover;">
                    <div>
                      <h5 class="mb-0">{{ $partenaire->nom }}</h5>
                      <small class="text-muted">Depuis {{ $partenaire->depuis }}</small>
                    </div>
                  </div>
                  <p class="text-muted flex-grow-1">{{ $partenaire->description }}</p>
                  @if($partenaire->link == "https://www.burgerking.fr/")
                    <a href="{{ $partenaire->link }}" class="btn btn-sm btn-outline-warning mt-3 align-self-start" target="_blank">Promis, c’est pas une pub pour McDo</a>
                  @else
                    <a href="{{ $partenaire->link }}" class="btn btn-sm btn-outline-warning mt-3 align-self-start" target="_blank">En savoir plus</a>
                  @endif
                </div>
              </div>
            @endforeach

          </div>
        </div>
    </div>
  </section>

  <!-- FORMULAIRE DE CONTACT -->
  <section class="py-5 bg-light" id="contact">
    <div class="container">
      <h2 class="text-center mb-4 fw-bold">Contactez-nous</h2>
      <form method="POST" action="/envoie_mess" class="p-4 shadow bg-warning rounded mx-auto" style="max-width: 700px;">
      @csrf <!-- PROTECTION CSRF -->
      @if ($errors->has('throttle'))
        <div class="alert alert-danger text-center">
          {{ $errors->first('throttle') }}
        </div>
      @endif
        <div class="mb-3">
          <label for="name" class="form-label">Nom</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Votre nom" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Adresse email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Votre email" required>
        </div>
        <div class="mb-3">
          <label for="message" class="form-label">Message</label>
          <textarea class="form-control" id="message" name="message" rows="4" placeholder="Votre message..." required></textarea>
        </div>
        <div class="mb-3 mt-3">
          <label for="captcha" class="form-label">Captcha</label>
          <div class="d-flex align-items-center gap-3 mb-2">
            <img src="{{ route('captcha.image') }}" alt="captcha" id="captcha-img" style="height: 30px; width: 65px;">
            <button type="button" class="btn btn-sm btn-outline-secondary" onclick="document.getElementById('captcha-img').src='{{ route('captcha.image') }}?rand=' + Math.random();">
              🔁
            </button>
          </div>
          <input type="text" name="captcha" id="captcha" class="form-control" required>
          @error('captcha')
            <div class="invalid-feedback d-block">{{ $message }}</div>
          @enderror

          <input class="form-check-input mt-2" type="checkbox" id="cgu" name="cgu" required>
          <label class="form-check-label mt-1" for="cgu">J’accepte les <a href="" target="_blank">conditions générales d’utilisation des données</a></label>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-light px-4">Envoyer</button>
        </div>
      </form>

      <!-- Modal de mise en garde -->
      <div class="modal fade" id="emailWarningModal" tabindex="-1" aria-labelledby="emailWarningLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content border-warning">
            <div class="modal-header bg-warning">
              <h5 class="modal-title fw-bold" id="emailWarningLabel">Attention !</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <div class="modal-body">
              Les adresses <strong>@icloud.com</strong> et <strong>@sfr.fr</strong> peuvent poser problème pour la réception des e-mails.
              <br><br>
              Si possible, utilisez une autre adresse (ex: Gmail, Outlook...).
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-warning" data-bs-dismiss="modal">J'ai compris</button>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>

  <footer class="bg-light text-center py-3">
  <div class="container">
    <small class="text-muted">
      © 2025 <strong>Eloquéncia</strong> | Fait avec 💙 et hébergé en France | <a href="/mentions_legales">Mentions légales</a>
    </small>
  </div>
  </footer>


  <!-- Scripts Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Modal lorsque l'on clique sur Adhérer -->
  <div class="modal fade" id="helloassoModal" tabindex="-1" aria-labelledby="helloassoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="helloassoModalLabel">Redirection externe</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
        </div>
        <div class="modal-body">
          Vous allez être redirigé vers le site de HelloAsso pour finaliser votre adhésion.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <a href="https://www.helloasso.com/associations/eloquencia/adhesions/adhesion" target="_blank" class="btn btn-warning">Continuer</a>
        </div>
      </div>
    </div>
  </div>

  <script>
  document.addEventListener('DOMContentLoaded', function () {
    const emailInput = document.getElementById('email');

    emailInput.addEventListener('blur', function () {
      const email = emailInput.value.toLowerCase();

      if (email.includes('@icloud.com') || email.includes('@sfr.fr')) {
        const modal = new bootstrap.Modal(document.getElementById('emailWarningModal'));
        modal.show();
      }
    });
  });
</script>

</body>
</html>
