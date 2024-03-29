<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Main Page</title>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                @if (Route::has('login'))
                @auth
                <h1>You are logged In</h1>
                <div>
                    <a href="{{ route('logout') }}" class="btn btn-danger"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> {{ __('Log Out') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                </div>
                @else
                <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                {{-- <a href="{{ route('register') }}" class="btn btn-secondary"> Register</a> --}}
                @endauth
                @endif
            </div>
        </div>
    </div>
</body>

</html>
