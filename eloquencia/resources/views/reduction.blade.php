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
          <form method="POST" action="{{ route('member.logout') }}">
            @csrf
            <button type="submit" class="btn nav-link">Déconnexion <i class="bi bi-box-arrow-right"></i></button>
          </form>
          @endauth
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
      @if ($errors->has('throttle'))
        <div class="alert alert-danger text-center">
          {{ $errors->first('throttle') }}
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
        </div>

        <input class="form-check-input" type="checkbox" id="cgu" name="cgu" required>
        <label class="form-check-label" for="cgu">J’accepte les <a href="" target="_blank">conditions générales d’utilisation des données</a></label>

        <p class="text-muted small mt-3">
          Vos données sont utilisées uniquement pour cette demande et seront supprimées une fois traitée.
        </p>

        <div class="text-center mt-4">
          <button type="submit" class="btn btn-warning px-4 fw-semibold">Envoyer</button>
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
