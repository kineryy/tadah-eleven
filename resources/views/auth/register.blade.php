@extends('layouts.app')

@section('content')
<div id="Registration">
    <div id="ctl00_cphRoblox_upAccountRegistration">
        <h2>Sign Up and Play</h2>
        <h3>Step 1 of 2: Create Account</h3>
        <div id="EnterAgeGroup">
            <fieldset title="Provide your age-group">
                <legend>Provide your age-group</legend>
                <div class="Suggestion">
                    This will help us to customize your experience.  Users under 13 years will only be shown pre-approved images.
                </div>
                <div class="AgeGroupRow">
                    <span id="ctl00_cphRoblox_rblAgeGroup"><input id="ctl00_cphRoblox_rblAgeGroup_0" type="radio" name="ctl00$cphRoblox$rblAgeGroup" value="1" checked="checked" tabindex="5"><label for="ctl00_cphRoblox_rblAgeGroup_0">Under 13 years</label><br><input id="ctl00_cphRoblox_rblAgeGroup_1" type="radio" name="ctl00$cphRoblox$rblAgeGroup" value="2" onclick="javascript:setTimeout('__doPostBack(\'ctl00$cphRoblox$rblAgeGroup$1\',\'\')', 0)" tabindex="5"><label for="ctl00_cphRoblox_rblAgeGroup_1">13 years or older</label></span>
                </div>
            </fieldset>
        </div>
        <div id="EnterUsername">
            <fieldset title="Choose a name for your ROBLOX character">
                <legend>Choose a name for your ROBLOX character</legend>
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
                    <label for="ctl00_cphRoblox_UserName" id="ctl00_cphRoblox_UserNameLabel" class="Label">Character Name:</label>&nbsp;<input name="ctl00$cphRoblox$UserName" type="text" id="ctl00_cphRoblox_UserName" tabindex="1" class="TextBox">
                </div>
            </fieldset>
        </div>
        <div id="EnterPassword">
            <fieldset title="Choose your ROBLOX password">
                <legend>Choose your ROBLOX password</legend>
                <div class="Suggestion">
                    4-10 characters, no spaces
                </div>
                <div class="Validators">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <div class="PasswordRow">
                    <label for="ctl00_cphRoblox_Password" id="ctl00_cphRoblox_LabelPassword" class="Label">Password:</label>&nbsp;<input name="ctl00$cphRoblox$Password" type="password" id="ctl00_cphRoblox_Password" tabindex="2" class="TextBox">
                </div>
                <div class="ConfirmPasswordRow">
                    <label for="ctl00_cphRoblox_TextBoxPasswordConfirm" id="ctl00_cphRoblox_LabelPasswordConfirm" class="Label">Confirm Password:</label>&nbsp;<input name="ctl00$cphRoblox$TextBoxPasswordConfirm" type="password" id="ctl00_cphRoblox_TextBoxPasswordConfirm" tabindex="3" class="TextBox">
                </div>
            </fieldset>
        </div>
        <div id="EnterChatMode">
            <fieldset title="Choose your chat mode">
                <legend>Choose your chat mode</legend>
                <div class="Suggestion">
                    All in-game chat is subject to profanity filtering and moderation.  For enhanced chat safety, choose SuperSafe Chat; only chat from pre-approved menus will be shown to you.
                </div>
                <div class="ChatModeRow">
                    <span id="ctl00_cphRoblox_rblChatMode"><input id="ctl00_cphRoblox_rblChatMode_0" type="radio" name="ctl00$cphRoblox$rblChatMode" value="false" checked="checked" tabindex="6"><label for="ctl00_cphRoblox_rblChatMode_0">Safe Chat</label><br><input id="ctl00_cphRoblox_rblChatMode_1" type="radio" name="ctl00$cphRoblox$rblChatMode" value="true" tabindex="6"><label for="ctl00_cphRoblox_rblChatMode_1">SuperSafe Chat</label></span>
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
                    <label for="ctl00_cphRoblox_TextBoxEMail" id="ctl00_cphRoblox_LabelEmail" class="Label">Your Parent's Email:</label>&nbsp;<input name="ctl00$cphRoblox$TextBoxEMail" type="text" id="ctl00_cphRoblox_TextBoxEMail" tabindex="4" class="TextBox">
                </div>
            </fieldset>
        </div>
        <div class="Confirm">
            <input type="submit" name="ctl00$cphRoblox$ButtonCreateAccount" value="Register" onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$cphRoblox$ButtonCreateAccount&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, false))" id="ctl00_cphRoblox_ButtonCreateAccount" tabindex="5" class="BigButton">
        </div>
    </div>
</div>
@endsection