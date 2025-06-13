@extends('layouts.base_admin')

@section('content')         

<div class="container mt-5">
    <h2 class="fw-bold mb-4 text-center">Liste des leçons :</h2>
    <!-- Boutons d'action -->
    <div class="text-center mb-3">
        <button class="btn btn-warning me-2" data-bs-toggle="modal" data-bs-target="#leconsModal">Ajouter une leçon</button>
        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#notifModal">Gérer les chapitres</button>
    </div>

    <!-- Tableau -->
     @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
        </div>
    @elseif (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>Titre</th>
                    <th>Contenu</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($lessons as $lesson)
                    <tr>
                        <td class="fw-semibold">{{ $lesson->title }}</td>
                        <td>{{ $lesson->summary }}</td>
                        <td class="text-center">
                            <a href="" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#leconsEditModal{{ $lesson->ID }}">
                                <i class="bi bi-pencil-fill" title="Editer"></i>
                            </a>
                            <form action="{{ route('lecon.supprimer', $lesson->ID) }}" method="POST" class="d-inline" onsubmit="return confirm('Confirmer la suppression ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger mt-1">
                                    <i class="bi bi-trash-fill" title="Suprimer"></i>
                                </button>
                            </form>
                        </td>
                            <!-- Modal MODIF DE LECONS-->
                            <div class="modal fade" id="leconsEditModal{{ $lesson->ID }}" tabindex="-1" aria-labelledby="LeconsGestionModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content shadow">

                                        <div class="modal-header bg-warning text-white">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                                        </div>

                                        <div class="modal-body">
                                            <div class="container">
                                                <h3 class="fw-bold mb-3 text-center">Modifier la leçon :</h3>
                                                <form action="{{ route('lecon.modifier', $lesson->ID) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="row mb-3">
                                                        <div class="col-md-12">
                                                            <select name="chapter" class="form-select" required>
                                                                <option value="" disabled selected>Choisir un chapitre</option>
                                                                @foreach ($chapters as $chapter)
                                                                    <option value="{{ $chapter->ID }}">{{ $chapter->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-12 mt-2">
                                                            <input type="text" name="title" class="form-control" placeholder="Titre" value="{{ $lesson->title }}" required>
                                                        </div>
                                                        <div class="col-md-12 mt-2">
                                                            <textarea name="summary" class="form-control" rows="2" placeholder="Résumé" required>{{ $lesson->summary }}</textarea>
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <p>Contenu :</p>
                                                        <textarea name="content" id="summernote2" class="form-control" rows="6" required>{{ $lesson->content }}</textarea>
                                                    </div>
                                                    <div class="text-center">
                                                        <button class="btn btn-warning" type="submit">Modifier</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center text-muted">Aucune leçon disponible.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Modal GESTION DES CHAPITRES-->
    <div class="modal fade" id="notifModal" tabindex="-1" aria-labelledby="notifGestionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content shadow">

                <div class="modal-header bg-warning text-white">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                </div>

                <div class="modal-body">
                    <div class="container">
                        <h3 class="fw-bold mb-3 text-center">Liste des chapitres :</h3>
                        <div class="table-responsive">
                        <table class="table table-bordered align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Titre</th>
                                    <th>Contenu</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($chapters as $chapter)
                                    <tr>
                                        <td class="fw-semibold">{{ $chapter->name }}</td>
                                        <td>{{ $chapter->description }}</td>
                                        <td class="text-center">
                                            <a href="{{ url('/admin/chap_edit/' . $chapter->ID) }}" class="btn btn-sm btn-warning">
                                                <i class="bi bi-pencil-fill" title="Editer"></i>
                                            </a>
                                            <form action="{{ route('chapitre.supprimer', $chapter->ID) }}" method="POST" class="d-inline" onsubmit="return confirm('Confirmer la suppression ?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger mt-1">
                                                    <i class="bi bi-trash-fill" title="Suprimer"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center text-muted">Aucun chapitre dans la base de donnée.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        </div>
                    </div>
                    <div class="container">
                        <h3 class="fw-bold mb-3 text-center">Ajouter un chapitre :</h3>
                        <form action="/admin/chapitre_ajouter" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <input type="text" name="name" class="form-control" placeholder="Titre du chapitre" required>
                                </div>
                                <div class="col-md-12 mt-2">
                                    <textarea name="description" class="form-control" rows="2" placeholder="Description du chapitre" required></textarea>
                                </div>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-warning" type="submit">Ajouter</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal AJOUT DE LECONS-->
     <div class="modal fade" id="leconsModal" tabindex="-1" aria-labelledby="LeconsGestionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content shadow">

                <div class="modal-header bg-warning text-white">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                </div>

                <div class="modal-body">
                    <div class="container">
                        <h3 class="fw-bold mb-3 text-center">Ajouter une leçon :</h3>
                        <form action="/admin/lecon_ajouter" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <select name="chapter" class="form-select" required>
                                        <option value="" disabled selected>Choisir un chapitre</option>
                                        @foreach ($chapters as $chapter)
                                            <option value="{{ $chapter->ID }}">{{ $chapter->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12 mt-2">
                                    <input type="text" name="title" class="form-control" placeholder="Titre" required>
                                </div>
                                <div class="col-md-12 mt-2">
                                    <textarea name="summary" class="form-control" rows="2" placeholder="Résumé" required></textarea>
                                </div>
                            </div>

                            <div class="mb-3">
                                <p>Contenu :</p>
                                <textarea name="content" id="summernote2" class="form-control" rows="6" required></textarea>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-warning" type="submit">Ajouter</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
</div>

 

@endsection
