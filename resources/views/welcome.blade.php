@extends('layouts.app')
@section('title', 'Welcome')
@section('content')

<div class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary">
    <div class="col-lg-6 px-0">
        <h1 class="display-4">Maisoneuve College</h1>
        <p class="lead my-3"></p>
        <p class="lead mb-0"><a href="{{ route('edutiant.index') }}" class="text-body-emphasis fw-bold">Liste d'Edutiants</a></p>
    </div>
</div>

@endsection