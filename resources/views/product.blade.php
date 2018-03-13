@extends('layouts.app')


@section('content')

    <div class="row">
        <div class="col">
            <div id="product-content">
                <div id="title">
                    <h1 class="accented">{{ $productLines->first()->productSubcategory->long_name }}</h1>
                    {!! $buttonsHtml !!}
                </div>
            </div>
        </div>
    </div>

@endsection