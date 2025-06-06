@extends('layouts.base_vitrine')

@section('content')

  <!-- DEMANDE DE REDUCTION -->
  <section class="py-5" id="reduction">
  <div class="container">
    <div class="mx-auto" style="max-width: 700px;">
      <h2 class="text-center fw-bold mb-2">Demander une réduction</h2>
      <p class="text-center text-muted mb-4">Vous êtes étudiant(e) ou mineur(e) ? Envoyez une demande ici.</p>
      @if(session('success'))
          <div class="alert alert-success">
              {{ session('success') }}
          </div>
      @endif
      @if(session('error'))
          <div class="alert alert-danger">
              {{ session('error') }}
          </div>
      @endif
      @if ($errors->has('throttle'))
        <div class="alert alert-danger text-center">
          {{ $errors->first('throttle') }}
        </div>
      @endif

      <form class="bg-white shadow rounded p-4" action="/demande_reduction" method="POST" enctype="multipart/form-data" autocomplete="off">
      @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Nom complet</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Jean Dupont" required>
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Adresse mail</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="email@example.com" required>
        </div>

        <div class="mb-3">
          <label for="file" class="form-label">Justificatif (PDF, JPG, PNG)</label>
          <input class="form-control" type="file" id="file" name="file" accept=".jpg,.jpeg,.png,.pdf" required>
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

        <input class="form-check-input" type="checkbox" id="cgu" name="cgu" required>
        <label class="form-check-label" for="cgu">J’accepte les <a href="" target="_blank">conditions générales d’utilisation des données</a></label>

        <p class="text-muted small mt-3">
          Vos données sont utilisées uniquement pour cette demande et seront supprimées une fois traitée.
        </p>

        <div class="text-center mt-4">
          <button type="submit" class="btn btn-warning px-4 fw-semibold">Envoyer</button>
        </div>
      </form>

      <!-- Modal de mise en garde -->
      <div class="modal fade" id="emailWarningModal" tabindex="-1" aria-labelledby="emailWarningLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content border-warning">
            <div class="modal-header bg-warning">
              <h5 class="modal-title fw-bold" id="emailWarningLabel">Attention !</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <div class="modal-body">
              Les adresses <strong>@icloud.com</strong> et <strong>@sfr.fr</strong> peuvent poser problème pour la réception des e-mails.
              <br><br>
              Si possible, utilisez une autre adresse (ex: Gmail, Outlook...).
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-warning" data-bs-dismiss="modal">J'ai compris</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  

  </section>
@endsection
