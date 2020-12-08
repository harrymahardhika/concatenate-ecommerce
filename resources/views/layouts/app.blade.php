<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <title>@yield('title', 'Dashboard') &middot; {{ config('app.name') }}</title>
</head>

<body @guest class="login-bg" @endguest>

@auth @include('layouts.navbar') @endauth

<div class="container-fluid">
  <div class="row">
    @auth @include('layouts.sidebar') @endauth
    @yield('content')
  </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
