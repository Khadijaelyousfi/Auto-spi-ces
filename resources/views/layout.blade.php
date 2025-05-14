<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="{{ asset('logo.jpg') }}">
    <title>Auto pièces Market</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css?family=Raleway:300,400,600');

        body {
            background-color: #808080; /* Fond général */
            font-family: 'Raleway', sans-serif;
            margin: 0;
            font-size: .95rem;
            font-weight: 400;
            line-height: 1.6;
            color: white; /* Texte par défaut en blanc */
        }

        .navbar-custom {
            background-color: #404040; /* Fond de la navbar */
        }

        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link,
        .navbar-custom .btn-link {
            color: white !important;
            font-weight: 600;
        }

        .navbar-custom .nav-link:hover,
        .navbar-custom .btn-link:hover {
            text-decoration: underline;
        }

        .btn-primary {
            background-color: #404040;
            border-color: #404040;
        }

        .btn-primary:hover {
            background-color: #404040;
            border-color: #404040;
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(255,255,255, 0.9)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-custom navbar-laravel">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
            <img src="{{ asset('logo.jpg') }}" alt="Logo" style="height: 40px;" class="mr-2">
            Auto pièces Market
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link" href="{{ route('home') }}"><strong>Accueil</strong></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('products.byCategory') }}">Produits</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('cart.view') }}">Panier</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
        </ul>


            <ul class="navbar-nav ml-auto">
                @auth
                @if(Auth::user()->is_admin)
                    <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Admin</a></li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link" style="display:inline; padding: 0;">Déconnexion</button>
                        </form>
                    </li>
                @endif
                @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Admin</a></li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>

<!-- Scripts nécessaires pour le menu responsive Bootstrap -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>

</body>
</html>
