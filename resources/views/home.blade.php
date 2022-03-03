@extends('layouts.app')

@section('content')
<!-- My Roblox subMenu --> 
<div id="ctl00_ctl00_cphRoblox_subMenu" class="subMenu">
    <ul>
        <li><a class="subMenuItemselected"
            href="{{ route('home') }}">Home</a></li>
        <li><a class=""
            href="#">Places</a></li>
        <li><a class=""
            href="#">Inbox</a></li>
        <li><a class=""
            href="{{ route('users.me') }}">Account</a></li>
        <li><a href="{{ route('users.profile', Auth::user()->id) }}">Profile</a></li>
        <li><a class=""
            href="#">Friends</a></li>
        <li><a class=""
            href="{{ route('users.characterbodycolors') }}">Character</a></li>
        <li><a class=""
            href="#">Stuff</a></li>
        <li><a class=""
            href="#">Groups</a></li>
        <li><a class=""
            href="#">Money</a></li>
        <li><a class=""
            href="#">Advertising</a></li>
        <li><a class=""
            href="#">Ambassadors</a></li>
        <li>
            <!--[if IE 6]>
            <span id="IE6mouseoverfix" onmouseover="$('#IE6Table').css('display', 'block');" onmouseout="$('#IE6Table').css('display', 'none');">
                <![endif]--> 
                <a style="border: none;" class=""
                    href="/My/InviteAFriend.aspx">Share Roblox</a> 
                <ul>
                    <li><a href="/My/Share/PleaseUpgradeMe.aspx">Please Upgrade Me</a></li>
                    <li><a href="/My/InviteAFriend.aspx">Invite A Friend</a></li>
                    <li id="ctl00_ctl00_cphRoblox_ref1"><a href="/My/Share/ReferralLeaderboards.aspx">Referral Leaderboards</a></li>
                </ul>
                <!--[if IE 6]>
                <table id="IE6Table">
                    <tr>
                        <td><a href="/My/Share/PleaseUpgradeMe.aspx">Please Upgrade Me</a></td>
                    </tr>
                    <tr>
                        <td><a href="/My/InviteAFriend.aspx">Invite A Friend</a></td>
                    </tr>
                    <tr id="ctl00_ctl00_cphRoblox_ref3">
                        <td><a href="/My/Share/ReferralLeaderboards.aspx">Referral Leaderboards</a></td>
                    </tr>
                </table>
                <![endif]--> 
                <!--[if IE 6]>
            </span>
            <![endif]--> 
        </li>
    </ul>
</div>
<!-- Stick My Roblox page content in here --> 
<div class="MyRobloxContainer">
    <!-- Left column --> 
    <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_TopFriends" class="Column1a">
        <!-- Profile pic and inbox --> 
        <div class="StandardBoxHeader">
            <span>Hi, {{ Auth::user()->username }}</span>
        </div>
        <div class="StandardBox">
            <center> 
                <a id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_AvatarImage" disabled="disabled" title="{{ Auth::user()->username }}" onclick="return false" style="display:inline-block;height:200px;width:200px;"><img width="200" height="200" src="{{ route('users.thumbnail', Auth::user()->id) }}" border="0" onerror="return Roblox.Controls.Image.OnError(this)" alt="{{ Auth::user()->username }}" /></a> 
            </center>
            <!-- Top banner alerts moved down here --> 
            <div class="ProfileAlertPanel" style=' margin: 15px auto 0px auto; width: 205px;'>
                <div id="ctl00_cphRoblox_rbxUserPane_ctl00_AlertSpacePanel">
                    <div class="AlertSpace">
                        <div class="MessageAlert">
                            <div class="icons message_icon">
                            </div>
                            <a id="ctl00_cphRoblox_rbxUserPane_ctl00_MessageAlertCaptionHyperLink" class="MessageAlertCaption tooltip-left" title="Inbox" href="#">0</a>
                        </div>
                        <div class="FriendsAlert">
                            <div class="icons friends_icon">
                            </div>
                            <a id="ctl00_cphRoblox_rbxUserPane_ctl00_FriendsAlertCaptionHyperLink" class="FriendsAlertCaption tooltip-right" title="Friend Requests" href="#">0</a>
                        </div>
                        <div class="RobuxAlert">
                            <div class="icons robux_icon">
                            </div>
                            <a id="ctl00_cphRoblox_rbxUserPane_ctl00_RobuxAlertCaptionHyperLink" class="RobuxAlertCaption tooltip-left" title="{{ Auth::user()->money }} {{ config('app.currency_name_multiple') }}" href="#">{{ Auth::user()->getReadableMoney() }}</a>
                        </div>
                        <div class="TicketsAlert">
                            <div class="icons tickets_icon">
                            </div>
                            <a id="ctl00_cphRoblox_rbxUserPane_ctl00_TicketsAlertCaptionHyperLink" class="TicketsAlertCaption tooltip-right" title="nope" href="#">0</a>
                        </div>
                    </div>
                </div>
                <br />
            </div>
        </div>
        <br clear="all" />
    </div>
    <!-- Right column --> 
    <div class="Column2a" style="overflow:hidden;">
        <div class="StandardBoxHeader">
            <span>
                Current Status
            </span>
        </div>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_statusUpdateBox" class="StandardBox">
            <b style="font-size:16px;"> 
            Right now I'm: 
            </b><br /> 
            <INPUT type="text" style="VISIBILITY: hidden;POSITION: absolute"> <!-- Enter key submission hack - IE --> 
            <input name="ctl00$ctl00$cphRoblox$cphMyRobloxContent$txtStatusMessage" type="text" id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_txtStatusMessage" style="margin-bottom:5px;width:540px;" maxlength="255" value="" /><br /> 
            <input type="submit" name="ctl00$ctl00$cphRoblox$cphMyRobloxContent$btnUpdateStatus" value="Update Status" id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_btnUpdateStatus" />&nbsp;&nbsp;
            <br /><br /> 
        </div>
        <br clear="all" /> 
        <div class="StandardBoxHeader">
            <span>
                My Feed
            </span>
        </div>
        <div class="StandardBox" id="FeedDisplayRegion" style="font-size: 12px;">
            <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_theFeed_pnlFeed">
                <span id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_theFeed_Loader" style="visibility:hidden;display:none;"></span> 
                <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_theFeed_pnlLoading">
                    <center> 
                        There is no Feed yet. This'll be added later.
                    </center>
                </div>
            </div>
        </div>
    </div>
    <br clear="all" /> 
</div>
@endsection