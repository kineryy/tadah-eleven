@extends('layouts.app')

@section('title')
Welcome
@endsection

@section('meta')
<meta property="og:title" content="{{ config('app.name') }} - Welcome" />
<meta property="og:type" content="website" />
<meta property="og:url" content="{{ url()->current(); }}" />
<meta property="og:image" content="/images/tadaht.png" />
<meta property="og:description" content="{{ config('app.name') }} is meant to be a tight-knit community of like-minded people. Our community is closed, so you'll have to know somebody already inside to get invited." />
<meta name="theme-color" content="#0000FF">
@endsection

@section('content')
<div class="container-fluid">
    <div class="text-center">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <h1></h1>
        <p style="text-align: center;"><img class="img-fluid" width="450" height="126" src="{{ asset('images/tadah-hd.png') }}"/></p>
        <h4 style="text-align: center">{{ config('app.quotes')[array_rand(config('app.quotes'))] }}</h4>
        <br>
        <p>{{ config('app.name') }} is meant to be a tight-knit community of like-minded people. Our community is closed, so you'll have to know somebody already inside to get invited.<br>{{ config('app.name') }} is entirely non-profit! The owners of the site make no money from hosting {{ config('app.name') }}.<br><a href="/credits">Check out the people that helped to make Tadah what it is today.</a></p>
    </div>
</div>
@endsection
