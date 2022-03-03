@extends('layouts.app')

@section('title')
{{ $user->username }}'s Profile
@endsection

@section('meta')
<meta property="og:title" content="{{ $user->username }}'s Profile - Tadah" />
<meta property="og:type" content="website" />
<meta property="og:url" content="{{ url()->current(); }}" />
<meta property="og:image" content="/images/tadaht.png" />
<meta property="og:description" content="" />
<meta name="theme-color" content="#0000FF">
@endsection

@section('content')
<div class="container">
    @if ($user->banned)
        <div class="alert alert-danger" role="alert">
            This user is banned. Reason: {{ $user->ban_reason }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-5 text-center">
            <div class="card">
                <div class="card-header text-white @if ($user->admin) bg-danger @else bg-primary @endif">{{ $user->username }}</div>
                <div class="card-body">
                    @if (Cache::has('last_online' . $user->id))
                        <p class="text-center text-success">[ Online ]</p>
                    @else
                        <p class="text-center text-muted">[ Offline ]</p>
                    @endif
                    <p><img width="250" height="250" class="img-fluid" style="object-fit: contain;" src="{{ route('users.thumbnail', $user->id) }}" alt="{{ $user->username }}"></p>
                    <div class="overflow-auto" style="max-width: 100%; max-height: 125px; text-align: left;">{{ $user->blurb }}</div>
                    <hr>
                    <b>Joined:</b> {{ date('m/d/Y', strtotime($user->joined)) }}
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card">
                <div class="card-header text-center text-white @if ($user->admin) bg-danger @else bg-primary @endif">Servers</div>
                <div class="card-body">
                    @if ($servers->count() > 0 )
                        @foreach ($servers as $server)
                            <div class="card bg-primary text-truncate mt-2">
                                <a class="mt-1 mb-1 ml-2 text-white stretched-link" href="{{ route('servers.server', $server->id) }}"><i class="far fa-eye" aria-hidden="true"></i> {{ $server->name }}</a>
                            </div>
                        @endforeach
                    @else
                        This user has no servers.
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection