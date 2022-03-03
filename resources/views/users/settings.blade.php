@extends('layouts.app')

@section('title')
Settings
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User Settings</div>
                <div class="card-body">
                    @if (session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session()->get('error') }}
                        </div>
                    @endif
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <p>Username: {{ Auth::user()->username }}<br>Email: {{ Auth::user()->email }}</p>
                    <hr>
                    <form method="POST" action="{{ route('users.savesettings') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="blurb">Blurb (max 700 chars)</label>
                            <textarea name="blurb" class="form-control" id="blurb" rows="3">{{ Auth::user()->blurb }}</textarea>

                            @error('blurb')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>

</script>
@endsection