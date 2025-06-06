<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Eloquéncia</title>
  <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">



</head>
<body class="pt-5 bg-light">
    <div class="text-center">
    <img src="{{ asset('images/logo.png') }}" alt="logo" style="height:200px;"></div>
    


  <div class="container d-flex justify-content-center align-items-center mt-4">
    
    <div class="card shadow-lg border-0 rounded-4" style="max-width: 420px; width: 100%;">
        
        <div class="card-header bg-warning text-dark text-center rounded-top-4">
            <h3 class="mb-0 fw-semibold">Connexion</h3>
        </div>
        <div class="card-body p-4">
            @if (session('error'))
                <div class="alert alert-danger rounded-pill">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login_admin_attempt') }}" autocomplete="off">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Adresse email</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="bi bi-envelope"></i></span>
                        <input type="email" name="email" id="email" class="form-control rounded-end @error('email') is-invalid @enderror"
                            value="{{ old('email') }}" required autofocus>
                    </div>
                    @error('email')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="bi bi-lock"></i></span>
                        <input type="password" name="password" id="password"
                            class="form-control rounded-end @error('password') is-invalid @enderror" required>
                    </div>
                    @error('password')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
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


                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-warning text-dark fw-bold rounded-pill">Se connecter</button>
                </div>
            </form>
        </div>
    </div>
</div>


  <!-- Scripts Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>