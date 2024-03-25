@extends('layouts.app')
@section('title', __('lang.text_new_category'))
@section('content')

    @if(!$errors->isEmpty())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <h1 class="mt-5 mb-4">@lang('lang.text_new_category')</h1>
    <div class="row justify-content-center mt-5 mb-5">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">@lang('lang.text_new_category')</h5>
                </div>
                <div class="card-body">
                    <form method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="category_en" class="form-label">@lang('lang.text_category_in_english')</label>
                            <input type="text" class="form-control" id="category_en" name="category_en" value="{{old('category_en')}}">
                        </div>
                        <div class="mb-3">
                            <label for="category_fr" class="form-label">@lang('lang.text_category_in_french')</label>
                            <input type="text" class="form-control" id="category_fr" name="category_fr" value="{{old('category_fr')}}">
                        </div>
                        <button type="submit" class="btn btn-primary">@lang('lang.text_save')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection