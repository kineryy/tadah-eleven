@extends('layouts.app')

@section('content')
<div class="MyRobloxContainer">
    <div style="clear: both;"></div>
    <div class="Column1a">
        <div class="StandardBoxHeader" id="newLoginHeader" style="width:300px;">
            <span id="ctl00_cphRoblox_LoginHeader2">Login</span>
        </div>
        <div class="StandardBox" id="newLogin" style="height: 100px;width:300px;">
            <div id="ctl00_cphRoblox_LOLOLOLOL">
                <script type="text/javascript" language="javascript">
                    function dologin() {
                        document.getElementById("email").value = document.getElementById("txtEmail").value;
                        document.getElementById("password").value = document.getElementById("txtPassword").value;
                        document.getElementById("LoginForm").submit();
                    }
                </script>
                <div class="AspNet-Login">
                    <table style="margin: 0px auto;">
                        <tbody>
                            <tr>
                                <td colspan="2" style="color: #FF0000">
                                    @error('email')
                                        <span>{{ $message }}</span>
                                    @enderror
                                    @error('password')
                                        <span>{{ $message }}</span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: right;">
                                    Email:
                                </td>
                                <td>
                                    <input id="txtEmail" name="email" type="text" id="email" class="TextBox" style="border: 2px solid #CCCCCC;width:130px;">
                                    &nbsp;
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: right;">
                                    Password:
                                </td>
                                <td style="position:relative;display:block;">
                                    <div style="float:left;width:215px;">
                                        <input id="txtPassword" name="password" type="password" id="password" class="TextBox" style="border: 2px solid #CCCCCC; width:130px;">
                                        &nbsp;
                                    </div>
                                    <div style="position:absolute;top:2px;*top:1px;left:150px;">
                                        <input type="submit" value="Login" onclick="dologin();" id="ctl00_cphRoblox_lRobloxLogin_Login" class="MediumButton">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="padding-bottom:10px;" align="center">
                                    <div style="font-size: 11px;">
                                        <a href="{{ route('password.request') }}">Forgot your password?</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="Column2a">
        <div id="ctl00_cphRoblox_NewUserPanel2">
            <div class="StandardBoxHeader" style="width: 558px;float:right;">
                <span>Create a Free {{ config('app.name') }} Account</span>
            </div>
            <div class="StandardBox" id="newSignupBox" style="width: 558px;float:right;min-height:100px;">
                <p>
                    Creating an account on {{ config('app.name') }} allows you to customize your character, make friends,
                    build places, earn money, and more!
                </p>
                <p>
                    <center>
                        <a class="MediumButton" role="button" href="{{ route('register') }}" style="text-decoration:none;color:black;">Register</a>
                    </center>
                </p>
            </div>
        </div>
    </div>
    <div style="clear: both;"></div>
</div>
<div style="clear: both"></div>
<form id="LoginForm" action = "{{ route('login') }}" method="post">
    @csrf
    <input type="hidden" id="email" name="email" />
    <input type="hidden" id="password" name="password" />
</form>
@endsection