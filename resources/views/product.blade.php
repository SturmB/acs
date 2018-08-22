@extends('layouts.app')


@section('content')

    <?php
    $showSidebar = $hasFeatures || $hasNotes;
    $imageContentClasses = 'col-12';
    $splashImageClass = 'px-3';
    if ($showSidebar) {
        $imageContentClasses = 'col-md-8 col-lg-9';
        $splashImageClass .= ' pl-md-0 pr-md-3';
    }
    ?>

    <div id="product-content" class="p-3">

        <div class="row">
            <div class="col">
                <div id="title">
                    <h1 class="is-accented">{{ $productLine->productSubcategory->long_name }}</h1>
                </div>
            </div>
        </div> {{--Title--}}

        <div class="row">
            <div class="{{ $imageContentClasses }} order-md-last my-3">
                <div id="images-content">
                    <div id="splash-image">
                        <img src='{{ asset("images/product-subcategories-assets/{$productLineText}.png") }}'
                             alt="{{ $productLineText }}" class="img-fluid mx-auto d-block" data-rjs="3">
                    </div>
                </div>
            </div>

            @if($showSidebar)
            <div class="col-md-4 col-lg-3 order-md-first my-3">
                <div id="fo-column">
                    @if($hasFeatures)
                    <div id="features-options">
                        <h2>Features &amp; Options</h2>
                        {!! $featuresHtml !!}
                    </div>
                    @endif
                    @if($hasNotes)
                    <div id="text-notes">
                        {!! $notesHtml !!}
                    </div>
                    @endif
                </div>
            </div>
            @endif
        </div> {{--Features, Options, and Splash Image--}}

        <div id="prices-content" class="row">
            {{--<div class="col">--}}
                {{--<div id="prices-content">--}}
                    {!! $productCards !!}
                {{--</div>--}}
            {{--</div>--}}
        </div> {{--Prices--}}

    </div>

@endsection
