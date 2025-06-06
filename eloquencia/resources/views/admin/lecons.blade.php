@extends('layouts.base_admin')

@section('content')

@if(false)
    Articles du blog mis a la une 
    <h3 class="fw-bold mb-3">Leçons actuellement disponibles :</h3>
    <div class="row">
    @foreach($articles as $article)
        <div class="col-md-4 mb-4 text-center">
            <div class="card h-100 shadow-sm">
                {{-- Image BLOB (pic) --}}
                <img src="{{ $article->pic }}" alt="Image" class="card-img-top" style="height: 180px; object-fit: cover;">

                <div class="card-body">
                    <h5 class="card-title">{{ $article->title }}</h5>

                    {{-- Aperçu du contenu HTML nettoyé --}}
                    <p class="card-text text-muted">
                        {{ $article->summary }}
                    </p>
                </div>

                <div class="card-footer d-flex justify-content-between">
                    <form action="/supprimer_article" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" value="{{ $article->id }}">
                        <button type="submit" class="btn btn-sm btn-outline-danger">Supprimer</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    </div>
@endif

    <div class="container py-5">
        <h3 class="fw-bold mb-3 text-center">Ajouter une nouvelle leçon :</h3>
        <form action="/add_lesson" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <div class="col-md-6">
                    <input type="text" name="title" class="form-control" placeholder="Titre de l'article" required>
                </div>
                <div class="col-md-6">
                    <input type="text" name="chapter" class="form-control" placeholder="Numéro du chapitre" required>
                </div>
                <div class="col-md-6 mt-2">
                    <input type="text" name="name" class="form-control" placeholder="Nom du chapitre" required>
                </div>
                <div class="col-md-6 mt-2">
                    <input type="text" name="description" class="form-control" placeholder="Description du chapitre" required>
                </div>
                <div class="col-md-12 mt-2">
                    <textarea name="summary" class="form-control" rows="2" placeholder="Résumé" required></textarea>
                </div>
            </div>

            <div class="mb-3">
                <textarea name="content" id="summernote" class="form-control" rows="6" required></textarea>
            </div>
            <div class="text-center">
                <button class="btn btn-warning" type="submit">Ajouter</button>
            </div>
        </form>
    </div>


@endsection