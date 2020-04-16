<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'PHP TEST')</title>
    <link rel="stylesheet" href="/main.css">
    @yield('head', '')
</head>
<body>
<div class="wrapper">
    <main class="main-content">
        @yield('page-content')
    </main>

    @yield('scripts', '')
</div>
</body>
</html>
