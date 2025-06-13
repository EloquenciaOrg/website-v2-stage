@extends('layouts.base_lms')

@section('content')
  <div class="container my-5">
    <!-- Titre du chapitre -->
    <h2 class="mb-4">{{ $chapitre->name }}</h2>

    <!-- Description -->
    @if ($chapitre->description)
        <div class="alert alert-light">
            {!! nl2br(e($chapitre->description)) !!}
        </div>
    @endif

    <!-- Leçons -->
    <h3 class="mt-5 mb-3">Leçons</h3>

    <div class="row g-4">
        @forelse ($lessons as $lesson)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $lesson->title }}</h5>
                        <p class="card-text text-muted flex-grow-1">{{ $lesson->summary }}</p>
                        <a href="{{ route('lecon.afficher', ['id' => $lesson->ID]) }}" class="btn btn-outline-warning mt-3">Voir la leçon</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-warning">
                    Aucune leçon disponible pour ce chapitre.
                </div>
            </div>
        @endforelse
    </div>
    
@endsection


