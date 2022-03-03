@extends('layouts.app')

@section('title')
Error
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Error</div>

                <div class="card-body text-center">
                    <h2>403</h2>
                    <h5>Access Denied</h5>
                    <p>Looks like you shouldn't be here...</p>
                    <p><a class="btn btn-outline-primary" href="/" role="button">Main</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
