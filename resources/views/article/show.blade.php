@extends('layouts.app')
@section('title', __('lang.text_article'))
@section('content')

<h1 class="my-5">@lang('lang.text_article')</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title">{{ $article['titre'] }}</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $article['contenu'] }}</p>
                    <p class="card-text"></p>
                    <ul class="list-unstyled">
                        <li><strong>@lang('lang.text_category'): </strong>{{ $article['category'] }}</li>
                        <li><strong>@lang('lang.text_author') : </strong>{{ $article['author'] }}</li>
                        <li><strong>@lang('lang.text_create_date') : </strong>{{ $article['created_at'] }}</li>
                        <li><strong>@lang('lang.text_edit_date') : </strong>{{ $article['updated_at'] }}</li>
                        <li><strong>@lang('lang.text_shared_document') : </strong>
                            @if ($article['file_path'])
                              <a href="{{ Storage::url('public/uploads/' . $article['file_path']) }}" download="{{ $article['file_path'] }}">{{ $article['file_path'] }}</a>
                              {{--<a href="{{ Storage::url('uploads/' . basename($article['file_path'])) }}" download="{{ basename($article['file_path']) }}">{{ basename($article['file_path']) }}</a>--}}  
                            @else
                              {{ __('lang.text_no_shareable_documents') }}
                            @endif
                        </li>
                    </ul>
                </div>

                <div class="card-footer d-flex justify-content-between">
                @auth
                    <a href="{{ route('article.pdf', $article['id'], $article['user_id']) }}" class="btn btn-sm btn-outline-info">
                      @lang('lang.text_telecharger_en_PDF')
                    </a>
                    @if($user_id == $article['user_id'])
                      <a href="{{ route('article.edit', $article['id'], $article['user_id']) }}" class="btn btn-sm btn-outline-success">
                        @lang('lang.text_edit')
                      </a>
                      <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                        @lang('lang.text_delete')
                      </button>
                    @endif
                @endauth
                </div>
            </div>
        </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-danger " id="deleteModalLabel">@lang('lang.text_delete')</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @lang('lang.text_are_you_sure_to_delete_the_article') : {{ $article['titre'] }} ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">@lang('lang.text_cancel')</button>
        <form method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-sm btn-danger">@lang('lang.text_delete')</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection