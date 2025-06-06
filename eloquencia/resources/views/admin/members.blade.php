@extends('layouts.base_admin')

@section('content')

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
                          <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#confirmResetModal" title="Réinitialisation du mot de passe"><img src="{{ asset('images/icon_mdp.png') }}" alt="Reset" width="22" height="22"></button>
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

                          <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editEmailModal{{ $member->ID }}" title="Réinitialisation de l'adresse email"><img src="{{ asset('images/icon_email.png') }}" alt="Reset" width="22" height="22"></button>
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

@endsection
