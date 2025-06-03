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

  <div class="container pt-5">
    <h2 class="mb-4 fw-bold text-center"> Messages reçus</h2>

    <div class="text-center mb-4">
        <a href="{{ route('filter', ['order' => 'asc']) }}" class="btn btn-warning">Ordre croissant</a>
        <a href="{{ route('filter', ['order' => 'desc']) }}" class="btn btn-warning">Ordre décroissant</a>
    </div>

    <div class="row row-cols-1 row-cols-md-2 g-4">
        @forelse($messages as $msg)
            <div class="col">
                <div class="card shadow-sm h-100 border-0">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ $msg->name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $msg->email }}</h6>
                        <p class="card-text mt-3 text-dark">
                            {{ $msg->message }}
                        </p>
                        <a href="mailto:{{ $msg->email }}" class="btn btn-sm btn-outline-warning">Répondre</a>
                        <!-- Modal de confirmation -->
                        <button type="submit" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">Supprimer</button>
                        <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModal" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="confirmResetModalLabel">Confirmer l'action</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                              </div>
                              <div class="modal-body">Êtes-vous sûr de vouloir supprimer le message ?</div>
                              <div class="modal-footer">
                                <form method="POST" action="{{ route('messagerie.delete') }}">
                                  @csrf
                                  @method('DELETE')
                                  <input type="hidden" name="id" value="{{ $msg->ID }}">
                                    <button type="submit" class="btn btn-warning">Oui, supprimer</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>

                        <button type="button" class="btn btn-sm btn-outline-dark" data-bs-toggle="modal" data-bs-target="#confirmBanModal{{ $msg->ID }}">Bloquer</button>
                        <!-- Modal de confirmation de bannissement -->
                        <div class="modal fade" id="confirmBanModal{{ $msg->ID }}" tabindex="-1" aria-labelledby="confirmBanModalLabel{{ $msg->ID }}" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="confirmBanModalLabel{{ $msg->ID }}">Confirmation</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                              </div>
                              <div class="modal-body">
                                Es-tu sûr de vouloir bloquer l'utilisateur : <strong>{{ $msg->email }}</strong> ?
                              </div>
                              <div class="modal-footer">
                                <form method="POST" action="{{ route('ban.user.msg') }}">
                                    @csrf
                                    <input type="hidden" name="email" value="{{ $msg->email }}">
                                    <input type="hidden" name="ip" value="{{ $msg->ip }}">
                                    <button type="submit" class="btn btn-danger">Oui, bloquer</button>
                                </form>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                              </div>
                            </div>
                          </div>
                        </div>

                        
                    </div>
                    <div class="card-footer bg-transparent border-top-0 text-end text-muted small">
                        🕒 {{ \Carbon\Carbon::parse($msg->datetime)->format('d/m/Y H:i') }}
                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-warning text-center">
                Aucun message pour le moment.
            </div>
        @endforelse
    </div>
</div>




  <footer class="bg-light text-center py-3">
  <div class="container">
    <small class="text-muted">
      © 2025 <strong>Eloquéncia</strong> | Fait avec 💙 et hébergé en France | <a href="/mentions_legales">Mentions légales</a>
    </small>
  </div>
  </footer>

  <!-- Scripts Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>