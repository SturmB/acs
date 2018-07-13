<!doctype html>
<html lang="en">
    <head>
        @include('partials.page_head')
    </head>
    <body>

        @include('layouts.layout_main')


        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

        <!-- FontAwesome 5 Pro -->
        <script type="text/javascript" src="{{ asset('vendor/fontawesome-pro-5.1.0-web/js/all.js') }}"></script>

        <!-- FlexiNav -->
        <script type="text/javascript" src="{{ asset('vendor/flexinav/js/jquery.js') }}"></script>
        <script type="text/javascript" src="{{ asset('vendor/flexinav/js/flexinav_plugins.js') }}"></script>
        <script type="text/javascript" src="{{ asset('vendor/flexinav/js/flexinav.min.js') }}"></script>

        <!-- Miscellaneous scripts -->
        @stack('scripts')

    </body>
</html>