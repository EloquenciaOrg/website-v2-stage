@extends('layouts.base_admin')

@section('content')
  </nav>

  <div class="container mt-4">
    <h1 class="mb-4 fw-bold text-center">Liste des administrateurs</h1>

    <div class="table-responsive">
        <table class="table table-bordered ">
            <thead class="table-warning">
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Changement de mot de passe</th>
                </tr>
            </thead>
            <tbody>
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @foreach($admins as $admin)
            <tr>
                <td>{{ $admin->ID }}</td>
                <td>{{ $admin->email }}</td>
                <td>
                    <!-- Bouton pour ouvrir le modal -->
                    <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editPasswordModal{{ $admin->ID }}">
                        Modifier le mot de passe
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="editPasswordModal{{ $admin->ID }}" tabindex="-1" aria-labelledby="editPasswordModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form method="POST" action="/gestion_admins_update_password">
                                @csrf
                                @method('PUT')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Modifier mot de passe</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <input type="hidden" name="id" value="{{ $admin->ID }}">
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Nouveau mot de passe</label>
                                            <input type="password" name="password" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="password_confirmation" class="form-label">Confirmer</label>
                                            <input type="password" name="password_confirmation" class="form-control" required>
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
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
