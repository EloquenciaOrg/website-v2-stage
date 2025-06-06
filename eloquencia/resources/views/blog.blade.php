@extends('layouts.base_vitrine')

@section('content')


  <!-- BLOG -->
  <!-- BLOG -->
  <div class="container" id="blog">
    <h2 class="text-center fw-bold mb-5 mt-5">Blog :</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
      
      @foreach ($blogs as $blog)
          <div class="col">
              <a href="{{ route('article.show', $blog->id) }}" class="text-decoration-none text-dark">
                  <div class="card h-100 shadow border-0">
                      <img src="{{ $blog->pic }}" class="card-img-top" alt="Image" style="height: 200px; object-fit: cover;">
                      <div class="card-body text-center">
                          <h5 class="fw-bold">{{ $blog->title }}</h5>
                          <div class="text-muted" style="max-height: 100px; overflow: hidden;">
                              <p>{{ $blog->summary }}</p>
                          </div>
                      </div>
                  </div>
              </a>
          </div>
      @endforeach  

    </div>
  </div>

@endsection
