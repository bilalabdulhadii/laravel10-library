<!DOCTYPE html>
<html>

<head>
    <!-- Site icon -->
    <link rel="icon" type="image/x-icon" href="@yield('icon')"/>
    <!-- Basic -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <!-- Site Metas -->
    <meta name="keywords" content="@yield('keywords')"/>
    <meta name="description" content="@yield('description')"/>
    <meta name="author" content="@yield('author')"/>

    <title>@yield('title')</title>

    <!-- slider stylesheet -->
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css"/>
    <!-- font wesome stylesheet -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.css')}}"/>
    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet"/>
    <!-- responsive style -->
    <link href="{{asset('assets/css/responsive.css')}}" rel="stylesheet"/>
    <script src="https://kit.fontawesome.com/250ad262b5.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @yield('head')
</head>

<body class="@yield('body-class')">

@yield('header')

@yield('content')

@include('front.message')

@yield('footer')

</body>
</html>
