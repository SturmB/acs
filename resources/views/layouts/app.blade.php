<!doctype html>
<html lang="en">
    <head>
        @include('partials.page_head')
    </head>
    <body>

        @include('layouts.layout_main')


        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

        <!-- FontAwesome 5 Pro -->
        <script type="text/javascript" src="{{ asset('vendor/fontawesome-pro-5.0.6/svg-with-js/js/fontawesome-all.min.js') }}"></script>

        <!-- FlexiNav -->
        <script type="text/javascript" src="{{ asset('vendor/flexinav/js/jquery.js') }}"></script>
        <script type="text/javascript" src="{{ asset('vendor/flexinav/js/flexinav_plugins.js') }}"></script>
        <script type="text/javascript" src="{{ asset('vendor/flexinav/js/flexinav.min.js') }}"></script>

        <!-- Miscellaneous scripts -->
{{-- Moved to `navbar.blade.php`.
        <script>
            $(function () {
                // Add the 'last' class to the last Subcategory of each Menu Category.
                // This adds a bit of space to the bottom of the Menu Category's flyout.
                $('.dropdown_flyout').children('li:last-child').addClass('last');
            });
        </script>
--}}

        @stack('scripts')

    </body>
</html>