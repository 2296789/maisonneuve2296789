@extends('layouts.app')
@section('title', 'Registration')
@section('content')

@if(!$errors->isEmpty())
<!-- 如果有错误 -->
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    <ul>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<h1>Registration</h1>
<div class="row justify-content-center">
    <div class="col-md-4">
    <!-- <div class="col-md-8"> zhiqian wei 8-->
        <div class="card ">
            <div class="card-header ">
                <h5 class="card-title">New User</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('user.store') }}" method="POST">
                    <!-- 如果submit到当前页，可以设置action如上，也可以action=""，或者不写action -->
                    @csrf
                    <!-- method=post时必须有此token命令 -->
                    {{--<div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" value="{{old('nom')}}">
                    </div>--}}
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}">
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                    <!-- <input type="submit" value="Save"> -->
                </form>
            </div>
        </div>
    </div>
</div>
@endsection