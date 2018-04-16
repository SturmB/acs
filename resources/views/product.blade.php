@extends('layouts.app')


@section('content')

    <div id="product-content">

        <div class="row">
            <div class="col">
                <div id="title">
                    <h1 class="accented">{{ $productLines->first()->productSubcategory->long_name }}</h1>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 col-lg-3">
                <div id="fo-column">
                    <div id="features-options">
                        <h2>Features &amp; Options</h2>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

{{--
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
--}}
