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

  <div class="container py-5">
    <div class="mx-auto" style="max-width: 800px;">
        <h2 class="fw-bold mb-4 text-center">Paramètres avancés</h2>

        {{-- Blog --}}
        <div class="card shadow-sm border-start border-4 border-warning mb-4">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="fw-semibold mb-1">Blog</h5>
                    <p class="text-muted mb-0">Gérer les publications du blog visibles par les utilisateurs.</p>
                </div>
                 <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#blogModal">
                    Gérer
                </button>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="blogModal" tabindex="-1" aria-labelledby="blogModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl">
            <div class="modal-content shadow">
              <div class="modal-header bg-warning text-white">
                <h5 class="modal-title fw-bold" id="blogModalLabel">Articles du blog</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
              </div>

              <div class="modal-body">
                <!-- Articles existants -->
                <div class="row">
                  @foreach($blogs as $blog)
                  @php
                    $data = json_decode($blog->value);
                  @endphp

                  <div class="col-md-3 mb-4">
                    <div class="card h-100 shadow-sm">
                      <img src="{{ asset($data->image) }}" class="card-img-top" alt="image" style="height: 180px; object-fit: cover;">
                      <div class="card-body text-center">
                        <h6 class="card-title fw-bold">{{ $data->title }}</h6>
                        <p class="card-text small text-muted">{{ $data->description }}</p>
                      </div>
                      <div class="card-footer text-center">
                        <form action="/supprimer_blog_article" method="POST" class="d-inline">
                          @csrf
                          @method('DELETE')
                          <input type="hidden" name="id" value="{{ $blog->name }}">
                          <button class="btn btn-sm btn-outline-danger">Supprimer</button>
                        </form>
                      </div>
                    </div>
                  </div>
                @endforeach
                </div>

                <hr>

                <!-- Formulaire d'ajout -->
                <h5 class="fw-bold mb-3">Ajouter un nouvel article dans le blog</h5>
                <form action="/ajouter_blog_article" method="POST">
                  @csrf
                  <div class="row mb-3">
                    <div class="col-md-4">
                      <input type="text" name="title" class="form-control" placeholder="Titre" required>
                    </div>
                    <div class="col-md-4">
                      <input type="text" name="image" class="form-control" placeholder="Nom de l'image (ex: img.jpg)" required>
                    </div>
                  </div>
                  <div class="mb-3">
                    <textarea name="description" class="form-control" rows="3" placeholder="Résumé" required></textarea>
                  </div>
                  <div>
                    <button class="btn btn-warning" type="submit">Ajouter</button>
                  </div>
                </form>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
              </div>
            </div>
          </div>
        </div>


        {{-- Notifications --}}
        <div class="card shadow-sm border-start border-4 border-warning mb-4">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="fw-semibold mb-1">Notifications</h5>
                    <p class="text-muted mb-0">Configurer les alertes.</p>
                </div>
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#notifModal">
                    Gérer
                </button>
                <!-- Modal -->
                <div class="modal fade" id="notifModal" tabindex="-1" aria-labelledby="notifGestionModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content shadow">

                    <div class="modal-header bg-warning text-white">
                        <h5 class="modal-title fw-bold" id="notifGestionModalLabel">Gestion des notifications</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                    </div>

                    <div class="modal-body">
                        <!-- Liste des notifications existantes -->
                        <h6 class="fw-bold mb-3">Notifications enregistrées</h6>
                        <ul class="list-group mb-4">
                        @foreach($settings as $setting)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>{{ $setting['name'] }}</strong>
                                    @if($setting->state == 1)
                                        <span class="badge bg-success ms-2">Activé</span>
                                    @else
                                        <span class="badge bg-secondary ms-2">Désactivé</span>
                                    @endif
                                </div>
                                <div>
                                    @if($setting->state == 0)
                                        <form action="/notif_activer" method="POST" class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="id" value="{{ $setting->name }}">
                                            <button type="submit" class="btn btn-sm btn-outline-success">Activer</button>
                                        </form>
                                    @else
                                        <form action="/notif_desactiver" method="POST" class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="id" value="{{ $setting->name }}">
                                            <button type="submit" class="btn btn-sm btn-outline-danger ms-1">Désactiver</button>
                                        </form>
                                    @endif

                                    
                                </div>
                            </li>

                            <!-- Ajouter une nouvelle notification -->
                            <h6 class="fw-bold mt-3">Modifier la notification</h6>
                            <form method="POST" action="/notif_update">
                                @csrf
                                @method('PUT')
                                <div class="input-group">
                                    <input type="hidden" name="id" value="{{ $setting->name }}">
                                    <input type="text" name="value" class="form-control" placeholder="Nouveau message à afficher..." required>
                                    <button class="btn btn-warning" type="submit">Modifier</button>
                                </div>
                            </form>
                        @endforeach
                        </ul>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    </div>

                </div>
            </div>
        </div>

                
    </div>
  </div>

  {{-- Articles à la une --}}
    <div class="card shadow-sm border-start border-4 border-warning">
    <div class="card-body d-flex justify-content-between align-items-center">
        <div>
            <h5 class="fw-semibold mb-1">Articles à la une</h5>
            <p class="text-muted mb-0">Gérez les articles mis en avant sur la page d’accueil.</p>
        </div>
        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#articlesModal">Gérer</button>
    </div>
</div>

<!-- Modal de gestion des articles -->
<div class="modal fade" id="articlesModal" tabindex="-1" aria-labelledby="articlesModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content shadow">
      <div class="modal-header bg-warning text-white">
        <h5 class="modal-title fw-bold" id="articlesModalLabel">Articles à la une</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>

      <div class="modal-body">

        <div class="row">
          @foreach($articles as $article)
          @php $data = json_decode($article->value); @endphp
          <div class="col-md-6 mb-4">
            <div class="card h-100 shadow-sm">
              <img src="{{ asset($data->image) }}" class="card-img-top" alt="Image article" style="height: 200px; object-fit: cover;">
              <div class="card-body">
                <h5 class="card-title">{{ $data->title }}</h5>
                <p class="card-text text-muted">{{ $data->description }}</p>
              </div>
              <div class="card-footer d-flex justify-content-between">
                <form action="/supprimer_article" method="POST">
                  @csrf
                  @method('DELETE')
                  <input type="hidden" name="id" value="{{ $article->name }}">
                  <button type="submit" class="btn btn-sm btn-outline-danger">
                    Supprimer
                  </button>
                </form>
              </div>
            </div>
          </div>
          @endforeach
        </div>

        <hr class="mt-4 mb-3">

        <h5 class="fw-bold">Ajouter un nouvel article</h6>
        <form method="POST" action="/ajouter_article">
          @csrf
          <div class="row">
            <div class="col-md-5 mb-3">
              <input type="text" name="title" class="form-control" placeholder="Titre" required>
            </div>
            <div class="col-md-5 mb-3">
              <input type="text" name="image" class="form-control" placeholder="Nom de l'image (ex: img.jpg)" required>
            </div>
            <div class="col-md-10">
                <textarea class="form-control" placeholder="Résumé" name="description" rows="3"></textarea>
            </div>
          </div>
            <button type="submit" class="btn btn-sm btn-warning mt-3">Ajouter</button>
        </form>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>

    {{-- Partenaires --}}
        <div class="card shadow-sm border-start border-4 border-warning mt-4">
        <div class="card-body d-flex justify-content-between align-items-center">
            <div>
                <h5 class="fw-semibold mb-1">Partenaires</h5>
                <p class="text-muted mb-0">Gérez les partenaires mis en avant sur la page d’accueil.</p>
            </div>
            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#partenairesModal">Gérer</button>
        </div>
    </div>

    <!-- Modal de gestion des partenaires -->
      <div class="modal fade" id="partenairesModal" tabindex="-1" aria-labelledby="partenairesModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
          <div class="modal-content">

            <div class="modal-header bg-warning text-white">
              <h5 class="modal-title fw-bold" id="partenairesModalLabel">Gestion des partenaires</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>

            <div class="modal-body">
              <div class="row">
                @foreach ($partenaires as $partenaire)
                @php $data = json_decode($partenaire->value); @endphp
                  <div class="col-md-6 mb-4">
                    <div class="card shadow-sm h-100">
                      <div class="card-body d-flex">
                        <img src="{{ asset($data->image) }}" alt="logo" style="height: 60px; margin-right: 15px;">
                        <div>
                          <h5 class="fw-bold mb-1">{{ $data->nom }}</h5>
                          <small class="text-muted">Depuis {{ $data->depuis }}</small>
                          <p class="mt-2">{{ $data->description }}</p>
                          <form action="/supprimer_patenaire" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="name" value="{{ $partenaire->name }}">
                            <button type="submit" class="btn btn-sm btn-outline-danger mt-2">Supprimer</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>

              <hr>

              <h5 class="fw-bold">Ajouter un partenaire</h5>
              <form method="POST" action="/ajouter_partenaire">
                @csrf
                <div class="row g-2">
                  <div class="col-md-6">
                    <input type="text" name="nom" class="form-control" placeholder="Nom du partenaire" required>
                  </div>
                  <div class="col-md-6">
                    <input type="text" name="since" class="form-control" placeholder="Depuis (ex: Octobre 2024)" required>
                  </div>
                  <div class="col-md-6">
                    <input type="text" name="image" class="form-control" placeholder="Nom de l'image (ex: logo.png)" required>
                  </div>
                  <div class="col-md-6">
                    <input type="text" name="link" class="form-control" placeholder="Lien vers le partenaire" required>
                  </div>
                  <div class="col-12 mt-2">
                    <textarea name="description" class="form-control" placeholder="Description" rows="3" required></textarea>
                  </div>
                  <div class="col-12 text-end mt-2">
                    <button type="submit" class="btn btn-warning">Ajouter</button>
                  </div>
                </div>
              </form>

            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>

          </div>
        </div>
      </div>



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