<div class="row">
    <div class="col">

        <nav>

            <div id="flexinav1" class="flexinav flexinav_red">
                <div class="flexinav_wrapper">
                    {{--<ul class="navbar-nav nav-fill w-100">--}}
                    <ul class="flexinav_menu">

                        <li class="flexinav_collapse">
                            <span><i class="fas fa-bars"></i>Navigation</span>
                        </li>

                        <!-- Products Menu -->
                    {!! $productsHtml !!}

                    <!-- Clipart Menu -->
                    {!! $clipartHtml !!}

                    <!-- Information Menu -->
                        <li><span>Information</span>
                            <div class="flexinav_ddown flexinav_ddown_fly_out flexinav_ddown_240">
                                <ul class="dropdown_flyout">
                                    <li><a href="orderform.pdf" target="_blank" title="Order Form">Order Form</a></li>
                                    <li><a href="typefaces.php" target="_self" title="Fonts">Typefaces</a></li>
                                    <li><a href="general_information.php" target="_self" title="General Information">General Info</a></li>
                                    <li><a href="about.php" target="_self" title="About Us">About Us</a></li>
                                    <li class="last"><a href="contact.php" target="_self" title="Contact Information">Contact Info</a></li>
                                </ul>
                            </div>
                        </li>

                    </ul>
                </div> {{--.flexinav_wrapper--}}
            </div> {{--.flexinav, .flexinav_red--}}
        </nav>

    </div> {{--col--}}
</div> {{--row--}}

@push('scripts')
    <script>
        $(function ($) {
            $('#flexinav1').flexiNav({
                flexinav_effect: 'flexinav_hover',
                flexinav_show_duration: 300,
                flexinav_hide_duration: 200,
                flexinav_show_delay: 200,
                flexinav_trigger: true,
                flexinav_hide: false,
                flexinav_scrollbars: false,
                flexinav_scrollbars_height: 500,
                flexinav_responsive: true,
            });
        })
    </script>
@endpush
