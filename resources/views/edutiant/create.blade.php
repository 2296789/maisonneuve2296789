@extends('layouts.app')
@section('title', 'Ajouter edutiant')
@section('content')

<h1 class="mt-5 mb-4">Ajouter Edutiant</h1>
<div class="row justify-content-center mt-5 mb-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Ajouter Edutiant</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('edutiant.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom') }}">
                        @if($errors->has('nom'))
                        <div class="text-danger mt-2">
                            {{ $errors->first('nom') }}
                        </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Courriel</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                        @if($errors->has('email'))
                        <div class="text-danger mt-2">
                            {{ $errors->first('email') }}
                        </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="adresse" class="form-label">Adresse</label>
                        <input type="text" class="form-control" id="adresse" name="adresse" value="{{ old('adresse') }}">
                        @if($errors->has('adresse'))
                        <div class="text-danger mt-2">
                            {{ $errors->first('adresse') }}
                        </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="telephone" class="form-label">Télephone</label>
                        <input type="tel" class="form-control" id="telephone" name="telephone" value="{{ old('telephone') }}">
                        @if($errors->has('telephone'))
                        <div class="text-danger mt-2">
                            {{ $errors->first('telephone') }}
                        </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="date_naissance" class="form-label">Date de Naissance</label>
                        <input type="date" class="form-control" id="date_naissance" name="date_naissance" value="{{ old('date_naissance') }}">
                        @if($errors->has('date_naissance'))
                        <div class="text-danger mt-2">
                            {{ $errors->first('date_naissance') }}
                        </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="ville_id" class="form-label">Ville</label>
                        <select class="form-select" id="ville_id" name="ville_id">
                            <option value="">Sélectionner une ville</option>
                            @foreach($villes as $ville)
                                <option value="{{ $ville->id }}">{{ $ville->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection