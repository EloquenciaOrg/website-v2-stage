<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Eloquéncia</title>
  <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


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

  <div class="container mt-4 text-center">
    <h1 class="mb-4 fw-bold text-center">Liste des membres</h1>

    <div class="table-responsive">
        <table class="table table-bordered ">
            <thead class="table-warning">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Début de la période d'adhésion</th>
                    <th>Fin de la période d'adhésion</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($members as $member)
                    <tr>
                        <td>{{ $member->ID }}</td>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->firstname }}</td>
                        <td>{{ $member->email }}</td>
                        <td>{{ $member->registrationDate }}</td>
                        <td>{{ $member->expirationDate }}</td>
                        <td>
                        <div class="d-flex justify-content-center gap-1">
                          <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#confirmResetModal"><img src="{{ asset('images/icon_mdp.png') }}" alt="Reset" width="22" height="22"></button>
                          <!-- Modal de confirmation -->
                          <div class="modal fade" id="confirmResetModal" tabindex="-1" aria-labelledby="confirmResetModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="confirmResetModalLabel">Confirmer l'action</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                                </div>
                                <div class="modal-body">
                                  Êtes-vous sûr de vouloir envoyer un email de réinitialisation du mot de passe ?
                                </div>
                                <div class="modal-footer">
                                  <form method="POST" action="/reset_password">
                                    @csrf
                                    <input type="hidden" name="ID" value="{{ $member->ID }}">
                                        <button type="submit" class="btn btn-warning">Oui, envoyer</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>

                          <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editEmailModal{{ $member->ID }}"><img src="{{ asset('images/icon_email.png') }}" alt="Reset" width="22" height="22"></button>
                          <!-- Modal -->
                          <div class="modal fade" id="editEmailModal{{ $member->ID }}" tabindex="-1" aria-labelledby="editEmailModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                  <form method="POST" action="/members_update_email">
                                      @csrf
                                      @method('PUT')
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h5 class="modal-title">Modifier mot de passe</h5>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                          </div>
                                          <input type="hidden" name="id" value="{{ $member->ID }}">
                                          <div class="modal-body">
                                              <div class="mb-3">
                                                  <label for="email" class="form-label">Nouvelle adresse email</label>
                                                  <input type="email" name="email" class="form-control" required>
                                              </div>
                                              <div class="mb-3">
                                                  <label for="email_confirmation" class="form-label">Confirmer</label>
                                                  <input type="email" name="email_confirmation" class="form-control" required>
                                              </div>
                                          </div>
                                          <div class="modal-footer">
                                              <button type="submit" class="btn btn-warning">Valider</button>
                                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                          </div>
                                      </div>
                                  </form>
                              </div>
                          </div>
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
      © 2025 <strong>Eloquéncia</strong> | Fait avec <span style="color: #007FFF;">💙</span> et hébergé à Marseille
    </small>
  </div>
  </footer>

  <!-- Scripts Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
