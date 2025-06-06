@extends('layouts.base_admin')

@section('content')
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



@endsection