<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
        <title>@yield('title')</title>
        <link rel="stylesheet" type="text/css" href="{{ URL::to('src/css/bootstrap.min.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{ URL::to('src/css/custom.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{ URL::to('src/css/toastr.min.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{ URL::to('src/css/carousel.css')}}"/>
        @yield('scripts')
        @yield('styles')
    </head>
    <body>
        @yield('content')    
        <script src="{{ URL::to('src/js/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ URL::to('src/js/bootstrap.min.js') }}"></script>
        <script src="{{ URL::to('src/js/script.js') }}"></script>
        <script src="{{ URL::to('src/js/toastr.min.js') }}"></script>
        <script src="{{ URL::to('src/js/font-awesome.js') }}"></script>
        <script src="{{ URL::to('src/vendor/anchor.min.js') }}"></script>
        <script src="{{ URL::to('src/vendor/clipboard.min.js') }}"></script>
        <script src="{{ URL::to('src/vendor/holder.min.js') }}"></script>
        <script src="{{ URL::to('src/vendor/jquery-slim.min.js') }}"></script>
        <script src="{{ URL::to('src/vendor/popper.min.js') }}"></script>
    </body>
</html>