@inject('user', 'App\Http\Controllers\UsersController')

@extends('layouts.app')

@section('title')
Invite Keys
@endsection

@section('content')
<div class="container">
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <h1><b>Invite Keys</b></h1>
    <p>All invite keys, depleted or not. Disabling a key turns its uses to zero, it doesn't delete it for archival purposes.</p>
    @if ($invitekeys->count() > 0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Creator</th>
                <th scope="col">Key</th>
                <th scope="col">Uses Remaining</th>
                <th scope="col">Created</th>
                <th scope="col">Updated</th>
                <th scope="col">Disable</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($invitekeys as $invitekey)
                <tr>
                    <th scope="row">{{ $invitekey->id }}</th>
                    <td><a href="/users/{{ $invitekey->user->id }}/profile">{{ $invitekey->user->username }}</a></td>
                    <td><code>{{ $invitekey->token }}</code></td>
                    <td>{{ $invitekey->uses }}</td>
                    <td>{{ date('m/d/Y ', strtotime($invitekey->created_at)) }}</td>
                    <td>{{ date('m/d/Y ', strtotime($invitekey->updated_at)) }}</td>
                    <td>
                        <form method="POST" action="{{ route('admin.disableinvitekey', $invitekey->id) }}">
                            @csrf

                            <button class="btn btn-danger btn-sm"><i class="fas fa-times"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $invitekeys->links('pagination::bootstrap-4') }}
    </div>
    @else
    <hr>
    <h1>No invite keys</h1>
    <p>Well, you obviously can't invite anyone without any invite keys, so <a href="/admin/createinvitekey">go make some.</a></p>
    @endif
</div>
@endsection