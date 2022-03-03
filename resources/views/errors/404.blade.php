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
                    <h2>404</h2>
                    <h5>Not Found</h5>
                    <p>Whatever you are looking for isn't here. It might have gotten deleted or never existed in the first place.</p>
                    <p><a class="btn btn-outline-primary" href="/" role="button">Main</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
