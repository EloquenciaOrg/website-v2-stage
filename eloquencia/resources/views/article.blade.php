@extends('layouts.base_vitrine')

@section('content')
  <div class="container py-5">

    <!-- Titre de l'article -->
    <h1 class="fw-bold text-center mb-4 text-warning">{{ $article->title }}</h1>

    <!-- Résumé (sous-titre) -->
    <p class="lead text-center text-muted mb-5" style="font-size: 1.25rem;">
        {{ $article->summary }}
    </p>

    <!-- Image (si disponible) -->
    @if ($article->pic)
        <div class="text-center mb-4">
            <img src="{{ asset($article->pic) }}" alt="Image de l'article" class="img-fluid rounded shadow" style="max-height: 400px; object-fit: cover;">
        </div>
    @endif

    <!-- Contenu de l'article (formaté avec Summernote) -->
    <div class="bg-light p-4 rounded shadow-sm mt-5" style="border-left: 6px solid #ffc107;">
        {!! $article->content !!}
    </div>

    <!-- Bouton retour -->
    <div class="text-center mt-5">
        <a href="{{ url('/blog') }}" class="btn btn-warning fw-bold px-4">
            ← Retour au blog
        </a>
    </div>

</div>
@endsection