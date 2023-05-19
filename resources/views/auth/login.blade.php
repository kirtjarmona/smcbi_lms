@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
@include('layouts.nav')
<div class="row justify-content-center text-left">
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-header">
                    <h4>Login</h4>
                </div>
                 <div class="card-body">


                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group">
                                <label for="name">Username</label>
                                <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}" required autofocus>
                                @error('name')
                                    <div class="alert alert-danger" role="alert">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input class="form-control" type="password" name="password" id="password" required>
                                @error('password')
                                    <div class="alert alert-danger" role="alert">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>

                            <div>
                                <input type="checkbox" name="remember" id="remember">
                                <label for="remember">Remember me</label>
                            </div>

                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                    </div>


            </div>
        </div>
 </div>

@endsection