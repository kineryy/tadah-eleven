@extends('layouts.app')

@section('content')
<style>
    /* override 2 column layout classes for this page only because the front page requires a wider right column */
    .Column1c
    {
    font-family: Verdana;
    width: 570px;
    float: left;
    }
    .Column2c
    {
    font-family: Verdana;
    width: 310px;
    float: right;
    }
    .Column1c .ShadowedStandardBox
    {
    width:561px;
    }
    .Column1c .ShadowedStandardBoxHeader
    {
    width:551px;
    }
    .Column2c .ShadowedStandardBox
    {
    width:310px;
    }
    .Column2c .ShadowedStandardBoxHeader
    {
    width:300px;
    }
    .DontLogout
    {
    float:right; 
    margin-left:80px;
    }
</style>
<!--[if IE 6]>
<table width="900px">
    <tr>
        <td width="550px" align="left" valign="top">
        <![endif]-->
        <div class="ShadowedStandardBox" style="float: left; margin:13px 0px 0px;">
            <!--div class="Shadow"></div-->
            <!-- <div class="Header">Welcome</div> -->
            <div class="Content" style="min-height: 252px; padding: 8px 8px 8px 8px; ">
                <div>
                    <div style="float: left;">
                    <div id="LoginViewContainer">
                        <script type="text/javascript" language="javascript">
                            function dologin() {
                                document.getElementById("email").value = document.getElementById("txtEmail").value;
                                document.getElementById("password").value = document.getElementById("txtPassword").value;
                                document.getElementById("LoginForm").submit();
                            }
                        </script>
                        <div class="DarkGradientBox" style="height: 215px; text-align: center;">
                            @if (!Auth::user())
                            <div class="DGB_Header">
                                Member Login
                            </div>
                            <div class="DGB_Content">
                                <!-- Enter key submission hack - IE -->
                                <div style="padding-top: 4px; padding-bottom: 4px;">
                                <div style="margin-bottom: 7px;">
                                </div>
                                <label for="txtEmail" class="DGB_Label">
                                Email:</label>
                                <input type="text" style="width: 120px;" class="DGB_TextBox" id="txtEmail"  tabindex="1" />
                                </div>
                                <div style="padding-top: 4px; padding-bottom: 4px;">
                                <div style="margin-bottom: 7px;">
                                </div>
                                <label for="txtPassword" class="DGB_Label">
                                Password:</label>
                                <input type="password" style="width: 120px;" onkeypress="if (event.which || event.keyCode){if ((event.which == 13) || (event.keyCode == 13)) {dologin(); return false;} else {return true;}}"
                                    id="txtPassword" class="DGB_TextBox"  tabindex="2"/>
                                </div>
                                <div style="margin-top: 9px; text-align: center;">
                                <a class="DGB_Button" style="padding: 6px 0px 6px 0px; display: block; width: 110px; margin: 0 auto;" onclick="dologin(); return false;"
                                    href="#" tabindex="3">Login</a>
                                </div>
                                <div id="ctl00_cphRoblox_rbxLoginView_lvLoginView_RegisterDiv" style="margin-bottom: 10px; margin-top: 4px; text-align: center;">
                                <a href="{{ route('register') }}" id="ctl00_cphRoblox_rbxLoginView_lvLoginView_Register" class="DGB_Button" style="padding: 6px 0px 6px 0px; display: block; width: 110px; margin: 0 auto;" tabindex="5" target="_parent">Register</a>
                                </div>
                                <div style="margin-top: 8px; margin-bottom: 7px; text-align: center; white-space: nowrap;">
                                <a href="Parents/Login.aspx" id="ctl00_cphRoblox_rbxLoginView_lvLoginView_ParentLogin" style="color: #FFFFFF; font-weight: bold; font-size: 10px;" tabindex="6" target="_parent">Parent Login</a>
                                </div>
                                <div style="margin-top: 8px; margin-bottom: 7px; text-align: center; white-space: nowrap; display:none">
                                <a href="Login/ResetPasswordRequest.aspx" id="ctl00_cphRoblox_rbxLoginView_lvLoginView_hlPasswordRecovery" style="color: #FFFFFF; font-weight: bold; font-size: 10px;" tabindex="7" target="_parent">
                                Forgot your password?</a>
                                </div>
                            </div>
                            @else
                            <div class="DGB_Header">
                                Logged In
                            </div>
                            <div class="DGB_Content">
                                <a id="ctl00_cphRoblox_rbxLoginView_lvLoginView_LoggedInImage" title="{{ Auth::user()->username }}" href="{{ route('users.me') }}" style="display:inline-block;height:200px;width:150px;cursor:pointer;"><img width="150" height="150" src="{{ route('users.thumbnail', Auth::user()->id) }}" border="0" alt="{{ Auth::user()->name }}" /></a>
                            </div>
                            @endif
                        </div>
                    </div>
                    <style type="text/css">
                        .show { display:inline; }
                        .hide { display: none; }
                        .left {margin-left:150px;}
                    </style>
                    </div>
                    <div style="display:inline; padding: 0px 5px;">
                    <object style="width: 380px; height: 250px;">
                        <param name="movie" value="http://www.youtube.com/v/OBUlpvyInzg&amp;amp;hl=en&amp;amp;fs=1&amp;amp;rel=0&amp;amp;color1=0x3a3a3a&amp;amp;color2=0x999999"/>
                        <param name="allowFullScreen" value="true"/>
                        <param name="allowscriptaccess" value="always"/>
                        <param name="wmode" value="transparent"/>
                        <embed wmode="transparent" src="http://www.youtube.com/v/OBUlpvyInzg&amp;amp;hl=en&amp;amp;fs=1&amp;amp;rel=0&amp;amp;color1=0x3a3a3a&amp;amp;color2=0x999999" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="380" height="250"></embed>
                    </object>
                    </div>
                    <div style="float:right">
                    <div id="FeaturedGameButtonContainer" style="height:1px;" >
                        <img src="/images/buttons/playNow01.png" id="ctl00_cphRoblox_rbxVisitButtons_FeaturedGameButton" class="FeaturedGameButton" alt="Play Roblox" onclick="alert('you are stupid');" />
                    </div>
                    <script type="text/javascript">
                        function redirectPlaceLauncherToLogin() {
                            var baseLoginString = "{{ route('login') }}";
                            doPlaceLauncherRedirect(baseLoginString);
                        }
                        function redirectPlaceLauncherToSignup() {
                            location.href = "{{ route('register') }}";
                        }
                        function doPlaceLauncherRedirect(baseLoginString) {
                            location.href = "{{ route('welcome') }}";
                        }
                        var BCOnlyGroupBuildingModel = {};
                        BCOnlyGroupBuildingModel.open = function() {
                            var modalProperties = { overlayClose: true, escClose: true, opacity: 80, overlayCss: { backgroundColor: "#000"} };
                            $("#BCOnlyGroupBuildingModel").modal(modalProperties);
                        }
                        BCOnlyGroupBuildingModel.close = function() {
                            $.modal.close("#BCOnlyGroupBuildingModel");
                        }
                        $(function() {
                        
                            if (Roblox.Client.isIDE())
                                $('#ctl00_cphRoblox_rbxVisitButtons_EditButton').show();
                        });
                        
                        function loadDelayedImage(imgClass) {
                            var img = $("." + imgClass);
                            for (var i = 0; i < img.length; i++) {
                                if (img[i] != undefined && (img[i].getAttribute("src") == undefined || img[i].getAttribute("src") == ""))
                                    img[i].setAttribute("src", img[i].getAttribute("delaysrc"));
                            }
                        }
                        
                    </script>
                    <div id="GuestModePrompt" class="GuestModePromptModal" style="width:360px; display:none">
                        <div class="simplemodal-close">
                            <a class="ImageButton closeBtnCircle_35h" style="cursor: pointer; margin-left:355px; position:absolute; top:-20px; left:-10px"></a>
                        </div>
                        <div style="height: 275px; background-color: white;">
                            <div style="clear:both; height:25px;"></div>
                            <div id="ctl00_cphRoblox_rbxVisitButtons_PlayAsGuestMPButton_test" onclick="$.modal.close(&#39;.GuestModePromptModal&#39;); GoogleAnalyticsEvents.FireEvent([&#39;Play&#39;, &#39;Guest&#39;, &#39;&#39;]);$(function(){ RobloxEventManager.triggerEvent(&#39;rbx_evt_play_guest&#39;, {age:&#39;Unknown&#39;,gender:&#39;Unknown&#39;});}); if (Roblox.Client.WaitForRoblox(function() { RobloxLaunch.RequestGame(&#39;PlaceLauncherStatusPanel&#39;, 41324860, 1) })) { tryToDownload(); logStatistics(&#39;playasguestmp&#39;); } return false;  ">
                                <a class="ImageButton PlayAsGuest" style="cursor: pointer; margin-left:20px;"></a>
                            </div>
                            <div>
                                <ul class="GuestModePromptText">
                                <li>Customize your Character</li>
                                <li>Earn Tickets</li>
                                <li>Did we mention it's Free?</li>
                                </ul>
                            </div>
                            <div id="ctl00_cphRoblox_rbxVisitButtons_Div6" style="display: inline; margin-left:25px;" onclick="redirectPlaceLauncherToLogin();return false;">
                                <a class="GreenButton"><span>Get A Free Account</span></a>
                            </div>
                            <div>
                                <div style="clear: both; height: 20px;"></div>
                                <b>
                                <h3 style="margin-left: 20px;">Already have an account?</h3>
                                </b>
                                <div style="display: inline; margin-left: 15px;" onclick="redirectPlaceLauncherToLogin();return false;">
                                <a class="GreenButton" style=""><span>Log In</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="GuestModePrompt_BoyGirl" class="GuestModePromptModal"  style="width:380px; display:none">
                        <div class="simplemodal-close">
                            <a class="ImageButton closeBtnCircle_35h" style="cursor: pointer; margin-left:375px; position:absolute; top:-20px; left:-10px"></a>
                        </div>
                        <div style="min-height: 275px; background-color: white;">
                            <div style="clear:both; height:25px;"></div>
                            <div style="text-align: center; font-size: 18px; font-weight: bold; padding-bottom: 10px;">
                                Choose Your Character:
                            </div>
                            <div style="text-align: center;">
                                <div class="VisitButtonsGuestCharacter" style="float:left; margin-left:45px;">
                                <div><img id="ctl00_cphRoblox_rbxVisitButtons_BoyGuestImage" class="GuestPlayAvatarImage" delaysrc="http://t3ak.roblox.com/e38d0ff178c16dc33c82eb6118fc5245" onclick="$.modal.close(&#39;.GuestModePromptModal&#39;); GoogleAnalyticsEvents.FireEvent([&#39;Play&#39;, &#39;Guest&#39;, &#39;&#39;, 1]);$(function(){ RobloxEventManager.triggerEvent(&#39;rbx_evt_play_guest&#39;, {age:&#39;Unknown&#39;,gender:&#39;Male&#39;});}); if (Roblox.Client.WaitForRoblox(function() { RobloxLaunch.RequestGame(&#39;PlaceLauncherStatusPanel&#39;, 41324860, 2) })) { tryToDownload(); logStatistics(&#39;playasguestmp&#39;); } return false;  " /></div>
                                <div><label style="font-weight:bold; font-size:small"  for="BoyGuestImage">Play As Boy</label></div>
                                </div>
                                <div class="VisitButtonsGuestCharacter" style="float:right; margin-right:45px;">
                                <div><img id="ctl00_cphRoblox_rbxVisitButtons_GirlGuestImage" class="GuestPlayAvatarImage" delaysrc="http://t6ak.roblox.com/9762c364d2d68f352a00f89304539001" onclick="$.modal.close(&#39;.GuestModePromptModal&#39;); GoogleAnalyticsEvents.FireEvent([&#39;Play&#39;, &#39;Guest&#39;, &#39;&#39;, 0]);$(function(){ RobloxEventManager.triggerEvent(&#39;rbx_evt_play_guest&#39;, {age:&#39;Unknown&#39;,gender:&#39;Female&#39;});}); if (Roblox.Client.WaitForRoblox(function() { RobloxLaunch.RequestGame(&#39;PlaceLauncherStatusPanel&#39;, 41324860, 3) })) { tryToDownload(); logStatistics(&#39;playasguestmp&#39;); } return false;  " /></div>
                                <div><label style="font-weight:bold; font-size:small"  for="GirlGuestImage">Play As Girl</label></div>
                                </div>
                            </div>
                            <div style="clear:both; height:25px;"></div>
                            <div style="text-align:center; padding: 0 0 15px 18px; cursor:pointer;" onclick="redirectPlaceLauncherToLogin();return false;">
                                <a style="color:green; font-weight:bold; font-size:small">Have an Account?</a>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <!--[if IE 6]>
        </td>
        <td valign="top" align="left">
        <![endif]-->
        <!-- right column -->
        <div class="Column2c">
            <div class="ShadowedStandardBox">
                <div class="Shadow"></div>
                <div class="Header"><span>Not Affiliated with Roblox</span></div>
                <div class="Content" style="padding: 5px 5px 5px 5px; height: 65px">
                    <div style="clear: both; margin-top: 10px;">
                        <div style="margin: 2px 0px; float: left;">{{ config('app.name') }} IS NOT affiliated with Roblox Corporation, K'Nex, The LEGO Group, or MEGA Brands.</div>
                    </div>
                </div>
            </div>
            <div class="ShadowedStandardBox">
                <div class="Shadow"></div>
                <div class="Header"><span>{{ config('app.name') }} Stats</span></div>
                <div class="Content" style="height: 103px;">
                    <div class="Centered">
                    <div id="RandomFactsContainer">
                        <div id="ctl00_cphRoblox_RandomFacts_pRandomFacts">
                            <!-- Print the JavaScript arrays of facts onto the page -->
                            <script>
                                var randomFactsImagePathArray = ['images/RandomFactsIcons/Admin.png', 'images/RandomFactsIcons/House.png', 'images/RandomFactsIcons/Shirt.png', 'images/RandomFactsIcons/House.png', 'images/RandomFactsIcons/Shield.png'];
                                var randomFactsTextArray = [' There are <b>{{ $userCount }} users</b> registered. ', ' <b>{{ $renderQueueCount }} assets</b> are waiting to be rendered. ', ' There is a total of <b>{{ $itemCount }} user-created assets.</b> ', ' There are <b>{{ $totalPosts }}<b> forum posts, with <b>{{ $threadCount }} threads and {{ $postCount }} replies.</b> ', ' Our newest user is <b>{{ $newestUser->username }}!</b> '];
                            </script>
                            <style>
                                .RandomFactContainer
                                {
                                width: 250px;
                                height: 50px;            	
                                margin: 5px 5px 5px 5px;
                                }
                                .RandomFactImageContainer
                                {
                                float: left;
                                width: 32px;
                                height: 32px;
                                }
                                .RandomFactTextContainer
                                {
                                float: right;
                                width: 200px;
                                text-align: center;
                                }
                            </style>
                            <div style="position: relative; width: 100%; height: 100%;">
                                <div id="RandomFactContainer1" class="RandomFactContainer" style="position: absolute; top: 3px;">
                                <div id="RandomFactImageContainer1" class="RandomFactImageContainer">
                                    <img id="RandomFactImage1" src="images/RandomFactsIcons/Admin.png" />
                                </div>
                                <div id="RandomFactTextContainer1" class="RandomFactTextContainer">
                                </div>
                                </div>
                                <div id="RandomFactContainer2" class="RandomFactContainer" style="position: absolute; top: 53px;">
                                <div id="RandomFactImageContainer2" class="RandomFactImageContainer">
                                    <img id="RandomFactImage2" src="images/RandomFactsIcons/Admin.png" />
                                </div>
                                <div id="RandomFactTextContainer2" class="RandomFactTextContainer">
                                </div>
                                </div>
                            </div>
                            <script>
                                var randomFactsUpdateInterval = 200;
                                var randomFactsUpdateCounterMax = 10;
                                var randomFactsStartTime = 0;
                                var randomFactsCurrentState = 0;
                                
                                var currentRandomFactIndex = 0;
                                
                                function getNextRandomFactIndex() {
                                    var nextRandomFactIndex = currentRandomFactIndex;
                                    
                                    currentRandomFactIndex++;
                                    currentRandomFactIndex %= randomFactsTextArray.length;
                                    
                                    return nextRandomFactIndex;
                                }
                                
                                function updateRandomFact(randomFactDivNumber) {
                                    var nextRandomFactIndex = getNextRandomFactIndex();
                                    document.getElementById("RandomFactImage" + randomFactDivNumber).src = randomFactsImagePathArray[nextRandomFactIndex];
                                    document.getElementById("RandomFactTextContainer" + randomFactDivNumber).innerHTML = randomFactsTextArray[nextRandomFactIndex];
                                }
                                
                                function updateRandomFactsControl() {
                                    var currentDate = new Date();
                                    randomFactsTimeElapsed = (currentDate.getTime() - randomFactsStartTime) % 16000;
                                
                                    if ((randomFactsTimeElapsed >= 0 && randomFactsTimeElapsed < 4000) && randomFactsCurrentState != 0) {
                                        
                                        randomFactsCurrentState = 0;
                                    }
                                    else if ((randomFactsTimeElapsed >= 4000 && randomFactsTimeElapsed < 8000) && randomFactsCurrentState != 1) {
                                        //1 out
                                        $("#RandomFactContainer1").fadeOut(2000);
                                
                                        randomFactsCurrentState = 1;
                                    }
                                    else if ((randomFactsTimeElapsed >= 8000 && randomFactsTimeElapsed < 12000) && randomFactsCurrentState != 2) {
                                        //1 in
                                        updateRandomFact("1");
                                        $("#RandomFactContainer1").fadeIn(2000);
                                
                                        //2 out
                                        $("#RandomFactContainer2").fadeOut(2000);
                                
                                        randomFactsCurrentState = 2;
                                    }
                                    else if ((randomFactsTimeElapsed >= 12000 && randomFactsTimeElapsed < 16000) && randomFactsCurrentState != 3) {
                                        //2 in
                                        updateRandomFact("2");
                                        $("#RandomFactContainer2").fadeIn(2000);
                                    
                                        randomFactsCurrentState = 3;
                                    }
                                }
                                
                                $(document).ready(function() {
                                    updateRandomFact("1");
                                    updateRandomFact("2");           
                                    
                                    var currentDate = new Date();
                                    randomFactsStartTime = currentDate.getTime();
                                
                                    setInterval(updateRandomFactsControl, randomFactsUpdateInterval);
                                });
                                
                            </script>  
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="ShadowedStandardBox">
                <div class="Shadow"></div>
                <div class="Header"><span>{{ config('app.name') }} News</span></div>
                <div class="Content" style="*height: 120px;">
                    <div class="Centered" style="width: 280px;">
                    <div id="NewsFeeder" style="width: 100%;">
                        <div id="ctl00_cphRoblox_NewsFeed_pRobloxNews">
                            <div id="RobloxNews" style="float: none; width: 100%; overflow: visible; font-size: 11px;">
                                <div style="margin-bottom: 15px;">
                                @foreach ($announcements as $announcement)
                                <div style="background: url(../images/BulletPointArrow.png) no-repeat center left; padding-left: 13px; margin-bottom: 4px;">
                                    <a id="ctl00_cphRoblox_NewsFeed_dlNews_NewsItemHyperLink" href="{{ route('forum.getthread', $announcement->id) }}">{{ $announcement->title }}</a>
                                </div>
                                @endforeach
                                </div>
                                <div style="text-align: right;">
                                <a id="ctl00_cphRoblox_NewsFeed_PrivacyPolicy" class="Button" href="{{ route('forum.category', 1) }}" style="display:inline-block;width:50px;">More...</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- left column -->
        <div class="Column1c" >
            <div class="ShadowedStandardBox">
                <div class="Shadow"></div>
                <!-- <div class="Header">Games</div> -->
                <div class="Content" style="height: 459px; padding: 0px 0px 0px 0px;">
                    <div style="margin-top: 5px; margin-left: 3px; width: 550px;">
                    <a id="ctl00_cphRoblox_MoneyMachine_PlayNowButton" href="Games.aspx"><img src="images/SalesPitcher/PlayNow3.png" alt="" style="border-width:0px;" /></a>   
                    </div>
                    <div style="margin-left: 7px; margin-top: 20px; width: 541px;">
                    <style>
                        .PlaceStatLabel
                        {
                        /* intentionally empty */
                        }
                        .PlaceStatValue
                        {
                        /* color: #888; */    	
                        margin-left: 15px;
                        font-weight: bold;
                        }
                    </style>
                    <div>
                        <div class="OutlineBox" style="height: 250px;">
                            <div class="OB_HeaderPositioner">
                                <div class="OB_Header">
                                <div style="overflow:hidden; white-space: nowrap;"><span style="font-size: 12px;">Featured Free Game: </span><span id="ctl00_cphRoblox_FeaturedGames_GameName">Placeholder Game</span></div>
                                </div>
                            </div>
                            <div class="OB_Content">
                                <div style="float: left;">
                                <div class="ShadowedStandardBox" style="width: 420px; height: 230px; margin: 0px 8px 0px 5px; ">
                                    <div class="Shadow"></div>
                                    <a id="ctl00_cphRoblox_FeaturedGames_AssetThumbnailImage" disabled="disabled" title="ROBLOX Hiking - a {{ config('app.name') }} free game" href="#" style="display:inline-block;height:230px;width:420px;"><img src="{{ asset('images/placeholdergame.png') }}" border="0" onerror="return Roblox.Controls.Image.OnError(this)" alt="Placeholder Game - a {{ config('app.name') }} free game" /></a>
                                </div>
                                </div>
                                <div style="float: left; font-size:10px; width: 100px; white-space: nowrap; overflow: hidden;">
                                <div style="margin-bottom: 7px;"><a id="ctl00_cphRoblox_FeaturedGames_PlayThis" title="Play this free game!" href="#"><img title="Play this free game!" src="images/PlayThis.png?v=2" alt="" style="border-width:0px;" /></a></div>
                                <div id="LastUpdateLabelDiv" class="PlaceStatLabel">Updated:</div>
                                <div id="LastUpdate" class="PlaceStatValue">Never</div>
                                <div id="FavoritedLabelDiv" class="PlaceStatLabel">Favorited:</div>
                                <div id="Favorited" class="PlaceStatValue">0 times</div>
                                <div id="VisitedPanelLabelDiv" class="PlaceStatLabel">Visited:</div>
                                <div id="ctl00_cphRoblox_FeaturedGames_VisitedPanel" class="Visited PlaceStatValue">0 times</div>
                                <div id="CreatorAvatar" style="margin-top: 7px;white-space:normal" >
                                    <div class="Avatar">
                                        <a id="ctl00_cphRoblox_FeaturedGames_AvatarImage" title="Placeholder" href="#" style="display:inline-block;height:100px;width:100px;cursor:pointer;"><img style="height:100px;width:100px;" src="{{ asset('images/placeholder.png') }}" border="0" onerror="return Roblox.Controls.Image.OnError(this)" alt="Placeholder" /><img src="/images/icons/overlay_tbcOnly.png" align="left" style="position:relative;top:-19px;" /></a>
                                    </div>
                                </div>
                                <div id="CreatorLabelDiv" class="PlaceStatLabel">By: <a id="ctl00_cphRoblox_FeaturedGames_CreatorHyperLink" href="#">Placeholder</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <form id="LoginForm" action = "{{ route('login') }}" method="post">
            @csrf
            <input type="hidden" id="email" name="email" />
            <input type="hidden" id="password" name="password" />
        </form>
        <!-- bottom of page (outside columns) -->
        <!--
            <div style="float:left; margin: 5px 2px 15px 2px;" id="FrontPageBannerAd">
                
                    <div id="ctl00_cphRoblox_HomePageBottomBanner_OutsideAdPanel" class="AdPanel">
            
                    <iframe id="ctl00_cphRoblox_HomePageBottomBanner_AsyncAdIFrame" allowtransparency="true" frameborder="0" scrolling="no" height="90" src="/Ads/IFrameAdContent.aspx?v=2&amp;slot=Roblox_Default_Top_728x90&amp;format=banner&amp;v=2" width="728"></iframe>
                    
            </div>
                    <a id="ctl00_cphRoblox_HomePageBottomBanner_ReportAdButton" title="click to report an offensive ad" class="BadAdButton" href="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$cphRoblox$HomePageBottomBanner$ReportAdButton&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, true))">[ report ]</a>
                    <script type="text/javascript">
                        $(function()
                        {
                            $(".AdPanel").css("z-index", 2);
                        });
                    </script>
                
            
            
            </div>
            -->
        <!--[if IE 6]>
        </td>
    </tr>
</table>
<![endif]-->
<br clear="all" />    
<img src="http://media.fastclick.net/w/tre?ad_id=20713;evt=13114;cat1=14473;cat2=14474" id="ctl00_cphRoblox_fastclick" border="0" height="1" width="1" />
<!-- Begin: AMGDGT Tag -->
<script language="Javascript">    amgdgt_ctr = "3165"; amgdgt_t = "x";</script><script type="text/javascript" src="http://cdn.amgdgt.com/base/js/v1/amgdgt.js"></script>
<noscript><iframe src="http://ad.amgdgt.com/ads/?f=i&t=x&ctr=3165&rnd=[cachebuster]" width="1" height="1" frameborder="0"></iframe></noscript>
<!-- End: AMGDGT Tag -->
<!-- Begin: AMGDGT Tag -->
<script language="Javascript">    amgdgt_ctr = "3164"; amgdgt_t = "x";</script><script type="text/javascript" src="http://cdn.amgdgt.com/base/js/v1/amgdgt.js"></script>
<noscript><iframe src="http://ad.amgdgt.com/ads/?f=i&t=x&ctr=3164&rnd=[cachebuster]" width="1" height="1" frameborder="0"></iframe></noscript>
<!-- End: AMGDGT Tag -->
<!-- Begin: AMGDGT Tag -->
<script language="Javascript">    amgdgt_ctr = "3163"; amgdgt_t = "x";</script><script type="text/javascript" src="http://cdn.amgdgt.com/base/js/v1/amgdgt.js"></script>
<noscript><iframe src="http://ad.amgdgt.com/ads/?f=i&t=x&ctr=3163&rnd=[cachebuster]" width="1" height="1" frameborder="0"></iframe></noscript>
<!-- End: AMGDGT Tag -->
<script type="text/javascript" src="http://adserving.cpxadroit.com/p/100397.js"></script>
@endsection
