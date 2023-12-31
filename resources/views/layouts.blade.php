<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="/js/app.js" defer></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <header>
      @include('header')
    </header>
    <br>
    <div class="container">
      @yield('content')
    </div>
    <footer class="footer bg-dark  fixed-bottom">
      @include('footer')
    </footer>
</body>
</html>