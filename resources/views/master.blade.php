<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="/resources/css/bootstrap.css" rel="stylesheet">
    <link href="/resources/css/app.css" rel="stylesheet">
</head>
<body>
<nav>
    <a href="{{route('index')}}">Главная</a>
    <a href="{{route('categories')}}">категории</a>
    <a href="{{route('basket')}}">корзина</a>
</nav>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @if(session()->has('success'))
                    <p class="alert alert-success">{{ session()->get('success') }}</p>
                @endif
                @yield('content')
            </div>
        </div>
    </div>
</section>
</body>
</html>
