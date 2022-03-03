@extends('layouts.app')

@section('title')
Contributors
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Credits</div>
                <div class="card-body">
                    <h1>{{ config('app.name') }} Contributors</h1>
                    <ul>
                        <li><a href="https://twitter.com/kineryy/">kinery</a> - Created Tadah</li>
                        <li>Anonymous - Making our thumbnails possible and giving me tips on the client.</li>
                        <li>Shambler - Ideas guy, helped found Tadah and give me motivation to create.</li>
                        <li><a href="https://twitter.com/b0ilingw4ter/">Carrot</a> - Made the server page less ugly and some more client tips.</li>
                        <li>Anonymous - Cleaning up my code and hacking the GitHub repository, helped properly style the catalog page.</a></li>
                        <li><a href="https://twitter.com/supersizedballs/">spike</a> - Artist, made the Dahllor icon we use today.</li>
                        <li><a href="https://twitter.com/shsh_blob/">kaykayko</a> - existing</li>
                    </ul>
                    <p>Without these people lending out their help Tadah would not be as good as it is today. Thanks, everyone.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
