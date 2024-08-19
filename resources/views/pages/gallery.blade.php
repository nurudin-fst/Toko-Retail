@extends('layouts.layout-main')
@section('content')
  <div class="container px-2">
    <div class="columns-2 md:columns-3 lg:columns-3">
      @foreach ($images as $image)
      <a href="{{ asset('assets/img/gallery/'.$image->getFileName()) }}" class="glightbox">
        <img class="mb-4 rounded-lg" src="{{ asset('assets/img/gallery/'.$image->getFileName()) }}" />
      </a>
      @endforeach
    </div>
  </div>
@endsection
