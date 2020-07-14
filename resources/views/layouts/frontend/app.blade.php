<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    






    <!-- Required meta tags -->
        
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="{{ asset('assets/frontend') }}/img/favicon.png" type="image/png">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!-- Owl Carousel -->
        <link type="text/css" rel="stylesheet" href="{{ asset('assets/frontend') }}/css/owl.carousel.css" />
        <link type="text/css" rel="stylesheet" href="{{ asset('assets/frontend') }}/css/owl.theme.default.css" />
        <!-- Font Awesome Icon -->
        <link rel="stylesheet" href="{{ asset('assets/frontend') }}/css/font-awesome.min.css">


        <!-- main css -->
        <link rel="stylesheet" href="{{ asset('assets/frontend') }}/css/style.css">

        <!-- toaster css -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        @stack('css')

</head>
<body>




    
    <!--================ Start Header Menu Area =================-->
    @include('layouts.frontend.partial.header')
    <!--================ End Header Menu Area =================-->
    

    <!-- HOME OWL -->
    @yield('slider')
    <!-- /HOME OWL -->
    

                                            <!-- Causes_area -->
    @yield('content')

                                            <!-- /Events Area -->



    <!-- FOOTER -->
    @yield('footer')

    <!-- /FOOTER -->


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('assets/frontend') }}/js/jquery-3.2.1.min.js"></script>
    <script src="{{ asset('assets/frontend') }}/js/popper.js"></script>
    <script src="{{ asset('assets/frontend') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets/frontend') }}/js/owl.carousel.min.js"></script>
    <script src="{{ asset('assets/frontend') }}/js/main.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    
    {!! Toastr::message() !!}
    <script>
    @if($errors->any())
        @foreach($errors->all() as $error)
              toastr.error('{{ $error }}','Error',{
                  closeButton:true,
                  progressBar:true,
               });
        @endforeach
    @endif
    </script>
    @stack('js')

</body>
</html>
