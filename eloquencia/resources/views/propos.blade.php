<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Eloquéncia</title>
  <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/propos.css') }}">


  <style>
    
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
          <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Connexion</a></li>
        </ul>
      </div>
    </div>
  </nav>

<section class="py-5 bg-light">
  <div class="container">
    <!-- Titre principal -->
    <div class="text-center mb-5">
      <h1 class="fw-bold">Eloquência, l’art de convaincre, le plaisir de parler !</h1>
      <p class="lead">L’Association Eloquéncia (loi 1901) est une jeune association fondée par Marouan Jlassi à Berre l’Étang qui a pour but d’enseigner l’art oratoire dans le milieu local. Elle a pour conviction d’aider les personnes qui souhaitent développer et perfectionner leur expression orale quotidienne, professionnelle ou scolaire, notamment pour la préparation d’entretiens d’embauche ou d’examens oraux.  </p>
    </div>

    <!-- Carte Google Maps 
    <div class="mb-5">
      <div class="ratio ratio-16x9">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2895.508842880891!2d5.1667!3d43.4778!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12c9f3b342b23f91%3A0x95f0de3bb998f6cf!2sBerre-l'%C3%89tang!5e0!3m2!1sfr!2sfr!4v1710000000000" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
-->
  </div>
</section>

<section class="py-5 bg-light">
  <div class="container">
    <div class="row align-items-center">
      
      <div class="col-lg-6 mb-4 mb-lg-0">
        <img src="{{ asset('images/marouan.jpg') }}" class="img-fluid rounded shadow" alt="Notre histoire" style="height: 300px;">
      </div>

      <div class="col-lg-6">
        <h2 class="fw-bold mb-3">Notre Histoire</h2>
        <p class="lead text-muted mb-4">
          Souhaitant préparer sa participation à un concours d’éloquence, Marouan s’est entretenu au cours d’une conversation téléphonique avec le Maître de l’Éloquence, Bill François, qui lui a suggéré que la création d’une association consacrée à l’art oratoire serait une aventure enrichissante et instructive.
        </p>
        <p class="text-muted">
          C’est ainsi que Marouan a proposé à son ami Gaëtan, actuel vice-président de l’association, de l’aider à mettre en place ce projet ambitieux.
        </p>
      </div>

    </div>
  </div>
</section>

<section class="py-5 bg-light">
  <div class="container">
    <h2 class="text-center fw-bold mb-5">Notre parcours</h2>
    
    <div class="timeline">
      <div class="timeline-step">
        <h5 class="fw-bold text-warning">Septembre 2023</h5>
        <p>Premières réflexions sur l'association</p>
      </div>
      <div class="timeline-step">
        <h5 class="fw-bold text-warning">Février 2024</h5>
        <p>Déclaration en Préfecture</p>
      </div>
      <div class="timeline-step">
        <h5 class="fw-bold text-warning">Septembre 2024</h5>
        <p>Lancement officiel</p>
      </div>
      <div class="timeline-step">
        <h5 class="fw-bold text-warning">Novembre 2024</h5>
        <p>Signature du premier partenariat avec EVA</p>
      </div>
      <div class="timeline-step">
        <h5 class="fw-bold text-warning">Février 2025</h5>
        <p>Anniversaire des 1 an de l'association</p>
      </div>
      <div class="timeline-step">
        <h5 class="fw-bold text-warning">Mars 2025</h5>
        <p>Première participation d'Eloquéncia en tant que présentatrice de concours d'éloquence</p>
      </div>
    </div>
  </div>
  </section>
    

          
<!-- About 1 - Bootstrap Brain Component -->
<section class="py-3 py-md-5">
  <div class="container">
    <div class="row gy-3 gy-md-4 gy-lg-0 align-items-lg-center">
      <div class="col-12 col-lg-6 col-xl-5">
        <img class="img-fluid rounded" loading="lazy" src="{{ asset('images/logo.png') }}" alt="logo" style="height:400px;">
      </div>
      <div class="col-12 col-lg-6 col-xl-7">
        <div class="row justify-content-xl-center">
          <div class="col-12 col-xl-11">
            <h2 class="mb-3 fw-bold">Le Logo</h2>
            <p class="lead fs-4 text-secondary mb-3">La fabuleuse histoire derrière ce logo</p>
            <p class="mb-5"> Le logo d’Eloquéncia a tout d’abord été « Eloquéncia, première Edition » car le but premier était seulement d’accompagner les élèves de collèges et lycées à un concours de fin d’année. Cependant, le président a par la suite préféré que l’association soit plus accessible et qu’elle puisse proposer des activités plus diverses et concerner un plus large public. </p>
            <div class="row gy-4 gy-md-0 gx-xxl-5X">
              <div class="col-12 col-md-6">
                <div class="d-flex">
                  <div class="me-4 text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
                      <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                    </svg>
                  </div>
                  <div>
                    <h2 class="h4 mb-3">Maîtrise de l'Art Oratoire</h2>
                    <p class="text-secondary mb-0">Nous formons à l'excellence de l'expression orale pour toutes les situations de la vie quotidienne, professionnelle ou scolaire.</p>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-6">
                <div class="d-flex">
                  <div class="me-4 text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-fire" viewBox="0 0 16 16">
                      <path d="M8 16c3.314 0 6-2 6-5.5 0-1.5-.5-4-2.5-6 .25 1.5-1.25 2-1.25 2C11 4 9 .5 6 0c.357 2 .5 4-2 6-1.25 1-2 2.729-2 4.5C2 14 4.686 16 8 16Zm0-1c-1.657 0-3-1-3-2.75 0-.75.25-2 1.25-3C6.125 10 7 10.5 7 10.5c-.375-1.25.5-3.25 2-3.5-.179 1-.25 2 1 3 .625.5 1 1.364 1 2.25C11 14 9.657 15 8 15Z" />
                    </svg>
                  </div>
                  <div>
                    <h2 class="h4 mb-3">Ouverture Culturelle</h2>
                    <p class="text-secondary mb-0">Nous valorisons notre culture provençale tout en encourageant l'ouverture au monde à travers l'éloquence.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="py-5">
  <div class="container">
    <div class="row justify-content-center">
      
      <div class="col-lg-8">
        <div class="p-4 rounded shadow-sm bg-warning bg-opacity-25 position-relative">
          
          <h3 class="fw-bold mb-3 text-warning">
            <i class="bi bi-chat-dots"></i> Signification d'Eloquéncia
          </h3>

          <p class="fs-5 text-dark">
            Le nom <span class="fw-bold">Eloquéncia</span> est inspiré du provençal dans le but de rendre hommage à notre culture locale, que nous avons à cœur de préserver.
          </p>

          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning">
          ℹ️
          </span>

        </div>
      </div>

    </div>
  </div>
</section>



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
