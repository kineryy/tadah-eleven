@extends('layouts.app')

@section('title')
Banned
@endsection

@section('content')
<div class="container">
    @if (Auth::user()->banned)
        <h1><b>Banned</b></h1>
        <hr>
        <p>You've been banned from {{ config('app.name') }}.</p>
        <p>Reason: <code>{{ Auth::user()->ban_reason }}</code></p>
        <p>Banned until <b>{{ date('m/d/Y', strtotime(Auth::user()->banned_until)) }}</b>.</p>
        @if (Auth::user()->banned_until->isPast())
            <form method="POST" action="{{ route('users.banned') }}" enctype="multipart/form-data">
                @csrf

                <button class="btn btn-sm btn-primary">Reactivate</button>
            </form>
        @endif
    @else
        <h1>Hey!</h1>
        <p>You're not banned, and you shouldn't be here!</p>
    @endif
</div>
@endsection
