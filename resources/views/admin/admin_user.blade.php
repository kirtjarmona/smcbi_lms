@extends('layouts.app')

@section('title', 'Register')

@section('content')
    @include('layouts.nav')
    
    <div class="container text-left">
        <div class="row justify-content-center">

            @include('admin.sidebar_nav')



            <div class="col-md-6">
                <div class="card mt-1">
                    <div class="card-header">
                        <h4>Admins</h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-striped table-dark">
                        <thead>
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Username</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>
                                <a class="btn btn-outline-primary" href="{{ route('admin.admin_users') }}/{{ $user->id }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                </td>

                                <!-- Add other columns as needed -->
                            </tr>
                            @endforeach


                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
            </div>
        </div>
    </div>




@endsection
