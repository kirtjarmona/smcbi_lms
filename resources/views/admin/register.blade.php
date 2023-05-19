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
                        <h4>Registration</h4>
                    </div>
                    <div class="card-body">

                        <form method="POST" action="{{ route('admin.register') }}">
                            @csrf
                            <div class="form-group">
                                <label for="type">Type</label>
                                <select class="form-control" name="type" id="type" required>
                                    <option value="">Select User Type</option>
                                    <option value="student">Student</option>
                                    <option value="teacher">Teacher</option>
                                    <option value="admin">Admin</option>
                                </select>
                                @error('type')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input class="form-control" type="text" name="name" id="name"
                                    value="{{ old('name') }}" required autofocus>
                                @error('name')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class="form-control" type="email" name="email" id="email"
                                    value="{{ old('email') }}" required>
                                @error('email')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input class="form-control" type="password" name="password" id="password" required>
                                @error('password')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input class="form-control" type="password" name="password_confirmation"
                                    id="password_confirmation" required>
                            </div>



                            <button type="submit" class="btn btn-lg btn-success">Register</button>
                        </form>


                    </div>
                </div>
            </div>
            <div class="col-md-4">
            </div>
        </div>
    </div>




@endsection
