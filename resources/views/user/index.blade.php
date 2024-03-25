@extends('layouts.app')
@section('title', 'Users list')
@section('content')

<h1 class="mt-5 mb-4">Users List</h1>
    <div class="row justify-content-center mt-5 mb-5">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">
                    <h5 class="card-title">Users List</h5>
                </div>
                
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <!-- <th>#</th> -->
                            <th>Nom</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <!-- <th>{{ $user->id }}</th> -->
                                <td>
                                    @if($user->edutiant)
                                        {{ $user->edutiant->nom }}
                                    @else
                                        <li class="text-danger">No associated student</li>
                                    @endif
                                </td>
                                <td><a href="" class="btn btn-sm btn-outline-primary">Edit</a></td>
                                <td><a href="" class="btn btn-sm btn-outline-primary">Delete</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $users }}
                    <!-- 增加翻页的按键 -->
                </div>
            </div>

        </div>
    </div>  
@endsection