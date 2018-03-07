@extends('layouts.app')


@section('content')

    <div class="row">
        <div class="col jumbotron p-0" id="splash">
            <h1>Your Plane<br>
                Our Product</h1>
            <img src="{{ asset('images/hero-01.jpg') }}" data-rjs="3" alt="Airplane soaring" class="w-100">
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 rounded" id="main-content">

            <div class="col-12 article">
                <h2>Welcome Aboard Special</h2>
                <p>A great way to sample our products at a savings! 250 pieces of each of our 3 most popular products.</p>
                <h4>Here is what you get:</h4>
                <p>250 each of our 8oz Foam Cups, our White Beverage Napkins, and our shatter resistant 10oz FrostFlex Tumblers. Order Another Welcome Aboard Special at the same time for your Office, Boat, Farm, Ranch, or Vacation Home and get 10% off the additional order!</p>
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
                        <p>10oz Frost-Flex Tumblers</p>
                    </div>
                </div>
            </div>

            <div class="col-12 article" id="product-categories">
                <h2>Product Categories:</h2>
                <div class="gallery-wrapper row">
                    <a href="#" class="col-xs-12 col-sm-6 col-md-3 product-cat" id="napkins">
                        <figure>
                            <img class="img-fluid" src="{{ asset('images/product-categories-assets/napkins.png') }}" data-rjs="3" alt="Napkins">
                        </figure>
                        Napkins
                    </a>
                    <a href="#" class="col-xs-12 col-sm-6 col-md-3 product-cat" id="coasters">
                        <figure>
                            <img class="img-fluid" src="{{ asset('images/product-categories-assets/coasters.png') }}" data-rjs="3" alt="Coasters">
                        </figure>
                        Coasters
                    </a>
                    <a href="#" class="col-xs-12 col-sm-6 col-md-3 product-cat" id="stirpiks">
                        <figure>
                            <img class="img-fluid" src="{{ asset('images/product-categories-assets/stirpiks.png') }}" data-rjs="3" alt="Drink Stirrers, Food Piks, &amp; Ice Cream Spoons">
                        </figure>
                        Stirrers &amp; Piks
                    </a>
                    <a href="#" class="col-xs-12 col-sm-6 col-md-3 product-cat" id="plates">
                        <figure>
                            <img class="img-fluid" src="{{ asset('images/product-categories-assets/plates.png') }}" data-rjs="3" alt="Plates">
                        </figure>
                        Plates
                    </a>
                    <a href="#" class="col-xs-12 col-sm-6 col-md-3 product-cat" id="cups">
                        <figure>
                            <img class="img-fluid" src="{{ asset('images/product-categories-assets/cups.png') }}" data-rjs="3" alt="Cups">
                        </figure>
                        Cups
                    </a>
                    <a href="#" class="col-xs-12 col-sm-6 col-md-3 product-cat" id="utensils">
                        <figure>
                            <img class="img-fluid" src="{{ asset('images/product-categories-assets/utensils.png') }}" data-rjs="3" alt="Lids, Straws, &amp; Utensils">
                        </figure>
                        Lids &amp; Utensils
                    </a>
                </div>
            </div>

        </div>
    </div>

@endsection
