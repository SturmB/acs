@extends('layouts.app')


@section('content')

    <?php $showSidebar = $hasFeatures || $hasNotes; ?>

    <div id="product-content">

        <div class="row">
            <div class="col">
                <div id="title">
                    <h1 class="accented">{{ $productLine->productSubcategory->long_name }}</h1>
                </div>
            </div>
        </div>

        <div class="row">
            @if($showSidebar)
            <div class="col-md-4 col-lg-3">
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
        </div>

    </div>

@endsection
