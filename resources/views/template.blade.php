{{-- template.blade.php --}}
<html>
    <head>
        <title>Page| </title>
        <link rel="stylesheet" href="/css/app.css">
        <link rel="stylesheet" href="/css/mans.css">

        <link rel="icon" href="/img/demo_icon.gif" type="image/gif" sizes="16x16">
    </head>
    <body>
        @include('partials.header')

        <img src="/img/img.jpg" alt="">

        <div class="container">
            @yield('content')
        </div>

        <div class="sidebar">
            @yield('sidebar')
        </div>

        @include('partials.footer')

        <script src="/js/app.js"></script>

    </body>
</html>
