@extends('layouts.app')

@section('content')
<div id="Registration">
    <div id="ctl00_cphRoblox_upAccountRegistration">
    @if (config('app.registration_enabled'))
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <h2>Sign Up and Play</h2>
            <h3>Step 1 of 2: Create Account</h3>
            
            <div id="EnterUsername">
                <fieldset title="Choose a name for your {{ config('app.name') }} character">
                    <legend>Choose a name for your {{ config('app.name') }} character</legend>
                    <div class="Suggestion">
                        Use 3-20 alphanumeric characters: A-Z, a-z, 0-9, no spaces
                    </div>
                    
                    <div class="Validators">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                    
                    <div class="UsernameRow">
                        <label for="username" id="UserNameLabel" class="Label">Character Name:</label>&nbsp;<input id="username" type="text" class="TextBox @error('username') is-invalid @enderror" name="username" placeholder="{{ ('Username') }}" required autocomplete="username" tabindex="1" autofocus>
                        
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </fieldset>
            </div>

            @if (config('app.invite_keys_required'))
                <div id="EnterInviteKey">
                    <fieldset title="{{ config('app.name') }} requires a invite key">
                        <legend>{{ config('app.name') }} requires a invite key</legend>
                        <div class="Suggestion">
                            You have to be invited.
                        </div>
                        
                        <div class="Validators">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        
                        <div class="KeyRow">
                            <label for="invite_key" id="UserNameLabel" class="Label">Invite Key:</label>&nbsp;
                            <input id="invite_key" type="text" class="TextBox @error('invite_key') is-invalid @enderror" name="invite_key" placeholder="{{ ('Invite Key') }}" required tabindex="1">
                            
                            @error('invite_key')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </fieldset>
                </div>
            @endif
            
            <div id="EnterPassword">
                <fieldset title="Choose your {{ config('app.name') }} password">
                    <legend>Choose your {{ config('app.name') }} password</legend>
                    <div class="Suggestion">
                        4-25 characters, no spaces
                    </div>

                    <div class="Validators">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                    
                    <div class="PasswordRow">
                        <label for="password" id="LabelPassword" class="Label">Password:</label>&nbsp;
                        <input id="password" type="password" class="TextBox @error('password') is-invalid @enderror" name="password" placeholder="Password" required tabindex="2">
                    
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="ConfirmPasswordRow">
                        <label for="password-confirm" id="LabelPasswordConfirm" class="Label">Confirm Password:</label>&nbsp;
                        <input id="password-confirm" type="password" class="TextBox" name="password_confirmation" placeholder="Confirm Password" required tabindex="3">
                    </div>
                </fieldset>
            </div>
            
            <div id="EnterEmail">
                <fieldset title="Provide your parent's email address">
                    <legend>Provide your parent's email address</legend>
                    <div class="Suggestion">
                        This will allow you to recover a lost password
                    </div>
                    
                    <div class="Validators">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                    
                    <div class="EmailRow">
                        <label for="email" class="Label" id="LabelEmail">Your Parent's Email:</label>&nbsp;<input id="email" type="email" class="TextBox @error('email') is-invalid @enderror" name="email" placeholder="{{ ('Email') }}" required autocomplete="email" tabindex="4">
                    
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </fieldset>
            </div>
            
            <div class="Confirm">
                <input type="submit" name="ButtonCreateAccount" value="Register" onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$cphRoblox$ButtonCreateAccount&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, false))" id="ButtonCreateAccount" tabindex="5" class="BigButton">
            </div>
        </form>
    @else
        <h2>Registration closed</h2>
        <p>Sorry, we're not taking new users at the moment. Check back in a bit.</p>
    @endif
    </div>
</div>
@endsection
