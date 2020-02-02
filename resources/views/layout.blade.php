<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Menu Quizz</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" crossorigin="anonymous">
</head>

<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Menu Quizz</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('quizz.index') }}">Take a quizz</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Admin
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('groups.index') }}">Manage Groups</a>
                    <a class="dropdown-item" href="{{ route('meal-types.index') }}">Manage Meal Type</a>
                    <a class="dropdown-item" href="{{ route('meals.index') }}">Manage Meal</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

<main role="main" class="container">

    <div id="app">
        @yield('content')
    </div>

</main><!-- /.container -->
</body>
<script src="{{ mix('/js/app.js') }}" crossorigin="anonymous"></script>
</html>
