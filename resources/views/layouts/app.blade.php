<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
    <style>
    .background-cover {
        background-image: url({{ asset('images/4907157.jpg') }});
        background-size: cover;
        background-position: center;
        background-repeat: inherit;
    }
    </style>
</head>

<body class="d-flex h-100 text-center text-bg-dark background-cover">
    @if(Session::has('success'))
        <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <div class="alert alert-success fade show" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                $('#successModal').modal('show');
                setTimeout(function() {
                    $('#successModal').modal('hide');
                }, 2000);
            });
        </script>
    @endif


    @auth
        {{-- {{ Auth::user()->email }}
        {{ Auth::user()->type }} --}}
    @else
    @endauth


    <div class="container background-cover">

        @yield('content')
    </div>
</body>

</html>
