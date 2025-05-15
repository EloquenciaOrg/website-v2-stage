<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Eloquéncia</title>
  <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


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
  <div class="mb-5 text-center">
    <h1 class="fw-bold text-dark">Mentions légales</h1>
    <p class="text-muted">Conformément à la loi n° 2004-575 du 21 juin 2004 pour la confiance dans l’économie numérique</p>
  </div>

  <div class="bg-white p-4 shadow rounded mb-4 border-start border-4 border-warning">
    <h4 class="fw-bold text-dark">Édition du site</h4>
    <p class="mb-1">Le site accessible à l’URL <a href="https://eloquencia.org" class="text-warning">https://eloquencia.org</a> est édité par l’association Eloquéncia, enregistrée sous le numéro W134011269. Siège : 34 allée des cheminots Rés le train bleu Entrée A, 13130 Berre L’Étang.</p>
    <p class="mb-0">Représentant légal : Marouan Jlassi.</p>
  </div>

  <div class="bg-white p-4 shadow rounded mb-4 border-start border-4 border-warning">
    <h4 class="fw-bold text-dark">Hébergement</h4>
    <p>Hébergeur : PulseHeberg, 9 boulevard de Strasbourg, 83000 Toulon. Tél : <a href="tel:0422141360" class="text-warning">04 22 14 13 60</a>.</p>
  </div>

  <div class="bg-white p-4 shadow rounded mb-4 border-start border-4 border-warning">
    <h4 class="fw-bold text-dark">Directeur de la publication</h4>
    <p>Le directeur de la publication est le président de l’association Eloquência : Marouan Jlassi.</p>
  </div>

  <div class="bg-white p-4 shadow rounded mb-4 border-start border-4 border-warning">
    <h4 class="fw-bold text-dark">Contact</h4>
    <p><strong>Demandes générales</strong> : <a href="mailto:contact@eloquencia.org" class="text-warning">contact@eloquencia.org</a></p>
    <p><strong>Support technique</strong> : <a href="mailto:dev@eloquencia.org" class="text-warning">dev@eloquencia.org</a></p>
  </div>

  <div class="bg-white p-4 shadow rounded mt-4 border-start border-4 border-warning">
  <h4 class="fw-bold text-dark">Données personnelles</h4>
  <p>
    Le traitement de vos données à caractère personnel est régi par notre charte du respect à la vie privée,
    disponible ci-dessous, conformément au Règlement Général sur la Protection des données 2016/679 du 27 avril 2016 "RGPD".
  </p>
  <p class="text-muted small">
    Mentions légales générées par <a href="https://www.legalstart.fr" class="text-warning" target="_blank">Legalstart.fr</a>
  </p>
</div>

  <div class="mb-5 text-center">
    <h1 class="fw-bold text-dark mt-5">RGPD</h1>
  </div>

  <div class="bg-white p-4 shadow rounded border-start border-4 border-warning">
    <p>Les informations recueillies lors de votre adhésion via HelloAsso sont enregistrées dans un fichier informatisé par l’association.</p>
    <p>Les données sont hébergées chez PulseHeberg. Elles ne sont pas transmises à des tiers et sont conservées 6 mois après la fin de votre adhésion.</p>
    <p>Vous pouvez demander l’accès, la rectification ou l’effacement de vos données, ainsi qu’exercer votre droit à la limitation ou opposition au traitement. En cas d’opposition ou suppression, l’adhésion sera annulée sans remboursement.</p>
    <p>Consultez le site de la <a href="https://cnil.fr" class="text-warning" target="_blank">CNIL</a> pour plus d’informations.</p>
    <p>Pour toute demande relative au traitement des données personnelles, contactez : <a href="mailto:contact@eloquencia.org" class="text-warning">contact@eloquencia.org</a> (Objet : RGPD).</p>
  </div>
</div>


  <footer class="bg-light text-center py-3">
  <div class="container">
    <small class="text-muted">
      © 2024 <strong>Eloquência</strong> | Fait avec <span style="color: #e25555;">❤</span> et hébergé à Marseille
    </small>
  </div>
  </footer>

  <!-- Scripts Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
