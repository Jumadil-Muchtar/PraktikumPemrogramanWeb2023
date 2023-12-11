<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>H3nryStore</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <style>
        .search-form {
            width: 100%;
            max-width: 1000px;
        }

        .icon-group {
            border-right: 1px solid white;
            padding-right: 30px;
            margin-right: 10px;
        }

        .icon-group a .bi-heart {
            color: white;
            text-decoration: none;
            margin-right: 10px;
            font-size: 1.5rem;
        }

        .icon-group a .bi-cart2 {
            color: white;
            text-decoration: none;
            margin-right: 10px;
            position: relative;
            top: -2px;
            font-size: 1.7rem;
        }

        .icon-group a:hover .bi-heart {
            color: rgba(225, 18, 18, 0.912);
        }

        .icon-group a:hover .bi-cart2 {
            color: green;
        }

        .button-group {
            margin-left: 30px;
        }

        .button-group a {
            text-decoration: none;
            margin-left: 10px;
            font-size: 1rem;
        }
    </style>

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-info" style="height: 70px">
        <div class="container-fluid">
            <a class="navbar-brand ms-3" href="/">H3nryStore</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="search-form">
                    <form class="d-flex ms-5" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
                <div class="d-flex align-items-center icon-group ms-4">
                    <a href=""><i class="bi bi-heart"></i></a>
                    <a href=""><i class="bi bi-cart2 ms-2"></i></a>
                </div>
                <div class="button-group">
                    @guest
                        <a href="/login" class="btn btn-outline-primary">Login</a>
                        <a href="/register" class="btn btn-outline-light ms-2">Sign Up</a>
                    @else
                        @auth
                        @if (auth()->user()->hasRole('buyer'))
                        <div class="d-flex align-items-center">
                            <a href="/user/profile" class="btn btn-outline-light" style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; font-size: 0.9rem;">{{ Auth::user()->name }}</a>
                            <a href="{{ route('logout') }}" class="btn btn-outline-danger ms-2" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        </div>
                    @endif
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @endauth
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</body>

</html>
