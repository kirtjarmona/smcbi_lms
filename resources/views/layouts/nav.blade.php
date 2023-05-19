<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <a class="my-0 mr-md-auto font-weight-normal btn btn-none" href="/"><h3 class="my-0 mr-md-auto font-weight-normal"><i class="fa-solid fa-school"></i> SMCBI</h3></a>

    @auth
        <a class="btn btn-outline-primary" href="{{ url('/dashboard') }}">Dashboard</a>
    @else
        <a class="btn btn-outline-primary" href="{{ route('login') }}">Login</a>
    @endauth

    <nav class="my-2 my-md-0 ml-md-3">
        @auth
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-none" type="submit">Logout</button>
            </form>
        @else
            @if (Route::has('register'))
                <a class="p-2 text-dark" href="{{ route('register') }}">Register</a>
            @endif
        @endauth

    </nav>
{{-- test --}}
</div>
