<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <!-- Styles -->
        <link href="/css/public_template.css" rel="stylesheet">
        <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.5.1/moment.min.js"></script>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        @yield('head')
    </head>
        
    <header>
    </header> 

    @include('layouts.navbars.admins_navbar')
    @include('layouts.navbars.office_navbar')
    @include('layouts.navbars.member_navbar')
    @include('layouts.navbars.public_navbar')
    
    <body>
        @yield('content')
    </body>

    <footer>
        
    </footer>

</html>