@extends('layouts.app')

@section('title')
{{ $item->name }}
@endsection

@section('content')
<div class="container-lg">
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $item->type }}</div>
                <div class="card-body text-center">
                    <h2>{{ $item->name }} @if (Auth::user()->id == $item->user->id || Auth::user()->admin) <a class="btn btn-secondary btn-sm" href="{{ route('catalog.configure', $item->id) }}"><i class="fas fa-cog" aria-hidden="true"></i></a>@endif</h2>
                    
                    <p><img src="@if ($item->thumbnail_url) {{ $item->thumbnail_url }} @else {{ route('catalog.getthumbnail', $item->id) }} @endif" style="object-fit: contain;" alt="{{ $item->name }}" width="250" height="250"></p>
                    <hr>
                    <span class="text-muted"><small>Description:</span></small><br><span>{{ $item->description }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">About</div>
                <div class="card-body text-center">
                    <a href="{{ route('users.profile', $item->user->id) }}"><img class="img-responsive" style="object-fit: contain;" src="{{ route('users.thumbnail', $item->user->id) }}" alt="{{ $item->user->username }}" width="100" height="100"></a>
                    <p class="text-muted mt-0 pd-0"><small>Creator: <a href="{{ route('users.profile', $item->user->id) }}">{{ $item->user->username }}</a><br>Sales: {{ $item->sales }}</small></p>
                    <hr>
                    <p class="text-muted"><small>Price: <img src="/images/currency.png" width="20" height="20">{{ $item->price }}</small></p>
                    @if ($item->onsale && $item->approved)
                        @if (!$ownedItem)
                            <form method="POST" action="{{ route('catalog.buy', $item->id) }}">
                                @csrf

                                <button class="btn btn-lg btn-success" style="width: 85%" type="submit">Buy</button>
                            </form>
                        @else
                            <span class="text-muted">You already own this.</span>
                        @endif
                    @else
                    <span class="text-muted">Item not for sale.</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
