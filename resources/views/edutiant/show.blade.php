@extends('layouts.app')
@section('title', 'edutiant')
@section('content')
  
  <div class="row mb-2">
    <div class="col-md-10">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <!-- <strong class="d-inline-block mb-2 text-primary-emphasis">Nom</strong> -->
          <h3 class="mb-0">{{ $edutiant->nom }}</h3>
          <!-- <div class="mb-1 text-body-secondary">group 1</div> -->
          <p class="card-text mb-auto">Adresse : {{ $edutiant->adresse }}</p>
          <p class="card-text mb-auto">Telephone : {{ $edutiant->telephone }}</p>
          <p class="card-text mb-auto">Courriel : {{ $edutiant->email }}</p>
          <p class="card-text mb-auto">Date de naissance : {{ $edutiant->date_naissance }}</p>
          <p class="card-text mb-auto">Ville : {{ $edutiant->ville->nom }}</p>
          <a href="#" class="icon-link gap-1 icon-link-hover stretched-link">
            Modifier
            <svg class="bi"><use xlink:href="#chevron-right"/></svg>
          </a>
          <a href="#" class="icon-link gap-1 icon-link-hover stretched-link">
            Supprimer
            <svg class="bi"><use xlink:href="#chevron-right"/></svg>
          </a>
        </div>
        <div class="col-auto d-none d-lg-block">
          <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
        </div>
      </div>
    </div>
  </div>

@endsection