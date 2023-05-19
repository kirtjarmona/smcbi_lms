@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    @include('layouts.nav')
            <main role="main" class="inner cover mt-5 pt-5">
                <h1 class="cover-heading">Learning Management System</h1>
                <p class="lead">
                {{-- Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eget justo nibh. Integer aliquam nisi in condimentum vulputate. Nullam lobortis vitae neque quis elementum. Curabitur vestibulum arcu eget orci vehicula elementum nec a elit. Donec dignissim tempus consequat. Nunc tristique convallis tellus. Mauris vehicula justo quis ipsum porttitor, at mattis libero tempor. Phasellus varius nulla laoreet, accumsan metus in, hendrerit dui. Praesent sed lorem non metus sagittis dictum ac sit amet mauris. Vestibulum aliquet, arcu dictum tempor suscipit, nunc velit mattis erat, in finibus ex nisl eu sapien. Phasellus in venenatis lacus.</p> --}}
                <p class="lead">
                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn btn-lg btn-secondary" type="submit">Logout <i class="fa-solid fa-power-off"></i></button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-lg btn-secondary">Login <i class="fa-solid fa-right-to-bracket"></i></a>
                @endauth
                
                </p>
            </main>





@endsection
