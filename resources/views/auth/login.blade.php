@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Animated Login Form</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <img class="wave" src="{{ asset('assets/img/wave.png') }}">
    <div class="container">
        <div class="img">
            <img src="{{ asset('assets/img/logos-tractor.png') }}">
        </div>
        <div class="login-content">
            <form method="POST" action="{{ route('auth.login') }}">
                @csrf {{-- Add CSRF token field --}}

                <img src="{{ asset('assets/img/avatar.svg') }}">
                <h2 class="title">VAT Thunder 1.0</h2>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Username</h5>
                        <input type="text" class="input" name="email" value="{{ old('email') ?? '' }}" required autofocus autocomplete="off">
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i"> 
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Password</h5>
                        <input type="password" class="input" name="password" required>
                    </div>
                </div>
                {{-- <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} autocomplete="off">
                    <label class="form-check-label" for="remember">Remember Me</label>
                </div> --}}
                <input type="submit" class="btn" value="Login">
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </form>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
@endsection
