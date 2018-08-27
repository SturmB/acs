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
    $methodColor = '#' . $productLine->printMethod->hex;
    ?>

    <div id="product-content" class="p-3">

        <div class="row">
            <div class="col">
                <div id="title" class="text-center text-md-left">
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
                        <h2 style="color: {{ $methodColor }};">{{ $productLine->printMethod->long_name }}</h2>
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

@push('scripts')
    <script type="text/javascript" src="{{ asset('vendor/jquery-infinite-rotator/js/infinite-rotator.js') }}"></script>
    <script type="text/javascript">

        $(function() {

          // Set a .rollover class for _only_ those individual product images that _have_ a "Sample" version.
          $(".thumbnail__image--blank").each(function() {
            $(this)
              .parents(".thumbnail__overlay")
              .addClass("thumbnail__overlay--rollover");
          });

          // Toggle the "Sample" image for the individual product images.
          $(".thumbnail__overlay").hover(function() {
            $(this).find(".thumbnail__image.thumbnail__image--blank").toggle();
            $(this).find(".thumbnail__image.thumbnail__image--sample").toggle();
          });

          // Make `singleton`s centered and a bit wider than normal.
          $(".singleton")
            .parent().removeClass("col-xl-6").addClass("col-md-8")
            .parent().addClass("justify-content-center");

        });

    </script>
@endpush
