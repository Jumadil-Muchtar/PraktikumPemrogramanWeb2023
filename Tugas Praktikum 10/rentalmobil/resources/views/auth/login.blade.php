<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Form</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('assetss/css/style.css') }}">
</head>
<body>

    <div class="main">
        <!-- Sign in Form -->
        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="{{ asset('/assetss/images/signin-image.jpg') }}" alt="signin image"></figure>
                    <a href="{{ route('register') }}" class="signup-image-link">Create an account</a>
                </div>

                <div class="signin-form">
                    <h2 class="form-title">Sign in</h2>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="email" id="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="password"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" id="password" placeholder="Password" required autocomplete="current-password">
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="remember" id="remember" class="agree-term" {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember" class="label-agree-term"><span><span></span></span>Remember me</label>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" class="form-submit" value="Log in">
                        </div>
                    </form>
                    <div class="social-login">
                        <span class="social-label">Or login with</span>
                        <ul class="socials">
                            <li><a href="{{route ('error')}}"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                            <li><a href="{{route ('error')}}"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                            <li><a href="{{route ('error')}}"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('assetss/js/main.js') }}"></script>
</body>
</html>

