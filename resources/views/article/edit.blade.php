@extends('layouts.app')
@section('title', __('lang.text_edit_article'))
@section('content')

<h1 class="mt-5 mb-4">@lang('lang.text_edit_article')</h1>
<div class="row justify-content-center mt-5 mb-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">@lang('lang.text_edit_article')</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('article.update', $article->id) }}" method="POST"> 
                    @csrf
                    @method('put')
                    {{------Titre------}}
                    <div class="mb-3">
                        <label for="titre_en" class="form-label">@lang('lang.text_title_in_english')</label>
                        <input type="text" class="form-control" id="titre_en" name="titre_en" value="{{ old('titre_en', $article->titre['en'])  }}">
                        @if($errors->has('titre_en'))
                        <div class="text-danger mt-2">
                            {{ $errors->first('titre_en') }}
                        </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="titre_fr" class="form-label">@lang('lang.text_title_in_french')</label>
                        <input type="text" class="form-control" id="titre_fr" name="titre_fr" value="{{ isset($article->titre['fr']) ? $article->titre['fr'] : old('titre_fr') }}">
                        {{--<input type="text" class="form-control" id="titre_fr" name="titre_fr" value="{{ old('titre_fr', $article->titre['fr']) }}">--}}
                        @if($errors->has('titre_fr'))
                        <div class="text-danger mt-2">
                            {{ $errors->first('titre_fr') }}
                        </div>
                        @endif
                    </div>
                    {{------Contenu------}}
                    <div class="mb-3">
                        <label for="contenu_en" class="form-label">@lang('lang.text_content_in_english')</label>
                        <textarea class="form-control" id="contenu_en" name="contenu_en" rows="3">{{ old('contenu_en', $article->contenu['en']) }}</textarea>
                        @if($errors->has('contenu_en'))
                        <div class="text-danger mt-2">
                            {{ $errors->first('contenu_en')}}
                        </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="contenu_fr" class="form-label">@lang('lang.text_content_in_french')</label>
                        {{--<textarea class="form-control" id="contenu_fr" name="contenu_fr" rows="3">{{old('contenu_fr', $article->contenu['fr']) }}</textarea>--}}
                        <textarea class="form-control" id="contenu_fr" name="contenu_fr" rows="3">{{ isset($article->contenu['fr']) ? $article->contenu['fr'] : old('contenu_fr') }}</textarea>
                        @if($errors->has('contenu_fr'))
                        <div class="text-danger mt-2">
                            {{ $errors->first('contenu_fr')}}
                        </div>
                        @endif
                    </div>
                    {{------Category------}}
                    <div class="mb-3">
                    <label for="category_id" class="form-label">@lang('lang.text_category')</label>
                        <select name="category_id" id="category_id" class="form-select">
                            <option value=""></option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $article->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->category[app()->getLocale()] }}
                            </option>
                            @endforeach
                        </select>
                        @if($errors->has('category_id'))
                        <div class="text-danger mt-2">
                            {{ $errors->first('category_id')}}
                        </div>
                        @endif
                    </div>
                    {{------Upload------}}
                    <div class="mb-3">
                        <label for="file" class="form-label">@lang('lang.text_upload')</label>
                        <input type="file" class="form-control" id="file" name="file">
                        @if($errors->has('file'))
                        <div class="text-danger mt-2">
                            {{ $errors->first('file') }}
                        </div>
                        @endif
                    </div>
                    {{------button------}}
                    <input type="hidden" name="user_id" value="{{ $user_id }}">
                    <button type="submit" class="btn btn-primary">@lang('lang.text_save')</button>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection