@extends('layouts.app')
@section('title', 'Categories list')
@section('content')

<h1 class="mt-5 mb-4">Categories List</h1>
    <div class="row justify-content-center mt-5 mb-5">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">
                    <h5 class="card-title">Categories List</h5>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <th>Category</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>
                                {{ $category ? $category->category[app()->getLocale()] ?? $category->category['en'] : '' }}
                                </td>
                                <td><a href="" class="btn btn-sm btn-outline-primary">Edit</a></td>
                                <td><a href="" class="btn btn-sm btn-outline-primary">Delete</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>  
@endsection