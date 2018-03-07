<div class="row">
    <div class="col">

        <nav class="navbar navbar-expand-lg navbar-light bg-gradient-light rounded">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav nav-fill w-100">

                    <!-- Products Menu -->
                    {!! $productsHtml !!}

                    <!-- Clipart Menu -->
                    {!! $clipartHtml !!}

                    <!-- Information Menu -->
                    <li class='nav-item dropdown'>
                        <a class='nav-link dropdown-toggle' href='#' role='button' data-toggle='dropdown'
                           aria-haspopup='true' aria-expanded='false'>
                            Information
                        </a>
                        <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
                            <a class='dropdown-item' href="orderform.pdf" target="_blank" title="Order Form">Order
                                Form</a>
                            <a class='dropdown-item' href="typefaces.php" target="_self" title="Fonts">Typefaces</a>
                            <a class='dropdown-item' href="general_information.php" target="_self"
                               title="General Information">General Info</a>
                            <a class='dropdown-item' href="about.php" target="_self" title="About Us">About Us</a>
                            <a class='dropdown-item' href="contact.php" target="_self" title="Contact Information">Contact
                                Info</a>
                        </div>
                    </li>

                </ul>

            </div>

        </nav>

    </div> {{--col--}}
</div> {{--row--}}
