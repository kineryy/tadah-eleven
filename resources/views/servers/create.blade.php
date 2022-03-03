@extends('layouts.app')

@section('title')
Create Server
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Server') }}</div>

                <div class="card-body">
                    @if (config('app.server_creation_enabled'))
                        <form method="POST" action="{{ route('servers.create') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Server Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required></textarea>

                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="ipaddress" class="col-md-4 col-form-label text-md-right">{{ __('IP Address') }}</label>

                                <div class="col-md-6">
                                    <input id="ipaddress" type="text" class="form-control @error('ipaddress') is-invalid @enderror" name="ipaddress" required value="{{ Auth::user()->last_ip }}">

                                    @error('ipaddress')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="port" class="col-md-4 col-form-label text-md-right">{{ __('Port') }}</label>

                                <div class="col-md-6">
                                    <input id="port" type="number" class="form-control" name="port" required value="53640">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-plus"></i> Create
                                    </button>
                                </div>
                            </div>
                        </form>
                    @else
                        <h2>Server creation disabled</h2>
                        <p>Sorry, server creation has been disabled. Check back later.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
