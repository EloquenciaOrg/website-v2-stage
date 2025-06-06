@extends('layouts.base_admin')

@section('content')

<div class="container my-5">

<div class="text-center mb-5">
    <h1 class="fw-bold">Accueil</h1>
    <p class="text-muted">Bienvenue sur la plateforme d'administration d'Eloquéncia</p>
</div>

<div class="row g-4">

    <!-- Leçon -->
    <div class="col-md-4">
        <div class="card h-100 border-0 shadow">
            <div class="card-body text-center">
                <img src="https://img.icons8.com/fluency/48/book.png" alt="Leçons" class="mb-3" width="48">
                <h5 class="card-title fw-bold">Leçons</h5>
                <p class="card-text text-muted">Gérer les leçons du site et de l'application</p>
                <a href="{{ url('/admin/lecons') }}" class="btn btn-warning">Accéder</a>
            </div>
        </div>
    </div>

    <!-- Remises -->
    <div class="col-md-4">
        <div class="card h-100 border-0 shadow">
            <div class="card-body text-center">
                <img src="https://img.icons8.com/fluency/48/discount.png" alt="Remises" class="mb-3" width="48">
                <h5 class="card-title fw-bold">Remises</h5>
                <p class="card-text text-muted">Accéder aux demandes de réduction</p>
                <a href="{{ url('/admin/gestion_reduction') }}" class="btn btn-warning">Accéder</a>
            </div>
        </div>
    </div>

    <!-- Messagerie -->
    <div class="col-md-4">
        <div class="card h-100 border-0 shadow">
            <div class="card-body text-center">
                <img src="https://img.icons8.com/fluency/48/new-post.png" alt="Messagerie" class="mb-3" width="48">
                <h5 class="card-title fw-bold">Messagerie</h5>
                <p class="card-text text-muted">Consulter les messages reçus</p>
                <a href="{{ url('/admin/messagerie') }}" class="btn btn-warning">Accéder</a>
            </div>
        </div>
    </div>

    <!-- Utilisateurs -->
    <div class="col-md-4">
        <div class="card h-100 border-0 shadow">
            <div class="card-body text-center">
                <img src="https://img.icons8.com/fluency/48/user-group-man-man.png" alt="Utilisateurs" class="mb-3" width="48">
                <h5 class="card-title fw-bold">Administrateurs</h5>
                <p class="card-text text-muted">Gérer les utilisateurs administrateurs</p>
                <a href="{{ url('/admin/gestion_admins') }}" class="btn btn-warning">Accéder</a>
            </div>
        </div>
    </div>

    <!-- Adhérents -->
    <div class="col-md-4">
        <div class="card h-100 border-0 shadow">
            <div class="card-body text-center">
                <img src="https://img.icons8.com/fluency/48/group-foreground-selected.png" alt="Adhérents" class="mb-3" width="48">
                <h5 class="card-title fw-bold">Adhérents</h5>
                <p class="card-text text-muted">Gérer les adhérents de l'association</p>
                <a href="{{ url('/admin/members') }}" class="btn btn-warning">Accéder</a>
            </div>
        </div>
    </div>

    <!-- Paramètres -->
    <div class="col-md-4">
        <div class="card h-100 border-0 shadow">
            <div class="card-body text-center">
                <img src="https://img.icons8.com/fluency/48/settings.png" alt="Paramètres" class="mb-3" width="48">
                <h5 class="card-title fw-bold">Paramètres</h5>
                <p class="card-text text-muted">Modifier les paramètres du site et du LMS</p>
                <a href="{{ url('/admin/parametre') }}" class="btn btn-warning">Accéder</a>
            </div>
        </div>
    </div>

</div>

</div>

@endsection
