@extends('layouts.app')


@section('content')

    <div class="row">
        <div class="col">
            <div id="product-content">
                <div id="title">
                    <h1 class="accented">{{ $productLines->first()->productSubcategory->long_name }}</h1>
                    {{--{!! $buttonsHtml !!}--}}
                    @if ($productLines->first()->print_method_id !== 'unprinted')
                        <print-methods>
                            @foreach($productLines as $productLine)
                                <method-button :product-line="{{ json_encode($productLine) }}" :min-priority={{ $minPriority }}>
                                </method-button>
                            @endforeach
                        </print-methods>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection