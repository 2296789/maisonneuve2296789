@extends('layouts.app')
@section('title', 'edutiant')
@section('content')
  
  <div class="row mb-2">
    <div class="col-md-10">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <h3 class="mb-0">{{ $edutiant->nom }}</h3><br>
          <p class="card-text mb-auto">Adresse : {{ $edutiant->adresse }}</p>
          <p class="card-text mb-auto">Téléphone : {{ $edutiant->telephone }}</p>
          <p class="card-text mb-auto">Courriel : {{ $edutiant->email }}</p>
          <p class="card-text mb-auto">Date de naissance : {{ $edutiant->date_naissance }}</p>
          <p class="card-text mb-auto">Ville : {{ $edutiant->ville->nom }}</p>
          <br>
          <a href="{{ route('edutiant.edit', $edutiant->id) }}" class="btn btn-primary">
            Modifier
          </a>
          <br>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deleteModal">
            Supprimer
          </button>
        </div>
      </div>
    </div>
  </div>


<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Supprimer</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Êtes-vous sûr de vouloir supprimer : {{ $edutiant->nom }}?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <form  method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-sm btn-danger ">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>


@endsection