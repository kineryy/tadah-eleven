@inject('user', 'App\Http\Controllers\UsersController')

@extends('layouts.app')

@section('title')
Admin
@endsection

@section('content')
<div class="container">
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <h1><b>Admin Panel</b></h1>
    <p class="text-danger">They will repent.</p>
    <hr>
    <ul>
        <li><a class="text-danger" href="/admin/truncategametokens">Clear all game tokens</a></li>
        <li><a class="text-danger" href="/admin/truncateservers">Clear all servers</a></li>
        <li><a href="/admin/invitekeys">Manage existing invite keys</a></li>
        <li><a href="/admin/createinvitekey">Create new invite key</a></li>
        <li><a href="/admin/ban">Ban user</a></li>
        <li><a href="/admin/unban">Unban user</a></li>
        <li><a href="/admin/newxmlitem">New XML item</a></li>
    </ul>
</div>
@endsection