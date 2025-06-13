@extends('layouts.base_admin')

@section('content')

<div class="container mt-5">
    
    <h3 class="fw-bold mb-3 text-center">Modifier un chapitre :</h3>
    <form action="{{ route('chapitre.modifier', $chapter->ID) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col-md-12">
                <input type="text" name="name" class="form-control" placeholder="Titre du chapitre" value="{{ $chapter->name }}" required>
            </div>
            <div class="col-md-12 mt-2">
                <textarea name="description" class="form-control" rows="2" placeholder="Description du chapitre" required>{{ $chapter->description }}</textarea>
            </div>
        </div>
        <div class="text-center">
            <button class="btn btn-warning" type="submit">Modifier</button>
        </div>
    </form>
    <div class="text-center mt-3">
        <a href="/admin/lecons" class="btn btn-outline-warning text-center">Retour</a>
    </div>
</div>

@endsection