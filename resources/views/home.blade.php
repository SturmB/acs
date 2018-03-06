@extends('layouts.app')


@section('content')

    <div class="row">
        <div class="col">
            <div class="jumbotron">
                <h1>Your Plane<br>
                    Our Product</h1>
                <img src="{{ storage_path('images/hero-01.jpg') }}" data-rjs="3" alt="Airplane soaring">
            </div>
        </div>
    </div>

@endsection
