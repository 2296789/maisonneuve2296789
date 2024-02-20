@extends('layouts.app')
@section('title', 'Edutiant List')
@section('content')

<h1 class="my-5"> Edutiant List</h1>
    <div class="row">
    @forelse($edutiants as $edutiant)
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-body">
                    <h3 class="mb-0">{{ $edutiant->nom }}</h3>
                    <hr>
                    <ul class="list-unstyled">
                        <li><strong>Courriel: </strong>{{ $edutiant->email}}</li>
                        <li><strong>Date de naissance: </strong>{{ $edutiant->date_naissance }}</li>
                        <li><strong>Telephone: </strong>{{ $edutiant->telephone}}</li>
                        <li><strong>Ville: </strong>{{ $edutiant->ville->nom}}</li>
                    </ul>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-end">
                        <a href="{{route('edutiant.show', $edutiant->id)}}" class="btn btn-sm btn-outline-primary">	Affichager</a>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="alert alert-danger">There are no edutiants to display!</div>
    @endforelse  
    </div>

@endsection