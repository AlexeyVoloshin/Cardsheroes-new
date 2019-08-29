<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>@yield('title')</title>
    <link type="text/css" rel="stylesheet" href="{{asset('/css/app.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('/css/custom.css')}}">

    <script type="text/javascript" href="{{asset('/js/app.js')}}"></script>
</head>
<body>
<header>
    @include('includes.nav')
</header>
@include('editor.part.message')
    <div class="container">
        <div class=" justify-content-center">
            @yield('content')
        </div>
    </div>
</body>
</html>
