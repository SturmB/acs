<!doctype html>
<html lang="en">
    <head>
        @include('partials.page_head')
    </head>
    <body>

        @include('layouts.layout_main')


        @stack('scripts')
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
        <script type="text/javascript" src="{{ asset('vendor/fontawesome-pro-5.0.6/svg-with-js/js/fontawesome-all.min.js') }}"></script>

    </body>
</html>