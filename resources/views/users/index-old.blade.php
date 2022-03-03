@extends('layouts.app')

@section('title')
Users
@endsection

@section('meta')
<meta property="og:title" content="{{ config('app.name') }} - Users" />
<meta property="og:type" content="website" />
<meta property="og:url" content="{{ url()->current(); }}" />
<meta property="og:image" content="/images/tadaht.png" />
<meta property="og:description" content="Take a look at all of the {{ config('app.name') }} community members." />
<meta name="theme-color" content="#0000FF">
@endsection

@section('content')
<div class="container">
    <form method="get">
        <div class="input-group">
            <input class="form-control" type="search" placeholder="Username" name="search" aria-label="Search">
            <span class="input-group-append"><button class="btn btn-outline-primary" type="submit"><i class="fas fa-search"></i></button></span>
        </div>
    </form>

    @if ($users->count() > 0)
        <table class="mt-3 table">
            <thead>
                <th scope="col" style="width: 10%">Character</th>
                <th scope="col" style="width: 10%">Name</th>
                <th scope="col" style="width: 5%">Online</th>
                <th scope="col" style="width: 60%">Blurb</th>
                <th scope="col" style="width: 15%">Last Online</th>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="align-middle"><img class="img-responsive" style="object-fit: contain;" width=50 height=50 src="{{ route('users.thumbnail', $user->id) }}" alt="{{ $user->username }}"></td>
                        <td class="align-middle"><a @if ($user->admin) class="text-danger" @endif href="{{ route('users.profile', $user->id) }}">{{ $user->username }}</a></td>
                        @if (Cache::has('last_online' . $user->id))
                            <td class="align-middle text-success"><small><img src="/images/site/online.png" width="5" height="5" alt="Online"><b> Online</b></small></td>
                        @else
                            <td class="align-middle text-muted"><small><img src="/images/site/offline.png" width="5" height="5" alt="Offline"> Offline</small></td>
                        @endif
                        <td class="align-middle text-truncate" style="max-width: 75ch"><small>{{ $user->blurb }}</small></td>
                        <td class="align-middle text-muted">{{ $user->last_online->diffForHumans() }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="text-center">
            <h2>Nothing found</h2>
            <p>Looks like there are no users to display for this query.</p>
        </div>
    @endif

    <div class="d-flex justify-content-center">
        {{ $users->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection
