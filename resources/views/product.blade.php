@extends('layouts.app')


@section('content')

    <?php $showFeatures = $showNotes = $hasFeatures; ?>

    <div id="product-content">

        <div class="row">
            <div class="col">
                <div id="title">
                    <h1 class="accented">{{ $productLine->productSubcategory->long_name }}</h1>
                </div>
            </div>
        </div>

        <div class="row">
            @if($showFeatures)
            <div class="col-md-4 col-lg-3">
                <div id="fo-column">
                    <div id="features-options">
                        <h2>Features &amp; Options</h2>
                        {!! $featuresHtml !!}
                    </div>
                    <div id="text-notes">
                        {!! $notesHtml !!}
                    </div>
                </div>
            </div>
            @endif
        </div>

    </div>

@endsection
