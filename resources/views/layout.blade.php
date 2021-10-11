<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="/css/app.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <script src="/js/app.js"></script>
  <link rel="stylesheet" href="../css/style.css">
  <title>@yield('title')</title>
</head>
<body>
  <header>
    @include('auth.header')
  </header>

  <main class="p-3">
    @yield('show')
  </main>

  <footer class="footer bg-dark fixed-bottom p-3">
    @include('auth.footer')  
  </footer>
</body>
</html>