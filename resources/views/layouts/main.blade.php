<!-- resources/views/main.blade.php -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Beranda')</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    @yield('styles')
    <style>
      .card-img-hover {
        transition: transform 0.3s ease;
      }
      .card-img-hover:hover {
        transform: scale(1.1);
      }
    </style>
  </head>
  <body>
    @include('layouts/header')

    <main class="container" style="min-height: 100vh">
      @yield('content')
    </main>

    @include('layouts/footer')

    <script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>
