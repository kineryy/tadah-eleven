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
                    <h2>500</h2>
                    <h5>Internal Server Error</h5>
                    <p>The website had a hard time processing this request. Try again later. If this persists, please contact the owners. They can be reached at <a href="mailto:tadahcommunity@gmail.com">tadahcommunity@gmail.com</a> or on the help section of the forums.</p>
                    <p><a class="btn btn-outline-primary" href="/" role="button">Main</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
