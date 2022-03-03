@extends('layouts.app')

@section('title')
Rules
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Rules & Privacy</div>
                <div class="card-body">
                    <h1>Rules and Terms</h1>
                    <p class="card-text">The rules here apply to the website, and objects that appear on the website. For example, server names, server descriptions, user-created assets, user-created asset names and descriptions, user biographies, everything like that.</p>
                    <p class="card-text">We offer leniency for content that appears on all users' servers, and things that go on in users' servers. We are not responsible for what occurs within a server, such as chats, nor content that is downloaded and/or displayed from a server. Chat is not logged (and will never be logged by {{ config('app.name') }}).</p>
                    <p class="card-text">Content that is not provided by {{ config('app.name') }} from a third party that is used within servers do not need to follow these rules, <strong>with exceptions being that you may not host any servers that contain any child abuse content or gore.</strong> Anything illegal will be reported to the authorities, and you will be permanently removed from {{ config('app.name') }}.</p>
                    <strong>
                        <ul>
                            <li>No pornographic content uploaded to the website.</li>
                            <li>No content depicting child abuse of any sort. This includes all content within servers.</li>
                            <li>No content that depicts heavy gore. This includes all content within servers.</li>
                            <li>This is a game. Respect everyone.</li>
                            <li>Our moderators have the right to remove anyone at any time for any reason.</li>
                            <li>Server hosts are the sole people responsible for what occurs within their servers, except if there was an exploiter/hacker/cheater present.</li>
                        </ul>
                    </strong>
                    <hr>
                    <h1>Privacy</h1>
                    <p>In the event that there is ever a breach of data, all users will be notified via the website and our community Discord server. We will create a page that tells you the date of the breach and what data was stolen. Below is data that we store in our database that identifies you:</p>
                    <strong>
                        <ul>
                            <li>Your email</li>
                            <li>Your password (hashed, never plain text)</li>
                            <li>Your IP address (register IP address and last used IP address)</li>
                            <li>Invite key used to register</li>
                        </ul>
                    </strong>
                    <p>If you want your data removed from {{ config('app.name') }}, contact us by email.</p>
                    <hr>
                    <h1>Contact Us</h1>
                    <p>You may contact us via our <a href="mailto:tadahcommunity@gmail.com">email</a>.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
