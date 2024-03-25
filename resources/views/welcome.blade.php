@extends('layouts.app')
@section('title', 'Welcome')
@section('content')

<div class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary">
    <div class="col-lg-6 px-0">
        <h1 class="display-4">@lang('lang.text_welcome_title')</h1>
        <p class="lead my-3">@lang('lang.text_welcome_paragraph_1')</p>
        <p class="lead my-3">@lang('lang.text_welcome_paragraph_2')</p>
        <p class="lead mb-0">
        @auth
            <a href="{{ route('article.index') }}" class="text-body-emphasis fw-bold">@lang('lang.text_welcome_btn')</a>
        @else
            <a href="{{ route('login') }}" class="text-body-emphasis fw-bold">@lang('lang.text_welcome_btn')</a><a href="{{ route('login') }}"> </a>
        @endauth
        </p>
    </div>
</div>

@endsection