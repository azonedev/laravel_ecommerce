<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>@yield('title')</title>

    @include('partials.csslink')

</head>

<body>
    
    @include('partials.header')
    @yield('header')
    
    @include('partials.nav')
    @yield('nav')
   
    @yield('main')
 

    @include('partials.footer')
    @yield('footer')


    @include('partials.jslink')
    @yield('script')

</body>

</html>
