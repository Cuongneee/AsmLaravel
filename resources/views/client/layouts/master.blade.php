<!DOCTYPE html>
<html lang="en">

<head>
    <title>Zay Shop eCommerce HTML CSS Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('client.layouts.partials.css')
    <!--
    
TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

-->
</head>

<body>
    <!-- Start Top Nav -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
        @include('client.layouts.partials.top-nav')
    </nav>
    <!-- Close Top Nav -->

    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        @include('client.layouts.partials.header')

    </nav>
    <!-- Close Header -->

    @yield('content')

    <!-- Start Footer -->
    <footer class="bg-dark" id="tempaltemo_footer">
        @include('client.layouts.partials.footer')
    </footer>
    <!-- End Footer -->

    @include('client.layouts.partials.js')
</body>

</html>
