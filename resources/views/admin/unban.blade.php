@inject('user', 'App\Http\Controllers\UsersController')

@extends('layouts.app')

@section('title')
Ban
@endsection

@section('content')
<div class="container">
    <h1><b>Unban user</b></h1>
    <p>Unban a user from Tadah. Usually used during moderation errors.</p>
    <hr>
    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    @endif
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <form method="POST" action="{{ route('admin.unbanuser') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control" id="username" placeholder="Username">
        </div>
        <button type="submit" class="btn btn-success"><i class="fas fa-user"></i> Unban</button>
    </form>
</div>
@endsection