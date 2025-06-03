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

  <div class="container py-5">
    <div class="mx-auto" style="max-width: 800px;">
        <h2 class="fw-bold mb-4 text-center">Paramètres avancés</h2>

        {{-- Blog --}}
        <div class="card shadow-sm border-start border-4 border-warning mb-4">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="fw-semibold mb-1">Blog et Articles à la une</h5>
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
                  <!-- Articles du blog mis a la une -->
                  <h4 class="fw-bold mb-3">Articles du blog à la une</h4>
                  <div class="row">
                  @foreach($articles as $article)
                  <div class="col-md-4 mb-4 text-center">
                    <div class="card h-100 shadow-sm">
                      {{-- Image BLOB (pic) --}}
                      <img src="{{ $article->pic }}" alt="Image" class="card-img-top" style="height: 180px; object-fit: cover;">

                      <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>

                        {{-- Aperçu du contenu HTML nettoyé --}}
                        <p class="card-text text-muted">
                          {{ $article->summary }}
                        </p>
                      </div>

                      <div class="card-footer d-flex justify-content-between">
                        <form action="/supprimer_article" method="POST">
                          @csrf
                          @method('DELETE')
                          <input type="hidden" name="id" value="{{ $article->id }}">
                          <button type="submit" class="btn btn-sm btn-outline-danger">Supprimer</button>
                        </form>
                      </div>
                    </div>
                  </div>
                @endforeach
                </div>


                <!-- Articles du blog -->
                <h4 class="fw-bold mb-3">Articles du blog</h4>
                <div class="row">
                  @foreach($blogs as $blog)
                    <div class="col-md-3 mb-4">
                      <div class="card h-100 shadow-sm">
                        <img src="{{ $blog->pic }}" alt="Image" class="card-img-top" style="height: 180px; object-fit: cover;">

                        <div class="card-body text-center">
                          <h6 class="card-title fw-bold">{{ $blog->title }}</h6>
                          <div class="card-text small text-muted" style="max-height: 60px; overflow: hidden;">
                            {!! $blog->summary !!}
                          </div>
                        </div>
                        <div class="card-footer text-center">
                          <form action="/supprimer_article" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $blog->id }}">
                            <button class="btn btn-sm btn-outline-danger">Supprimer</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  @endforeach
                </div>

                

                <hr>

                <!-- Formulaire d'ajout -->
                <h4 class="fw-bold mb-3">Ajouter un nouvel article dans le blog</h4>
                <form action="/ajouter_article" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="row mb-3">
                    <div class="col-md-4">
                      <input type="text" name="title" class="form-control" placeholder="Titre de l'article" required>
                    </div>
                    <div class="col-md-4">
                      <input type="file" name="pic" class="form-control" accept="image/*" required>
                    </div>
                    <div class="col-md-8 mt-2">
                      <textarea name="summary" class="form-control" rows="2" placeholder="Résumé" required></textarea>
                    </div>
                    <div class="col-md-4 form-check mt-4">
                      <input type="checkbox" name="featured" class="form-check-input" id="featured">
                      <label class="form-check-label" for="featured">Mettre en avant</label>
                    </div>
                  </div>

                  <div class="mb-3">
                    <textarea name="content" id="summernote" class="form-control" rows="6" required></textarea>
                  </div>

                  <button class="btn btn-warning" type="submit">Ajouter</button>
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
      © 2025 <strong>Eloquéncia</strong> | Fait avec 💙 et hébergé en France | <a href="/mentions_legales">Mentions légales</a>
    </small>
  </div>
  </footer>

  <!-- Scripts Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  
  <!-- Summernote CDN -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>


  <script>
      $('#summernote').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
    </script>
</body>
</html>