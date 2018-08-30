<!doctype html>
<html lang="en">
    <head>
        @include('partials.page_head')
    </head>
    <body>

        @include('layouts.layout_main')

        <!-- Custom compiled scripts. -->
        <script type="text/javascript" src="{{ asset('js/manifest.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/vendor.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

        <!-- FontAwesome 5 Pro -->
        {{--<script defer type="text/javascript" src="{{ asset('vendor/fontawesome-pro-5.2.0-web/js/all.js') }}"></script>--}}
        <script defer src="https://pro.fontawesome.com/releases/v5.3.1/js/all.js" integrity="sha384-eAVkiER0fL/ySiqS7dXu8TLpoR8d9KRzIYtG0Tz7pi24qgQIIupp0fn2XA1H90fP" crossorigin="anonymous"></script>
        <!-- FlexiNav -->
        <script type="text/javascript" src="{{ asset('vendor/flexinav/js/jquery.js') }}"></script>
        <script type="text/javascript" src="{{ asset('vendor/flexinav/js/flexinav_plugins.js') }}"></script>
        <script type="text/javascript" src="{{ asset('vendor/flexinav/js/flexinav.min.js') }}"></script>

        <!-- Miscellaneous scripts -->
        @stack('scripts')

    </body>
</html>