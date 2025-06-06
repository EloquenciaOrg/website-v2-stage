@extends('layouts.base_vitrine')

@section('content')
  <p class="p-3 m-4 bg-light"></p>

  <div class="container text-center mb-5">
    <img src="{{ asset('images/logo.png') }}" alt="logo" style="width: 120px; height: 120px;">
    <h2 class="fw-bold display-6">Nos Services</h2>
    <p class="text-muted">Découvrez les valeurs, les engagements et les avantages de l'association</p>

  </div>


<div class="container py-5">

  <!-- Devenir adhérent -->
  <div class="card shadow mb-5 border-0">
    <div class="card-body">
      <h2 class="text-warning fw-bold mb-3">
        <i class="bi bi-mortarboard-fill me-2"></i>Devenir adhérent
      </h2>
      <p>Rejoignez l’aventure Eloquéncia !</p>
      <p>Notre association propose régulièrement des ateliers à Berre l’Étang, ainsi que des ressources exclusives sur notre plateforme en ligne.</p>

      <h5 class="fw-semibold mt-4">En devenant adhérent, vous bénéficiez de :</h5>
      <ul class="list-unstyled">
        <li>✅ Accès aux ateliers en présentiel</li>
        <li>✅ Accompagnement personnalisé</li>
        <li>✅ Plateforme d’apprentissage : cours, vidéos, exercices</li>
        <li>✅ Carte d’adhérent pour tarifs réduits événements*</li>
      </ul>
      <p class="fst-italic text-muted">*Réductions valables uniquement pour les événements organisés par Eloquéncia.</p>

      <div class="row mt-4">
        <div class="col-md-4">
          <img src="{{ asset('images/marouan_gateau.png') }}" class="img-fluid rounded mb-3 shadow-sm" alt="Atelier 1">
        </div>
        <div class="col-md-4">
          <img src="{{ asset('images/Eloquencia_groupe.png') }}" class="img-fluid rounded mb-3 shadow-sm" alt="Atelier 2">
        </div>
        <div class="col-md-4">
          <img src="{{ asset('images/marouan_gateau 2.png') }}" class="img-fluid rounded mb-3 shadow-sm" alt="Atelier 3">
        </div>
      </div>

      <div class="alert alert-warning mt-4">
        <strong><i class="bi bi-person-vcard-fill"></i> Étudiants :</strong> Bénéficiez automatiquement de <strong>-50%</strong> sur votre adhésion (10€/an)<br>
        <a href="{{ url('/reduction') }}" class="btn btn-outline-warning mt-2">Faire une demande de réduction</a>
      </div>
    </div>
  </div>

  <!-- Club Eloquéncia -->
  <div class="card shadow mb-5 border-0">
    <div class="card-body">
      <h2 class="text-warning fw-bold mb-3">
        <i class="bi bi-megaphone-fill me-2"></i>Le Club Eloquéncia (13–20 ans)
      </h2>
      <p>Un espace réservé aux jeunes pour apprendre à s’exprimer avec confiance.</p>
      <ul class="list-unstyled">
        <li>✅ Vaincre la timidité</li>
        <li>✅ Participer à des concours régionaux</li>
        <li>✅ Créer des liens avec d’autres jeunes</li>
        <li>✅ Accompagnement à l’oral</li>
      </ul>
      <div class="row mt-4">
        <div class="col-md-4">
          <img src="{{ asset('images/Marouan_Introduction.png') }}" class="img-fluid rounded mb-3 shadow-sm" alt="Atelier 1">
        </div>
        <div class="col-md-4">
          <img src="{{ asset('images/recrutement_1.png') }}" class="img-fluid rounded mb-3 shadow-sm" alt="Atelier 3">
        </div>
        <div class="col-md-4">
          <img src="{{ asset('images/marouan_anniversaire.png') }}" class="img-fluid rounded mb-3 shadow-sm" alt="Atelier 2">
        </div>
      </div>
      <p class="fw-semibold mt-2">Comment rejoindre le club ? <span class="fw-normal">Il suffit d’être adhérent et de faire une demande via votre espace personnel.</span></p>
    </div>
  </div>

  <!-- Formations professionnelles -->
  <div class="card shadow mb-5 border-0">
    <div class="card-body">
      <h2 class="text-warning fw-bold mb-3">
        <i class="bi bi-building me-2"></i>Formations professionnelles
      </h2>
      <p>Pour entreprises ou collectivités : formations sur-mesure autour de la prise de parole.</p>

      <h5 class="fw-semibold">Thématiques proposées :</h5>
      <ul class="list-unstyled">
        <li>✅ Gérer son stress en entreprise</li>
        <li>✅ Aisance face aux clients</li>
        <li>✅ Améliorer l’élocution, articulation, clarté</li>
      </ul>
      <p class="mt-3">📩 <strong>Formations sur devis :</strong> <a href="mailto:contact@eloquencia.org">contact@eloquencia.org</a></p>
      <p class="text-muted fst-italic">💡 Tous les fonds sont réinvestis dans nos actions (association à but non lucratif).</p>
    </div>
  </div>

  <!-- Présentateur évènements -->
  <div class="card shadow mb-5 border-0">
    <div class="card-body">
      <h2 class="text-warning fw-bold mb-3">
        <i class="bi bi-mic-fill me-2"></i>Présentateur pour vos événements
      </h2>
      <p>Organisez un concours, une remise de prix ou une cérémonie ?<br>
      Nous proposons un présentateur spécialisé en art oratoire.</p>
      <p>Nos intervenants savent captiver et dynamiser votre public.</p>
      <p>📩 Contact : <a href="mailto:contact@eloquencia.org">contact@eloquencia.org</a></p>
    </div>
  </div>

</div>
@endsection
