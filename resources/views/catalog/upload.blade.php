@extends('layouts.app')

@section('title')
Upload Item
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Upload Item') }}</div>

                <div class="card-body">
                    @if (config('app.item_creation_enabled'))
                        <form method="POST" action="{{ route('catalog.processupload') }}" enctype="multipart/form-data">
                            @csrf

                            @if (session()->has('error'))
                                <div class="alert alert-danger">
                                    {{ session()->get('error') }}
                                </div>
                            @endif

                            <p class="text-center"><i class="text-primary fas fa-info-circle"></i> Uploading an asset costs <strong>{{ config('app.asset_upload_cost') }} {{ config('app.currency_name_multiple') }}.</strong></p>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Item Name') }}</label>

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
                                <label for="cost" class="col-md-4 col-form-label text-md-right">{{ __('Item Type') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control" id="type" name="type" required>
                                        <option>T-Shirt</option>
                                        <option>Shirt</option>
                                        <option>Pants</option>
                                        <option>Image</option>
                                        @if (Auth::user()->admin)
                                            <option>Face</option>
                                        @endif
                                    </select>
                                    @error('type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="price" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="asset" class="col-md-4 col-form-label text-md-right">{{ __('Asset') }}</label>

                                <div class="col-md-6">
                                    <input type="file" class="form-control-file" name="asset" required>
                                </div>
                                @error('asset')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Upload') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    @else
                        <h2>Item creation disabled</h2>
                        <p>Sorry, item creation has been disabled. Check back later.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
