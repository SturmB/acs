@extends('layouts.app')


@section('content')

    <div id="general-content" class="p-3">

        <div class="row">
            <div class="col">
                <div id="title" class="text-center">
                    <h1 class="mt-4">Typefaces</h1>
                </div>
            </div>
        </div> {{--Title--}}

        <div class="row typefaces__info m-2 m-md-4">
            @if(count($typefaces) > 0)
                <div class="col-12 typefaces__gallery row">
                    @foreach($typefaces as $typeface)
                        @php
                            $filenameArray = explode('.', $typeface);
                            $filenameUnderscored = array_shift($filenameArray);
                            $filename = str_replace('_', ' ', $filenameUnderscored);
                        @endphp
                        <div class="typefaces__typeface col-12 col-md-6 mb-5">
                            <h5 class="typefaces__name">{{ $filename }}</h5>
                            <img src="{{ asset('images/fonts/' . $typeface) }}" alt="{{ $filename }}">
                        </div>
                    @endforeach
                </div> {{--.typefaces__gallery--}}
            @endif

        </div> {{--.typefaces__info--}}


    </div> {{--#general-content--}}

@endsection
