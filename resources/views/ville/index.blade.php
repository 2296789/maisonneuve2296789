@extends('layouts.app')
@section('title', 'ville List')
@section('content')

  <div class="row">
  @forelse($villes as $ville)
    <div class="col-md-6">
      <h2 class="my-5">{{$ville->nom}}</h2>
    </div>
  @empty
    non villes
  @endforelse 
  </div>

@endsection