<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Latihan Blade Templates</title>
  </head>
  <body>
    @include('templates.header')

      @yield('content')

    @include('templates.footer')
  </body>
</html>
