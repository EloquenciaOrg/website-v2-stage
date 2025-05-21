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
      <a class="navbar-brand d-flex align-items-center" href="{{ url('/admin/admin') }}">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" width="40" height="40" class="me-2">
        <strong>Eloquéncia</strong>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="menu">
        <ul class="navbar-nav ms-auto">
          @guest('admin')<li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Connexion</a></li>@endguest
          @auth('admin')
          <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit" class="btn nav-link">Déconnexion <i class="bi bi-box-arrow-right"></i></button>
          </form>
          @endauth
        </ul>
      </div>
    </div>
  </nav>

  <div class="container mt-4 text-center">
    <h1 class="mb-4 fw-bold text-center">Demande de réduction</h1>

    <button type="button" class="btn btn-warning fw-bold shadow rounded-pill px-4 py-2 mb-3" data-bs-toggle="modal" data-bs-target="#historiqueModal">Voir l'historique des demandes</button>
    <!-- Modal -->
    <div class="modal fade" id="historiqueModal" tabindex="-1" aria-labelledby="historiqueModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="historiqueModalLabel">Historique des demandes</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
          </div>
          <div class="modal-body">
            <table class="table table-bordered table-striped">
              <thead class="table-warning">
                <tr>
                  <th>Nom</th>
                  <th>Email</th>
                  <th>Statut</th>
                </tr>
              </thead>
              <tbody>
                @forelse($historique as $entry)
                  <tr>
                    <td>{{ $entry->name }}</td>
                    <td>{{ $entry->email }}</td>
                    <td>
                      @if($entry->state == 1)
                        <span class="badge bg-success">Acceptée</span>
                      @elseif($entry->state == 2)
                        <span class="badge bg-danger">Refusée</span>
                      @endif
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="3" class="text-center text-muted">Aucune demande traitée</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="table-responsive">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
            </div>
        @endif
        <table class="table table-bordered ">
            <thead class="table-warning">
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Pièce justificative</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach($reductions as $reduction)
            <tr>
                <td>{{ $reduction->name }}</td>
                <td>{{ $reduction->email }}</td>
                <td><a href="{{ route('download.proof', $reduction->ID) }}" class="btn btn-sm btn-outline-warning">Télécharger</a></td>
                <td>
                  <div class="d-flex gap-1">
                    <form action="/reduction_accepte" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $reduction->ID }}">
                        <button type="submit" class="btn btn-sm btn-success">Valider</button>
                    </form>
                    <form action="/reduction_refuse" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $reduction->ID }}">
                        <button type="submit" class="btn btn-sm btn-danger">Refuser</button>
                    </form>
                  </div>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        
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
