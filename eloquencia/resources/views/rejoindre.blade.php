<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Eloquéncia</title>
  <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- AOS Animate on Scroll CSS -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <!-- Icons8 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    .img-featurette {
    max-width: 100%;
    height: auto;
    border-radius: 15px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

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

  <p class="p-3 m-4 bg-light"></p>

  <div class="container text-center mb-5">
    <img src="{{ asset('images/logo.png') }}" alt="logo" style="width: 120px; height: 120px;">
    <h2 class="fw-bold display-6">Pourquoi nous rejoindre ?</h2>
    <p class="text-muted">Découvrez les valeurs, les engagements et les avantages de l'association</p>
    <a href="#jobs" class="btn btn-warning fw-bold shadow rounded-pill px-4 py-2 transition">Nous rejoindre</a>

  </div>

  <section class="container my-5">
  <!-- Section 1 -->
  <div class="row align-items-center mb-5" data-aos="fade-right" data-aos-delay="900">
    <div class="col-md-7">
      <h2 class="fw-bold mb-3">Une équipe dynamique</h2>
      <p class="lead">Eloquéncia, fondée par Marouan JLASSI, un lycéen passionné, est bien plus qu'une simple association. C'est un projet dynamique et social, ouvert à toutes 
        les personnes motivées, quels que soient leurs parcours. En nous rejoignant, vous aurez l'opportunité d’enrichir vos compétences dans des domaines variés : maîtrise de 
        la prise de parole en public, développement de vos aptitudes sociales, approfondissement de vos connaissances dans le domaine qui vous passionne, et bien plus encore. 
        Vous participerez à un projet ambitieux, porteur de sens et rempli de défis ! Venez vivre une aventure humaine unique, tissez des liens forts et devenez un acteur actif 
        de la vie associative !</p>
    </div>
    <div class="col-md-5 text-center">
      <img src="{{ asset('images/recrutement_1.png') }}" alt="Photo d'une équipe dynamique" class="img-featurette shadow">
    </div>
  </div>

  <!-- Section 2 -->
  <div class="row align-items-center mb-5 flex-md-row-reverse" data-aos="fade-left" data-aos-delay="900">
    <div class="col-md-7">
      <h2 class="fw-bold mb-3 display-5">Les avantages du monde associatif</h2>
      <p class="lead">
      Rejoindre notre association, c'est l'opportunité d’acquérir des compétences pratiques et valorisées, d’élargir ton réseau, et de t’épanouir personnellement en t’engageant pour 
      des causes importantes. C’est une expérience enrichissante qui te permet non seulement de te préparer pour ton avenir professionnel, mais aussi de contribuer positivement à la 
      société. En plus, cela te donnera l’occasion de faire des rencontres, de développer ta conscience sociale, et de vivre des expériences concrètes que tu pourras valoriser dans 
      ton parcours. Alors, pourquoi ne pas faire le premier pas et nous rejoindre ?  
      </p>
    </div>
    <div class="col-md-5 text-center">
      <img src="{{ asset('images/recrutement_2.png') }}" alt="Illustration des avantages du monde associatif" class="img-featurette shadow">
    </div>
  </div>

  <!-- Section 3 -->
  <div class="row align-items-center" data-aos="fade-right" data-aos-delay="900">
    <div class="col-md-7">
      <h2 class="fw-bold mb-3 display-3">Nous avons besoin de vous !</h2>
      <p class="lead">
      Nous recherchons des personnes de tous horizons pour former une équipe dynamique, composée de jeunes et d’adultes motivés, afin de rendre notre association encore plus active. 
      Plusieurs missions sont disponibles, et seront proposées en fonction de vos compétences et de vos intérêts. Vous pourrez adapter votre engagement selon vos disponibilités, 
      que ce soit pour un soutien régulier à mi-temps ou une aide ponctuelle. Chaque contribution est précieuse et nous avons besoin de toutes les bonnes volontés ! 
      </p>
    </div>
    <div class="col-md-5 text-center">
      <img src="{{ asset('images/recrutement_3.png') }}" alt="Appel au bénévolat" class="img-featurette shadow">
    </div>
  </div>
  </section>

<hr class="my-4">
<div id="jobs">
    <h1 class="text-center fw-bold">Postes disponibles</h1>
    <div class="album py-5">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 d-flex flex-row">
                <div class="col">
                    <div class="card shadow-sm h-100">
                        <img class="img-fluid" alt="" width="100%" height="225" src="{{ asset('images/tresorerie.png') }}">
                        <div class="card-body">
                            <span class="badge text-bg-warning">Comptabilité</span> <span class="badge text-bg-warning">Administratif</span>
                            <p class="card-text"></p><h2>Trésorerie</h2><p>Si la gestion des finances vous passionne et que vous souhaitez jouer un rôle central dans le bon fonctionnement de nos projets, rejoignez la trésorerie d'Eloquéncia !
                                Vous serez responsable de la gestion des budgets, de la comptabilité et des ressources financières de l'association, en veillant à ce que chaque projet soit mené à bien de manière efficace et transparente.
                                Votre rigueur et votre organisation garantiront la pérennité de nos actions et le succès de nos événements.
                            </p>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-between align-items-center"><button type="button" class="btn btn-warning" onclick="openModal('Trésorier')">Rejoindre</button></div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm h-100">
                        <img class="img-fluid" alt="" width="100%" height="225" src="{{ asset('images/administration.png') }}">
                        <div class="card-body">
                            <span class="badge text-bg-warning">Gestion</span> <span class="badge text-bg-warning">Administratif</span>
                            <p class="card-text"></p><h2>Administration</h2><p>Si vous aimez organiser, structurer et être au cœur des décisions importantes, l'administration d'Eloquéncia a besoin de vous ! Vous serez le pilier de notre association, en veillant à la bonne gestion de nos activités, à la coordination des projets et à l'organisation des événements. Votre rôle est essentiel pour assurer la fluidité de notre fonctionnement, et vous serez impliqué(e) dans toutes les décisions clés qui façonnent l'avenir de notre association.</p>
                        </div>
                        <div class="card-footer">
                        <div class="d-flex justify-content-between align-items-center"><button type="button" class="btn btn-warning" onclick="openModal('Administration')">Rejoindre</button></div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm h-100">
                        <img class="img-fluid" alt="" width="100%" height="225" src="{{ asset('images/communication.png') }}">
                        <div class="card-body">
                            <span class="badge text-bg-warning">Réseaux</span> <span class="badge text-bg-warning">Création</span>
                            <p class="card-text"></p><h2>Communication</h2><p>Passionné(e) par les réseaux sociaux, le marketing et la créativité ? Rejoignez l'équipe communication et faites rayonner Eloquéncia auprès du grand public ! Votre mission sera de gérer notre présence en ligne, de créer du contenu attractif, et de promouvoir nos événements et ateliers. Vous jouerez un rôle essentiel dans le développement de l'image de l'association en touchant un public plus large grâce à des campagnes innovantes et percutantes.</p>
                        </div>
                        <div class="card-footer">
                        <div class="d-flex justify-content-between align-items-center"><button type="button" class="btn btn-warning" onclick="openModal('Communication')">Rejoindre</button></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 d-flex flex-row mt-3">
                <div class="col">
                    <div class="card shadow-sm h-100">
                        <img class="img-fluid" alt="" width="100%" height="225" src="{{ asset('images/intervenant.png') }}">
                        <div class="card-body">
                            <span class="badge text-bg-warning">Parole en public</span> <span class="badge text-bg-warning">Enseignement</span>
                            <p class="card-text"></p><h2>Intervenant</h2><p>Vous avez le goût de la transmission et aimez partager vos connaissances ? Devenez intervenant chez Eloquéncia et aidez à former la prochaine génération d’orateurs !
En rejoignant notre équipe, vous aurez l'opportunité d'accompagner les jeunes dans le développement de leurs compétences en prise de parole, en leur transmettant des techniques d'éloquence et en les aidant à surmonter leur peur du public.
Faites une réelle différence en préparant les orateurs de demain !
                            </p>
                        </div>
                        <div class="card-footer">
                        <div class="d-flex justify-content-between align-items-center"><button type="button" class="btn btn-warning" onclick="openModal('Intervenant')">Rejoindre</button></div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm h-100">
                        <img class="img-fluid" alt="" width="100%" height="225" src="{{ asset('images/monteur.png') }}">
                        <div class="card-body">
                            <span class="badge text-bg-warning">Montage</span> <span class="badge text-bg-warning">Création</span>
                            <p class="card-text"></p><h2>Monteur (Photo/Vidéo)</h2><p>Créatif(ve) et passionné(e) par l'image, la vidéo et le montage ?
                            Nous avons besoin de monteurs talentueux pour capturer et promouvoir nos prochaines activités ! En tant que monteur photo et vidéo, vous jouerez un rôle clé en immortalisant nos événements, en créant des contenus dynamiques et en valorisant nos actions à travers des vidéos percutantes. Si vous aimez raconter des histoires à travers l'image et avez un œil pour les détails, ce poste est fait pour vous !</p>
                        </div>
                        <div class="card-footer">
                        <div class="d-flex justify-content-between align-items-center"><button type="button" class="btn btn-warning" onclick="openModal('Monteur')">Rejoindre</button></div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm h-100">
                        <img class="img-fluid" alt="" width="100%" height="225" src="{{ asset('images/mandataire.png') }}">
                        <div class="card-body">
                            <span class="badge text-bg-warning">Gestion </span> <span class="badge text-bg-warning">Direction</span> <span class="badge text-bg-warning">Administratif</span>
                            <p class="card-text"></p><h2>Mandataire</h2><p>Si vous êtes rigoureux(se) et avez un talent pour la gestion des documents officiels, devenez mandataire et jouez un rôle crucial au sein de l'association !
Aux côtés du Président, vous assurerez la bonne gestion administrative et légale d'Eloquéncia.
Votre mission sera de veiller à ce que toutes les démarches et obligations officielles soient respectées, contribuant ainsi au bon fonctionnement et à la conformité de nos actions. Ce poste est idéal pour les personnes organisées et méticuleuses !</p>
                        </div>
                        <div class="card-footer">
                        <div class="d-flex justify-content-between align-items-center"><button type="button" class="btn btn-warning" onclick="openModal('Mandataire')">Rejoindre</button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="ModalLabel">Rejoindre</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST">
      <div class="modal-body">
        <div class="mb-3">
            <label for="name" class="form-label">Nom Prénom</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Adresse e-mail</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="job" class="form-label">Poste souhaité</label>
            <select class="form-select" id="job" name="job" required>
                <option selected disabled value="">Choisir...</option>
                <option value="Trésorier">Trésorier</option>
                <option value="Administration">Administration</option>
                <option value="Communication">Communication</option>
                <option value="Intervenant">Intervenant</option>
                <option value="Monteur">Monteur (Photo/Vidéo)</option>
                <option value="Mandataire">Mandataire</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
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
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-warning">Envoyer</button>
      </div>
      </form>
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
  <!-- AOS Animate on Scroll JS -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>AOS.init();</script>
  <script>function openModal(job) {
        document.getElementById('job').value = job;
        var myModal = new bootstrap.Modal(document.getElementById('Modal'), {
            keyboard: false
        });
        myModal.show();
    }</script>

</body>
</html>
