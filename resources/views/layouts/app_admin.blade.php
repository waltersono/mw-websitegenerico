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
    

        
        @yield('styles')
    </head>
    <body>
        <div class="container">
            @include('partials.alert-danger')
            @include('partials.alert-success')
            @include('partials.alert-warning')
            @include('partials.alert-info')
            @include('partials.errors')
            <div class="row mt-2">
                <div class="col-md-3">
                    @include('partials.sidebar')
                </div>
                <div class="col-md-9">
                    @yield('content')
                </div>
            </div>
        </div>

        <script src="{{ URL::to('src/js/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ URL::to('src/js/bootstrap.min.js') }}"></script>
        <script src="{{ URL::to('src/js/script.js') }}"></script>
        <script src="{{ URL::to('src/js/toastr.min.js') }}"></script>
        <script src="{{ URL::to('src/js/font-awesome.js') }}"></script>
        @yield('scripts')
    </body>
    <br><br>
    <!-- <footer class="footer navbar-fixed-bottom">
        <div class="footer-copyright text-center py-3 text-muted">Copyright © 2020 <strong>NGOMA</strong>
        </div>
    </footer> -->
</html>