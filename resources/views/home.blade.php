@extends('layouts.app')


@section('content')

    <div class="row">
        <div class="col">
            <div class="jumbotron p-0" id="splash">
                <h1>Your Plane<br>
                    Our Product</h1>
                <img src="{{ asset('images/hero-01.jpg') }}" data-rjs="3" alt="Airplane soaring" class="w-100">
            </div>
        </div> {{--col--}}
    </div> {{--row--}}

    <div class="row">

        <div class="col-md-8">
            <div class="rounded p-3" id="main-content">

                <div class="col-12 article">
                    <h2>Welcome Aboard Special</h2>
                    <p>A great way to sample our products at a savings! 250 pieces of each of our 3 most popular
                        products.</p>
                    <h4>Here is what you get:</h4>
                    <p>250 each of our 8oz Foam Cups, our White Beverage Napkins, and our shatter resistant 10oz
                        FrostFlex Tumblers. Order Another Welcome Aboard Special at the same time for your Office, Boat,
                        Farm, Ranch, or Vacation Home and get 10% off the additional order!</p>
                    <div class="row">
                        <div class="col was-item"><img src="{{ asset('images/WAS-S8.png') }}" alt="Foam Cup">
                            <h4>250</h4>
                            <p>8oz Foam Cups</p>
                        </div>
                        <div class="col was-item"><img src="{{ asset('images/WAS-N10.png') }}" alt="Beverage Napkin">
                            <h4>250</h4>
                            <p>White Beverage Napkins</p>
                        </div>
                        <div class="col was-item"><img src="{{ asset('images/WAS-P10.png') }}" alt="Frost-Flex Cup">
                            <h4>250</h4>
                            <p>10 oz Frost-Flex Tumblers</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 article" id="product-categories">
                    <h2>Product Categories:</h2>
                    <div class="gallery-wrapper row">

                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <a href="#" class="product-cat" id="napkins">
                                <figure class="figure">
                                    <img class="img-fluid"
                                         src="{{ asset('images/product-categories-assets/napkins.png') }}"
                                         data-rjs="3" alt="Napkins">
                                </figure>
                                Napkins
                            </a>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <a href="#" class="product-cat" id="coasters">
                                <figure class="figure">
                                    <img class="img-fluid"
                                         src="{{ asset('images/product-categories-assets/coasters.png') }}" data-rjs="3"
                                         alt="Coasters">
                                </figure>
                                Coasters
                            </a>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <a href="#" class="product-cat" id="stirpiks">
                                <figure class="figure">
                                    <img class="img-fluid"
                                         src="{{ asset('images/product-categories-assets/stirpiks.png') }}" data-rjs="3"
                                         alt="Drink Stirrers, Food Piks, &amp; Ice Cream Spoons">
                                </figure>
                                Stirrers &amp; Piks
                            </a>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <a href="#" class="product-cat" id="plates">
                                <figure class="figure">
                                    <img class="img-fluid"
                                         src="{{ asset('images/product-categories-assets/plates.png') }}"
                                         data-rjs="3" alt="Plates">
                                </figure>
                                Plates
                            </a>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <a href="#" class="product-cat" id="cups">
                                <figure class="figure">
                                    <img class="img-fluid"
                                         src="{{ asset('images/product-categories-assets/cups.png') }}"
                                         data-rjs="3" alt="Cups">
                                </figure>
                                Cups
                            </a>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <a href="#" class="product-cat" id="utensils">
                                <figure class="figure">
                                    <img class="img-fluid"
                                         src="{{ asset('images/product-categories-assets/utensils.png') }}" data-rjs="3"
                                         alt="Lids, Straws, &amp; Utensils">
                                </figure>
                                Lids &amp; Utensils
                            </a>
                        </div>

                    </div> {{--.gallery-wrapper, .row--}}
                </div> {{--.article, #product-categories--}}

            </div> {{--#main-content--}}
        </div> {{--col--}}

        <div class="col-md-4">
            <div class="rounded p-3" id="sidebar">

                <div class="feature">
                    <h4>Personalization is the Key</h4>
                    <p>
                        As a professional pilot, you know that galley supplies add that &ldquo;Over the Top&rdquo; touch to your flight operations. Whether it is owner-flown or a company plane, your aircraft reflects the image of you and your company. Now it's time to make sure you personalize it, with custom imprinted Cups, Napkins, Plates, &amp; Coasters.<br>
                        <br>
                        Your personalized Drinkware is as easy as:</p>
                    <ol>
                        <li>Pick your aircraft from our vast clipart library.</li>
                        <li>Provide text and/or &ldquo;N&rdquo; number with chosen font.</li>
                        <li>Fill out our <a href="{{ asset('orderform.pdf') }}" title="Order Form" target="_blank">order form<i class="fas fa-download ml-1" aria-hidden="true"></i></a>.
                        </li>
                        <li>Approve your proof provided to you within 1 business day.</li>
                    </ol>
                </div> {{--feature--}}

                <div class="feature">
                    <h4>A Pilot's Guide to Custom Imprinted Drinkware</h4>
                    <p>
                        As a professional pilot or business owner, have you ever tried to track down galley supplies for your airplane? You see them everywhere but no one seems to know where to get them, and when you find a source, it is 2&ndash;3 weeks before your product ships. This company represents the classic &ldquo;saw a need and filled it&rdquo; story. <a href="about.html" title="About Us" target="_self">More on our story&hellip;</a>
                    </p>
                </div> {{--feature--}}

                <div class="feature">
                    <h4>Downloadable 2018 Catalog</h4>
                    <a href="Default.html" target="_blank">
                        <img src="{{ asset('images/catalog-cover-front.jpg') }}" data-rjs="3" alt="Downloadable Catalog" id="cat-cover">
                    </a>
                    <p>
                        Why wait for the mail? Get our digital catalog instantly and be eco-friendly. Browse through our many products to see which ones are right for you. If you can’t decide, call customer service and ask for a free spec sample. We will gladly send you the actual item to see if it fits your cup holders as well as to see if you like the product.<br>
                        <br>
                        Download the catalog to refer to later on your laptop. 15 pages of top of the line customizable drinkware items waiting for your planes picture and &ldquo;N&rdquo; numbers.<br>
                        <br>
                        Created for pilots, by pilots. Happy Flying!
                    </p>
                </div> {{--feature--}}

            </div> {{--#sidebar--}}
        </div> {{--col--}}

    </div> {{--row--}}

@endsection
