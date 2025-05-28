<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Réinitialisation du mot de passe</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="pt-5 bg-light">
    <div class="text-center">
    <img src="{{ asset('images/logo.png') }}" alt="logo" style="height:200px;">
    </div>

    <div class="container d-flex justify-content-center align-items-center mt-4">
  <div class="card shadow p-4" style="width: 100%; max-width: 450px;">
    <h4 class="mb-4 text-center">Réinitialisation du mot de passe</h4>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="POST" action="/reset_password">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Adresse email</label>
            <input type="email" name="email" id="email" class="form-control" required autofocus>
            @error('email') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>
        <div class="d-flex justify-content-between">
            <a href="{{ route('login') }}" class="btn btn-secondary">Retour</a>
            <button type="submit" class="btn btn-warning">Réinitialiser</button>
        </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
