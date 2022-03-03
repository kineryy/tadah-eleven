@inject('user', 'App\Http\Controllers\UsersController')

@extends('layouts.app')

@section('title')
Ban
@endsection

@section('content')
<div class="container">
    <h1><b>Ban user</b></h1>
    <p class="text-danger">Ban a user from Tadah, temporarily or forever.</p>
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
    <form method="POST" action="{{ route('admin.banuser') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control" id="username" placeholder="Username">
        </div>
        <div class="form-group">
            <label for="banreason">Ban reason</label>
            <textarea name="banreason" class="form-control" id="banreason" rows="2"></textarea>
        </div>
        <div class="form-group">
            <label for="unbandate">Banned until</label>
            <div class="input-group">
                <input type="text" name="unbandate" class="form-control" id="unbandate" placeholder="yyyy-mm-dd">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-danger"><i class="fas fa-user-slash"></i> Ban</button>
    </form>
</div>
<script>
    $('#unbandate').datepicker({
        format: "yyyy-mm-dd"
    });
</script>
@endsection