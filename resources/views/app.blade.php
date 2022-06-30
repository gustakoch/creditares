<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title') | Creditares</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <style>
            body {
                font-family: 'Nunito', sans-serif !important;
            }
        </style>
    </head>
    <body>
        <nav class="navbar bg-success">
            <div class="container-fluid">
              <span class="navbar-brand mb-0 h1 text-light">Creditares Dev Code Test</span>
            </div>
        </nav>

        <div class="container mt-4">
            @yield('content')
        </div>
    </body>
</html>
