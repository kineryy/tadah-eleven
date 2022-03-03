@extends('layouts.app')

@section('title')
Catalog
@endsection

@section('meta')
<meta property="og:title" content="{{ config('app.name') }} - Catalog" />
<meta property="og:type" content="website" />
<meta property="og:url" content="{{ url()->current(); }}" />
<meta property="og:image" content="/images/tadaht.png" />
<meta property="og:description" content="{{ config('app.name') }} is meant to be a tight-knit community of people who enjoy an older version of a brickbuilding game. Our community is closed, so you'll have to know somebody already inside to get invited." />
<meta name="theme-color" content="#0000FF">
@endsection

@section('content')
<div class="container-lg">
    <div class="justify-content-center">
        <form method="get">
            <div class="input-group">
                <input class="form-control" type="search" placeholder="Search" name="search" aria-label="Search" value="{{ $search }}">
                <span class="input-group-append"><button class="btn btn-outline-primary" type="submit"><i class="fas fa-search"></i></button></span>
            </div>
        </form>
    </div>
    <div class="card mt-3 mb-3">
        <div class="card-body text-center">
            <a class="btn btn-success" style="display:inline-block;" href="{{ route('catalog.upload') }}"><i class="fas fa-plus" aria-hidden="true"></i> Create</a>
            <div class="dropdown show" style="display:inline-block;">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ $type }}
                </a>
                
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="{{ route('catalog.index', 'hats') }}">Hats</a>
                    <a class="dropdown-item" href="{{ route('catalog.index', 'shirts') }}">Shirts</a>
                    <a class="dropdown-item" href="{{ route('catalog.index', 'pants') }}">Pants</a>
                    <a class="dropdown-item" href="{{ route('catalog.index', 'tshirts') }}">T-Shirts</a>
                    <a class="dropdown-item" href="{{ route('catalog.index', 'faces') }}">Faces</a>
                    <a class="dropdown-item" href="{{ route('catalog.index', 'heads') }}">Heads</a>
                    <a class="dropdown-item" href="{{ route('catalog.index', 'packages') }}">Packages</a>
                    <a class="dropdown-item" href="{{ route('catalog.index', 'images') }}">Images</a>
                </div>
            </div>
        </div>
    </div>

    @if ($items->count() > 0)
        <div class="row mx-auto -mb-2 -m-2">
            @foreach ($items->all() as $item)
                <div class="col-12 col-sm-4 col-md-2 p-2">
                    <div class="card mb-2" style="width: 100%; height: 240px">
                        <a href="/item/{{ $item->id }}" class="card-block stretched-link text-decoration-none text-reset">
                            <img class="card-img-top" style="object-fit: contain;" src="@if ($item->thumbnail_url) {{ $item->thumbnail_url }} @else {{ route('catalog.getthumbnail', $item->id) }} @endif" width="100" height="150" alt="{{ $item->name }} thumbnail">
                            <div class="card-body p-1 ml-2" style="display: block;">
                                <div class="mt-1 text-truncate" style="">{{ $item->name }}</div>
                                <div class="text-muted mt-1 mb-1"><small>Price: <img src="/images/currency.png" width="20" height="20">{{ $item->price }}<br>Creator: <a href="/users/{{ $item->user->id }}/profile">{{ $item->user->username }}</a></small></div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="col text-center">
            <h2>Nothing found</h2>
            <p>Looks like there are no items to display for this query.</p>
        </div>
    @endif
    <div class="d-flex justify-content-center">
        {{ $items->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection
