@extends('layouts.base_admin')

@section('content')

  <div class="container mt-4 text-center">
    <h1 class="mb-4 fw-bold text-center">Demande de réduction</h1>

    <button type="button" class="btn btn-warning fw-bold shadow rounded-pill px-4 py-2 mb-3" data-bs-toggle="modal" data-bs-target="#historiqueModal">Voir l'historique des demandes</button>
    <!-- Modal -->
    <div class="modal fade" id="historiqueModal" tabindex="-1" aria-labelledby="historiqueModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="historiqueModalLabel">Historique des demandes</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
          </div>
          <div class="modal-body">
            <table class="table table-bordered table-striped">
              <thead class="table-warning">
                <tr>
                  <th>Nom</th>
                  <th>Email</th>
                  <th>Statut</th>
                </tr>
              </thead>
              <tbody>
                @forelse($historique as $entry)
                  <tr>
                    <td>{{ $entry->name }}</td>
                    <td>{{ $entry->email }}</td>
                    <td>
                      @if($entry->state == 1)
                        <span class="badge bg-success">Acceptée</span>
                      @elseif($entry->state == 2)
                        <span class="badge bg-danger">Refusée</span>
                      @endif
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="3" class="text-center text-muted">Aucune demande traitée</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="table-responsive">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
            </div>
        @endif
        <table class="table table-bordered ">
            <thead class="table-warning">
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Pièce justificative</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach($reductions as $reduction)
            <tr>
                <td>{{ $reduction->name }}</td>
                <td>{{ $reduction->email }}</td>
                <td><a href="{{ route('download.proof', $reduction->ID) }}" class="btn btn-sm btn-outline-warning">Télécharger</a></td>
                <td>
                  <div class="d-flex gap-1">
                    <form action="/reduction_accepte" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $reduction->ID }}">
                        <button type="submit" class="btn btn-sm btn-success">Valider</button>
                    </form>
                    <form action="/reduction_refuse" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $reduction->ID }}">
                        <button type="submit" class="btn btn-sm btn-danger">Refuser</button>
                    </form>
                    <button type="button" class="btn btn-sm btn-outline-dark" data-bs-toggle="modal" data-bs-target="#confirmBanModal{{ $reduction->ID }}">Bloquer</button>
                    <!-- Modal de confirmation de blocage -->
                    <div class="modal fade" id="confirmBanModal{{ $reduction->ID }}" tabindex="-1" aria-labelledby="confirmBanModalLabel{{ $reduction->ID }}" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="confirmBanModalLabel{{ $reduction->ID }}">Confirmation</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                          </div>
                          <div class="modal-body">
                            Etes-vous sûr de vouloir bloquer cet utilisateur : <strong>{{ $reduction->email }}</strong> ?
                          </div>
                          <div class="modal-footer">
                            <form method="POST" action="{{ route('ban.user.reduc') }}">
                              @csrf
                              <input type="hidden" name="email" value="{{ $reduction->email }}">
                              <input type="hidden" name="ip" value="{{ $reduction->ip }}">
                              <button type="submit" class="btn btn-danger">Oui, bloquer</button>
                            </form>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                          </div>
                        </div>
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
