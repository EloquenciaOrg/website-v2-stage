@extends('layouts.base_lms')

@section('content')

<div class="container my-5">
    <h1 class="text-center mb-3">{{ $lesson->title }}</h1>
    {!! html_entity_decode($lesson->content) !!}
    <div class="text-center mt-4">
        <a href="{{ url('/lms/chapitre/' . $chapitre->ID) }}" class="btn btn-warning fw-bold px-4">
            ← Retour au chapitre
        </a>
    </div>
</div>

@endsection