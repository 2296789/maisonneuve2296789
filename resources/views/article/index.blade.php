@extends('layouts.app')
@section('title', __('lang.text_articles_list'))
@section('content')

<h1 class="my-5 mb-4">@lang('lang.text_articles_list')</h1>
<div class="row justify-content-center mt-5 mb-5">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">
                    <h5 class="card-title">@lang('lang.text_articles_list')</h5>
                </div>
                
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <th>@lang('lang.text_title')</th>
                            <th>@lang('lang.text_author')</th>
                        </thead>
                        <tbody>
                        @foreach($articles as $article)
                            @if($article)
                            <tr>
                                <td>{{ $article['titre'] }}</td>
                                <td>{{ $article['author'] }}</td>
                                <td><a href="{{ route('article.show', $article['id']) }}" class="btn btn-sm btn-outline-primary">@lang('lang.text_view')</a></td>
                            </tr>
                            @else
                                <li class="text-danger">@lang('text_no_associated_article')</li>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                    {{-- $articles --}} 
                    {{-- $articles->links() --}}
                </div>
            </div>
        </div>
    </div>  

@endsection