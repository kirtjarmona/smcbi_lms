@extends('layouts.app')

@section('title', 'Register')

@section('content')
    @include('layouts.nav')

    <div class="container text-left ">
        <div class="row justify-content-center">

            @include('admin.sidebar_nav')



            <div class="col-md-6">

                <div class="card mt-1">
                    <div class="card-header">
                        <h4>Edit User: <b>{{ $users->name }}</b> </h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.admin_users') }}/update/{{ $users->id }}">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class="form-control" type="email" name="email" id="email"
                                    value="{{ $users->email }}" required>
                                @error('email')
                                    <div class="alert alert-danger" role="alert">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">New Password</label>
                                <input class="form-control" type="password" name="password" id="password">
                                @error('password')
                                    <div class="alert alert-danger" role="alert">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input class="form-control" type="password" name="password_confirmation"
                                    id="password_confirmation">
                            </div>


                            <div class="form-group">
                                <label for="name">First Name</label>
                                <input class="form-control" type="text" name="first_name" id="name"
                                    value="{{ $users->first_name }}" required autofocus>
                                @error('first_name')
                                    <div class="alert alert-danger" role="alert">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="name">Middle Name</label>
                                <input class="form-control" type="text" name="middle_name" id="name"
                                    value="{{ $users->middle_name }}" required autofocus>
                                @error('middle_name')
                                    <div class="alert alert-danger" role="alert">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Last Name</label>
                                <input class="form-control" type="text" name="last_name" id="name"
                                    value="{{ $users->last_name }}" required autofocus>
                                @error('last_name')
                                    <div class="alert alert-danger" role="alert">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Contact Number</label>
                                <input class="form-control" type="number" name="contact_info" id="name"
                                    value="{{ $users->contact_info }}" required autofocus>
                                @error('contact_info')
                                    <div class="alert alert-danger" role="alert">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </form>
                        <form class="mt-1" action="{{ route('admin.admin_delete', $users->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete user</button>
                        </form>
                    </div>

                    
                </div>
            </div>

            <div class="col-md-4">

            </div>
        </div>
    </div>




@endsection
