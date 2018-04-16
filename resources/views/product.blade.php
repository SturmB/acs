@extends('layouts.app')


@section('content')

    <div id="product-content">

        <div class="row">
            <div class="col">
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

        <div class="row">
            <div class="col-md-4 col-lg-3">
                <div id="fo-column">
                    <div id="features-options">
                        <h2>Features &amp; Options</h2>
                        <feature-list id="features-list"
                                      :children="productFeatures"
                        >
                        </feature-list>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@push('scripts')
    <script>
        let store = {
            debug: true,
            state: {
                productLine: {},
                previousId: 0,
            },
            setProductLine (newValue) {
                if (this.debug) console.log('setProductLine triggered with', newValue);
                this.state.productLine = newValue;
            },
            clearProductLine () {
                if (this.debug) console.log('clearProductLine triggered');
                this.state.productLine = {};
            },
        };
    </script>
@endpush