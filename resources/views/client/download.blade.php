@extends('layouts.app')

@section('title')
Download
@endsection

@section('content')
<div class="container">
    <h1 class="text-center mb-0">Download {{ config('app.name') }}</h1>
    <p class="text-center">Download it now to play games with your friends, host servers of your own, or to create classic-styled games.</p>
    <hr>
    <div id="nextSlide" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{ asset('images/site/download/img1.png') }}" alt="Tadah Screenshot">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('images/site/download/img2.png') }}" alt="Tadah Screenshot">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('images/site/download/img3.png') }}" alt="Tadah Screenshot">
            </div>
        </div>
        <a class="carousel-control-prev" href="#nextSlide" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#nextSlide" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="text-center">
        <a class="btn btn-lg btn-success mt-4" style="width: 35%" role="button" href="{{ asset('clientdl/tadah.zip') }}">Download</a>
    </div>
</div>
@endsection
