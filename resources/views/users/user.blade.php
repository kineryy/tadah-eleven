@extends('layouts.app')

@section('content')
<!-- My Roblox subMenu; show if user logged in -->
<div id="ctl00_cphRoblox_subMenu" class="subMenu">
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
                    href="/My/InviteAFriend.aspx">Share</a>
                <ul>
                    <li><a href="/My/Share/PleaseUpgradeMe.aspx">Please Upgrade Me</a></li>
                    <li><a href="/My/InviteAFriend.aspx">Invite A Friend</a></li>
                    <li id="ctl00_cphRoblox_ref1"><a href="/My/Share/ReferralLeaderboards.aspx">Referral
                        Leaderboards</a>
                    </li>
                </ul>
                <!--[if IE 6]>
                <table id="IE6Table">
                    <tr>
                        <td><a href="/My/Share/PleaseUpgradeMe.aspx">Please Upgrade Me</a></td>
                    </tr>
                    <tr>
                        <td><a href="/My/InviteAFriend.aspx">Invite A Friend</a></td>
                    </tr>
                    <tr id="ctl00_cphRoblox_ref3">
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
<div class="MyRobloxContainer">
    <div style="width:900px;height:30px;font-family:Verdana, Helvetica, Sans-Serif; clear:both; display:none;">
        <span id="ctl00_cphRoblox_rbxHeaderPane_nameRegion" style="font-size:20px; font-weight:bold;">Hi, {{ Auth::user()->username }}</span>
    </div>
    <div id="ctl00_cphRoblox_rbxHeaderPane_statusBox" class="StandardBox" style="width:876px; font-family: Verdana;font-size: 12px; padding: 8px;">
        <span style="font-size:12px;color: #888;">
        Right now I'm: 
        </span>&nbsp;&nbsp;
        <span id="ctl00_cphRoblox_rbxHeaderPane_statusRegion" style="font-size:14px;"><i>"not yet"</i></span>&nbsp;&nbsp;
        <a href="UserControls/#" id="ctl00_cphRoblox_rbxHeaderPane_updateStatusLink" style="font-size:14px;" onclick="document.getElementById('updateStatusBox').style.display='block';document.getElementById('ctl00_cphRoblox_rbxHeaderPane_updateStatusLink').style.display='none'; return false;">> Update My Status</a>
        <div id="updateStatusBox" style="display:none;">
            <INPUT type="text" style="VISIBILITY: hidden;POSITION: absolute">
            <input name="ctl00$cphRoblox$rbxHeaderPane$txtStatusMessage" type="text" id="ctl00_cphRoblox_rbxHeaderPane_txtStatusMessage" style="margin-bottom:5px;width:560px;" maxlength="254" value="happy!" />&nbsp;&nbsp;
            <input type="submit" name="ctl00$cphRoblox$rbxHeaderPane$btnUpdateStatus" value="Save" onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$cphRoblox$rbxHeaderPane$btnUpdateStatus&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, false))" id="ctl00_cphRoblox_rbxHeaderPane_btnUpdateStatus" />&nbsp<input type="button" value="Cancel" onclick="document.getElementById('updateStatusBox').style.display='none';document.getElementById('ctl00_cphRoblox_rbxHeaderPane_updateStatusLink').style.display='inline';"<br />
        </div>
    </div>
    <div style="clear: both; margin: 0; padding: 0;"></div>
    <!--[if IE 6]>
    <table>
        <tr>
            <td width="450px" valign="top">
                <![endif]-->
                <div class="Column1d">
                    <div class="StandardBoxHeader">
                        <span id="ctl00_cphRoblox_rbxUserPane_lUserRobloxURL">Your Profile</span>
                    </div>
                    <div class="StandardBox" style="position: relative">
                        <div style="width: 100%">
                            <div>
                                <div>
                                    <center>
                                        <div style="margin-bottom: 10px;">
                                            <span style="font-size: 13px;">
                                            <a id="ctl00_cphRoblox_rbxUserPane_hlUserRobloxURL" href="{{ route('users.profile', Auth::user()->id) }}">{{ route('users.profile', Auth::user()->id) }}</a></span><br />
                                            <div id="ctl00_cphRoblox_rbxUserPane_pnlViewPublic" style="font-size: 13px;">
                                                <a href="{{ route('users.profile', Auth::user()->id) }}" id="ctl00_cphRoblox_rbxUserPane_lnkPublicView">(View Public Profile)</a>
                                            </div>
                                        </div>
                                        <a id="ctl00_cphRoblox_rbxUserPane_AvatarImage" disabled="disabled" title="{{ Auth::user()->username }}" onclick="return false" style="display:inline-block;height:200px;width:200px;"><img width="200" height="200" src="{{ route('users.thumbnail', Auth::user()->id) }}" border="0" onerror="return Roblox.Controls.Image.OnError(this)" alt="{{ Auth::user()->username }}" /></a>
                                        <br />
                                        <!-- Eliminate the old myUser -->
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
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="StandardTabWhite">
                        <span>{{ config('app.name') }} Badges</span>
                    </div>
                    <div class="StandardBoxWhite">
                        <table id="ctl00_cphRoblox_rbxUserBadgesPane_dlBadges" cellspacing="0" align="Center" border="0" style="border-collapse:collapse;">
                            <tr>
                                <!--<td>
                                    <div class="Badge">
                                        <div class="BadgeImage"><a id="ctl00_cphRoblox_rbxUserBadgesPane_dlBadges_ctl00_hlHeader" href="Badges.aspx"><img id="ctl00_cphRoblox_rbxUserBadgesPane_dlBadges_ctl00_iBadge" src="images/Badges/CombatInitiation-75x75.png?v=2" alt="This badge is given to any player who has proven his or her combat abilities by accumulating 10 victories in battle. Players who have this badge are not complete newbies and probably know how to handle their weapons." style="height:75px;border-width:0px;" /></a></div>
                                        <div class="BadgeLabel"><a id="ctl00_cphRoblox_rbxUserBadgesPane_dlBadges_ctl00_HyperLink1" href="Badges.aspx">Combat Initiation</a></div>
                                    </div>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>!-->
                                <p>You have no Badges. This feature will come later.</p>
                            </tr>
                        </table>
                    </div>
                    <style>
                        .statsLabel { font-weight:bold; width:200px; text-align:right; padding-right:10px;}
                        .statsValue { font-weight:normal; width:200px; text-align:left;}
                        .statsTable { width:400px; }
                    </style>
                    <div class="StandardTabWhite"><span>Statistics</span></div>
                    <div class="StandardBoxWhite">
                        <table class="statsTable">
                            <tr>
                                <td class="statsLabel">
                                    <acronym title="The number of this user's friends.">Friends</acronym>:
                                </td>
                                <td class="statsValue">
                                    <span id="ctl00_cphRoblox_rbxUserStatisticsPane_lFriendsStatistics">0</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="statsLabel"><acronym title="The number of posts this user has made to the {{ config('app.name') }} forum.">Forum Posts</acronym>:</td>
                                <td class="statsValue"><span id="ctl00_cphRoblox_rbxUserStatisticsPane_lForumPostsStatistics">{{ Auth::user()->threads->count() + Auth::user()->posts->count() }}</span></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!--[if IE 6]>
            </td>
            <td width="450px" valign="top">
                <![endif]-->
                <div class="Column2d" style="overflow: hidden">
                    <div class="StandardBoxHeader">
                        <span>Active Places </span>
                    </div>
                    <div id="UserPlacesPane" class="StandardBox">
                        <div id="ctl00_cphRoblox_rbxUserPlacesPane_pnlUserPlaces">
                            <div id="UserPlaces" style="overflow:visible;">
                                <div id="ctl00_cphRoblox_rbxUserPlacesPane_ShowcasePlacesAccordion">
                                    <input type="hidden" name="ctl00$cphRoblox$rbxUserPlacesPane$ShowcasePlacesAccordion_AccordionExtender_ClientState" id="ctl00_cphRoblox_rbxUserPlacesPane_ShowcasePlacesAccordion_AccordionExtender_ClientState" value="0" />
                                    @foreach ($servers as $server)
                                    <a style="text-decoration: none;" href="{{ route('servers.server', $server->id) }}">
                                        <div class="AccordionHeader">
                                            {{ $server->name }}
                                        </div>
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="margin-top:10px;" class="StandardTabWhite"><span>My Friends (<a href='#'>Edit</a>)</span></div>
                    <div class="StandardBoxWhite">
                        <table id="ctl00_cphRoblox_rbxFriendsPane_dlFriends" cellspacing="0" align="Center" border="0" style="border-collapse:collapse;">
                            <tr>
                                <!--<td>
                                    <div class="Friend">
                                        <div class="Avatar"><a id="ctl00_cphRoblox_rbxFriendsPane_dlFriends_ctl00_hlAvatar" title="builderman" href="/User.aspx?ID=156" style="display:inline-block;height:100px;width:100px;cursor:pointer;"><img src="http://t3bg.roblox.com/525c48a16d539c17460dddd939ab0276" border="0" onerror="return Roblox.Controls.Image.OnError(this)" alt="builderman" /><img src="/images/icons/overlay_bcOnly.png" align="left" style="position:relative;top:-19px;" /></a></div>
                                        <div class="Summary">
                                            <span class="OnlineStatus"><img id="ctl00_cphRoblox_rbxFriendsPane_dlFriends_ctl00_iOnlineStatus" src="images/offline.png" alt="builderman is offline (last seen at 3/5/2011 3:45:18 PM)." style="border-width:0px;" /></span>
                                            <span class="Name"><a id="ctl00_cphRoblox_rbxFriendsPane_dlFriends_ctl00_hlFriend" href="User.aspx?ID=156">builderman</a></span>
                                        </div>
                                    </div>
                                </td>!-->
                                <p>You have no Friends. This feature will come later.</p>
                            </tr>
                        </table>
                    </div>
                    <div style="clear: both; margin-bottom: 10px;"></div>
                    <div style="clear: both"></div>
                </div>
                <!--[if IE 6]>
            </td>
        </tr>
    </table>
    <![endif]-->
    <br clear="all" />
</div>
<div id="UserContainer">
    <div id="UserAssetsPane">
        <div id="ctl00_cphRoblox_rbxUserAssetsPane_upUserAssetsPane">
            <div class="StandardBoxHeader">
                <span>Stuff</span>
            </div>
            <div id="UserAssets" class="StandardBox">
                <div id="AssetsMenu">
                    <div id="ctl00_cphRoblox_rbxUserAssetsPane_AssetCategoryRepeater_ctl00_AssetCategorySelectorPanel" class="AssetsMenuItem">
                        <a id="ctl00_cphRoblox_rbxUserAssetsPane_AssetCategoryRepeater_ctl00_AssetCategorySelector" class="AssetsMenuButton" href="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$cphRoblox$rbxUserAssetsPane$AssetCategoryRepeater$ctl00$AssetCategorySelector&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, true))">Heads</a>
                    </div>
                    <div id="ctl00_cphRoblox_rbxUserAssetsPane_AssetCategoryRepeater_ctl01_AssetCategorySelectorPanel" class="AssetsMenuItem">
                        <a id="ctl00_cphRoblox_rbxUserAssetsPane_AssetCategoryRepeater_ctl01_AssetCategorySelector" class="AssetsMenuButton" href="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$cphRoblox$rbxUserAssetsPane$AssetCategoryRepeater$ctl01$AssetCategorySelector&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, true))">Faces</a>
                    </div>
                    <div id="ctl00_cphRoblox_rbxUserAssetsPane_AssetCategoryRepeater_ctl02_AssetCategorySelectorPanel" class="AssetsMenuItem">
                        <a id="ctl00_cphRoblox_rbxUserAssetsPane_AssetCategoryRepeater_ctl02_AssetCategorySelector" class="AssetsMenuButton" href="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$cphRoblox$rbxUserAssetsPane$AssetCategoryRepeater$ctl02$AssetCategorySelector&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, true))">Gear</a>
                    </div>
                    <div id="ctl00_cphRoblox_rbxUserAssetsPane_AssetCategoryRepeater_ctl03_AssetCategorySelectorPanel" class="AssetsMenuItem_Selected">
                        <a id="ctl00_cphRoblox_rbxUserAssetsPane_AssetCategoryRepeater_ctl03_AssetCategorySelector" class="AssetsMenuButton_Selected" href="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$cphRoblox$rbxUserAssetsPane$AssetCategoryRepeater$ctl03$AssetCategorySelector&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, true))">Hats</a>
                    </div>
                    <div id="ctl00_cphRoblox_rbxUserAssetsPane_AssetCategoryRepeater_ctl04_AssetCategorySelectorPanel" class="AssetsMenuItem">
                        <a id="ctl00_cphRoblox_rbxUserAssetsPane_AssetCategoryRepeater_ctl04_AssetCategorySelector" class="AssetsMenuButton" href="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$cphRoblox$rbxUserAssetsPane$AssetCategoryRepeater$ctl04$AssetCategorySelector&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, true))">T-Shirts</a>
                    </div>
                    <div id="ctl00_cphRoblox_rbxUserAssetsPane_AssetCategoryRepeater_ctl05_AssetCategorySelectorPanel" class="AssetsMenuItem">
                        <a id="ctl00_cphRoblox_rbxUserAssetsPane_AssetCategoryRepeater_ctl05_AssetCategorySelector" class="AssetsMenuButton" href="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$cphRoblox$rbxUserAssetsPane$AssetCategoryRepeater$ctl05$AssetCategorySelector&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, true))">Shirts</a>
                    </div>
                    <div id="ctl00_cphRoblox_rbxUserAssetsPane_AssetCategoryRepeater_ctl06_AssetCategorySelectorPanel" class="AssetsMenuItem">
                        <a id="ctl00_cphRoblox_rbxUserAssetsPane_AssetCategoryRepeater_ctl06_AssetCategorySelector" class="AssetsMenuButton" href="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$cphRoblox$rbxUserAssetsPane$AssetCategoryRepeater$ctl06$AssetCategorySelector&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, true))">Pants</a>
                    </div>
                    <div id="ctl00_cphRoblox_rbxUserAssetsPane_AssetCategoryRepeater_ctl07_AssetCategorySelectorPanel" class="AssetsMenuItem">
                        <a id="ctl00_cphRoblox_rbxUserAssetsPane_AssetCategoryRepeater_ctl07_AssetCategorySelector" class="AssetsMenuButton" href="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$cphRoblox$rbxUserAssetsPane$AssetCategoryRepeater$ctl07$AssetCategorySelector&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, true))">Decals</a>
                    </div>
                    <div id="ctl00_cphRoblox_rbxUserAssetsPane_AssetCategoryRepeater_ctl08_AssetCategorySelectorPanel" class="AssetsMenuItem">
                        <a id="ctl00_cphRoblox_rbxUserAssetsPane_AssetCategoryRepeater_ctl08_AssetCategorySelector" class="AssetsMenuButton" href="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$cphRoblox$rbxUserAssetsPane$AssetCategoryRepeater$ctl08$AssetCategorySelector&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, true))">Models</a>
                    </div>
                    <div id="ctl00_cphRoblox_rbxUserAssetsPane_AssetCategoryRepeater_ctl09_AssetCategorySelectorPanel" class="AssetsMenuItem">
                        <a id="ctl00_cphRoblox_rbxUserAssetsPane_AssetCategoryRepeater_ctl09_AssetCategorySelector" class="AssetsMenuButton" href="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$cphRoblox$rbxUserAssetsPane$AssetCategoryRepeater$ctl09$AssetCategorySelector&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, true))">Places</a>
                    </div>
                    <div id="ctl00_cphRoblox_rbxUserAssetsPane_AssetCategoryRepeater_ctl10_AssetCategorySelectorPanel" class="AssetsMenuItem">
                        <a id="ctl00_cphRoblox_rbxUserAssetsPane_AssetCategoryRepeater_ctl10_AssetCategorySelector" class="AssetsMenuButton" href="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$cphRoblox$rbxUserAssetsPane$AssetCategoryRepeater$ctl10$AssetCategorySelector&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, true))">Badges</a>
                    </div>
                    <div id="ctl00_cphRoblox_rbxUserAssetsPane_AssetCategoryRepeater_ctl11_AssetCategorySelectorPanel" class="AssetsMenuItem">
                        <a id="ctl00_cphRoblox_rbxUserAssetsPane_AssetCategoryRepeater_ctl11_AssetCategorySelector" class="AssetsMenuButton" href="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$cphRoblox$rbxUserAssetsPane$AssetCategoryRepeater$ctl11$AssetCategorySelector&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, true))">Left Arms</a>
                    </div>
                    <div id="ctl00_cphRoblox_rbxUserAssetsPane_AssetCategoryRepeater_ctl12_AssetCategorySelectorPanel" class="AssetsMenuItem">
                        <a id="ctl00_cphRoblox_rbxUserAssetsPane_AssetCategoryRepeater_ctl12_AssetCategorySelector" class="AssetsMenuButton" href="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$cphRoblox$rbxUserAssetsPane$AssetCategoryRepeater$ctl12$AssetCategorySelector&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, true))">Right Arms</a>
                    </div>
                    <div id="ctl00_cphRoblox_rbxUserAssetsPane_AssetCategoryRepeater_ctl13_AssetCategorySelectorPanel" class="AssetsMenuItem">
                        <a id="ctl00_cphRoblox_rbxUserAssetsPane_AssetCategoryRepeater_ctl13_AssetCategorySelector" class="AssetsMenuButton" href="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$cphRoblox$rbxUserAssetsPane$AssetCategoryRepeater$ctl13$AssetCategorySelector&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, true))">Left Legs</a>
                    </div>
                    <div id="ctl00_cphRoblox_rbxUserAssetsPane_AssetCategoryRepeater_ctl14_AssetCategorySelectorPanel" class="AssetsMenuItem">
                        <a id="ctl00_cphRoblox_rbxUserAssetsPane_AssetCategoryRepeater_ctl14_AssetCategorySelector" class="AssetsMenuButton" href="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$cphRoblox$rbxUserAssetsPane$AssetCategoryRepeater$ctl14$AssetCategorySelector&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, true))">Right Legs</a>
                    </div>
                    <div id="ctl00_cphRoblox_rbxUserAssetsPane_AssetCategoryRepeater_ctl15_AssetCategorySelectorPanel" class="AssetsMenuItem">
                        <a id="ctl00_cphRoblox_rbxUserAssetsPane_AssetCategoryRepeater_ctl15_AssetCategorySelector" class="AssetsMenuButton" href="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$cphRoblox$rbxUserAssetsPane$AssetCategoryRepeater$ctl15$AssetCategorySelector&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, true))">Torsos</a>
                    </div>
                    <div id="ctl00_cphRoblox_rbxUserAssetsPane_AssetCategoryRepeater_ctl16_AssetCategorySelectorPanel" class="AssetsMenuItem">
                        <a id="ctl00_cphRoblox_rbxUserAssetsPane_AssetCategoryRepeater_ctl16_AssetCategorySelector" class="AssetsMenuButton" href="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$cphRoblox$rbxUserAssetsPane$AssetCategoryRepeater$ctl16$AssetCategorySelector&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, true))">Packages</a>
                    </div>
                </div>
                <div id="AssetsContent">
                    <div id="ctl00_cphRoblox_rbxUserAssetsPane_HeaderPagerPanel" class="HeaderPager">
                        <a id="ctl00_cphRoblox_rbxUserAssetsPane_CatalogHyperLink" href="Catalog.aspx?m=ForSale&amp;c=8&amp;d=All">Shop</a>&nbsp;&nbsp;&nbsp;
                    </div>
                    <table id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList" cellspacing="0" border="0" style="border-collapse:collapse;">
                        <tr>
                            <td class="Asset" valign="top">
                                <div style="padding: 5px">
                                    <!-- Because of the nature of UpdatePanels, we can't use the control here.  Alternatively, we could
                                        try to do something nifty with register startup scripts. -->
                                    <div class="AssetThumbnail">
                                        <a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl00_AssetThumbnailHyperLink" title="Warmest Winter Cap" href="/Warmest-Winter-Cap-item?id=42847319" style="display:inline-block;height:110px;width:110px;cursor:pointer;"><img src="http://t6bg.roblox.com/61d28f19f2e5d25096a2ec8c2dc61d2d" border="0" onerror="return Roblox.Controls.Image.OnError(this)" alt="Warmest Winter Cap" /></a>
                                    </div>
                                    <div class="AssetDetails">
                                        <div class="AssetName">
                                            <a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl00_AssetNameHyperLink" href="/Warmest-Winter-Cap-item?id=42847319">Warmest Winter Cap</a>
                                        </div>
                                        <div class="AssetCreator">
                                            <span class="Label">Creator:</span> <span class="Detail">
                                            <a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl00_AssetCreatorHyperLink" href="User.aspx?ID=1">ROBLOX</a></span>
                                        </div>
                                        <div class="AssetPrice">
                                            <span class="PriceInTickets">
                                            Tx: 10</span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="Asset" valign="top">
                                <div style="padding: 5px">
                                    <!-- Because of the nature of UpdatePanels, we can't use the control here.  Alternatively, we could
                                        try to do something nifty with register startup scripts. -->
                                    <div class="AssetThumbnail">
                                        <a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl01_AssetThumbnailHyperLink" title="ROBLOX Visor" href="/ROBLOX-Visor-item?id=42900214" style="display:inline-block;height:110px;width:110px;cursor:pointer;"><img src="http://t2bg.roblox.com/ac57e68e6993fa7a58022db9390a3397" border="0" onerror="return Roblox.Controls.Image.OnError(this)" alt="ROBLOX Visor" /></a>
                                    </div>
                                    <div class="AssetDetails">
                                        <div class="AssetName">
                                            <a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl01_AssetNameHyperLink" href="/ROBLOX-Visor-item?id=42900214">ROBLOX Visor</a>
                                        </div>
                                        <div class="AssetCreator">
                                            <span class="Label">Creator:</span> <span class="Detail">
                                            <a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl01_AssetCreatorHyperLink" href="User.aspx?ID=1">ROBLOX</a></span>
                                        </div>
                                        <div class="AssetPrice">
                                            <span class="PriceInTickets">
                                            Tx: 10</span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="Asset" valign="top">
                                <div style="padding: 5px">
                                    <!-- Because of the nature of UpdatePanels, we can't use the control here.  Alternatively, we could
                                        try to do something nifty with register startup scripts. -->
                                    <div class="AssetThumbnail">
                                        <a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl02_AssetThumbnailHyperLink" title="Fancy Sailor" href="/Fancy-Sailor-item?id=45343396" style="display:inline-block;height:110px;width:110px;cursor:pointer;"><img src="http://t4bg.roblox.com/962029e7eec96fd7d379e4708ab1e305" border="0" onerror="return Roblox.Controls.Image.OnError(this)" alt="Fancy Sailor" /></a>
                                    </div>
                                    <div class="AssetDetails">
                                        <div class="AssetName">
                                            <a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl02_AssetNameHyperLink" href="/Fancy-Sailor-item?id=45343396">Fancy Sailor</a>
                                        </div>
                                        <div class="AssetCreator">
                                            <span class="Label">Creator:</span> <span class="Detail">
                                            <a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl02_AssetCreatorHyperLink" href="User.aspx?ID=1">ROBLOX</a></span>
                                        </div>
                                        <div class="AssetPrice">
                                            <span class="PriceInTickets">
                                            Tx: 10</span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                    <div>
                        <div class="StandardTabWhite"><span>Recommendations</span></div>
                        <div class="StandardBoxWhite">
                            <div style="font-size: x-small;">Here are some other Hats that we think you might like.</div>
                            <table id="ctl00_cphRoblox_rbxUserAssetsPane_AssetRec_dlAssets" cellspacing="0" align="Center" border="0" style="height:200px;width:100px;border-collapse:collapse;">
                                <tr>
                                    <td>
                                        <div class="PortraitDiv" style="width: 140px; height: 190px; overflow: hidden;" visible="True">
                                            <div class="AssetThumbnail">
                                                <a id="ctl00_cphRoblox_rbxUserAssetsPane_AssetRec_dlAssets_ctl00_AssetThumbnailHyperLink" title="Queen's Guard Hat" href="/Queens-Guard-Hat-item?id=10628538" style="display:inline-block;height:110px;width:110px;cursor:pointer;"><img src="http://t1bg.roblox.com/860ef282bda47091d8cfb3e2ce6f44e3" border="0" onerror="return Roblox.Controls.Image.OnError(this)" alt="Queen's Guard Hat" /></a>
                                            </div>
                                            <div class="AssetDetails" style="height:90px;">
                                                <div class="AssetName">
                                                    <a id="ctl00_cphRoblox_rbxUserAssetsPane_AssetRec_dlAssets_ctl00_AssetNameHyperLinkPortrait" href="/Queens-Guard-Hat-item?id=10628538">Queen's Guard Hat</a>
                                                </div>
                                                <div class="AssetCreator">
                                                    <span class="Label">Creator:</span> <span class="Detail"><a id="ctl00_cphRoblox_rbxUserAssetsPane_AssetRec_dlAssets_ctl00_CreatorHyperLinkPortrait" href="User.aspx?ID=1">ROBLOX</a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="PortraitDiv" style="width: 140px; height: 190px; overflow: hidden;" visible="True">
                                            <div class="AssetThumbnail">
                                                <a id="ctl00_cphRoblox_rbxUserAssetsPane_AssetRec_dlAssets_ctl01_AssetThumbnailHyperLink" title="Beautiful Hair for Beautiful People" href="/Beautiful-Hair-for-Beautiful-People-item?id=16630147" style="display:inline-block;height:110px;width:110px;cursor:pointer;"><img src="http://t1bg.roblox.com/1efa50b1cbb98fa8476ff0de661c8abc" border="0" onerror="return Roblox.Controls.Image.OnError(this)" alt="Beautiful Hair for Beautiful People" /></a>
                                            </div>
                                            <div class="AssetDetails" style="height:90px;">
                                                <div class="AssetName">
                                                    <a id="ctl00_cphRoblox_rbxUserAssetsPane_AssetRec_dlAssets_ctl01_AssetNameHyperLinkPortrait" href="/Beautiful-Hair-for-Beautiful-People-item?id=16630147">Beautiful Hair for Beautiful People</a>
                                                </div>
                                                <div class="AssetCreator">
                                                    <span class="Label">Creator:</span> <span class="Detail"><a id="ctl00_cphRoblox_rbxUserAssetsPane_AssetRec_dlAssets_ctl01_CreatorHyperLinkPortrait" href="User.aspx?ID=1">ROBLOX</a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="PortraitDiv" style="width: 140px; height: 190px; overflow: hidden;" visible="True">
                                            <div class="AssetThumbnail">
                                                <a id="ctl00_cphRoblox_rbxUserAssetsPane_AssetRec_dlAssets_ctl02_AssetThumbnailHyperLink" title="Chef Hat" href="/Chef-Hat-item?id=1374258" style="display:inline-block;height:110px;width:110px;cursor:pointer;"><img src="http://t1bg.roblox.com/0d639b656b44c4597ac4cec52009cadd" border="0" onerror="return Roblox.Controls.Image.OnError(this)" alt="Chef Hat" /></a>
                                            </div>
                                            <div class="AssetDetails" style="height:90px;">
                                                <div class="AssetName">
                                                    <a id="ctl00_cphRoblox_rbxUserAssetsPane_AssetRec_dlAssets_ctl02_AssetNameHyperLinkPortrait" href="/Chef-Hat-item?id=1374258">Chef Hat</a>
                                                </div>
                                                <div class="AssetCreator">
                                                    <span class="Label">Creator:</span> <span class="Detail"><a id="ctl00_cphRoblox_rbxUserAssetsPane_AssetRec_dlAssets_ctl02_CreatorHyperLinkPortrait" href="User.aspx?ID=1">ROBLOX</a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="PortraitDiv" style="width: 140px; height: 190px; overflow: hidden;" visible="True">
                                            <div class="AssetThumbnail">
                                                <a id="ctl00_cphRoblox_rbxUserAssetsPane_AssetRec_dlAssets_ctl03_AssetThumbnailHyperLink" title="Ninja Mask of Shadows" href="/Ninja-Mask-of-Shadows-item?id=1309911" style="display:inline-block;height:110px;width:110px;cursor:pointer;"><img src="http://t6bg.roblox.com/3a33d8d7510c203168a9cf56860d639e" border="0" onerror="return Roblox.Controls.Image.OnError(this)" alt="Ninja Mask of Shadows" /></a>
                                            </div>
                                            <div class="AssetDetails" style="height:90px;">
                                                <div class="AssetName">
                                                    <a id="ctl00_cphRoblox_rbxUserAssetsPane_AssetRec_dlAssets_ctl03_AssetNameHyperLinkPortrait" href="/Ninja-Mask-of-Shadows-item?id=1309911">Ninja Mask of Shadows</a>
                                                </div>
                                                <div class="AssetCreator">
                                                    <span class="Label">Creator:</span> <span class="Detail"><a id="ctl00_cphRoblox_rbxUserAssetsPane_AssetRec_dlAssets_ctl03_CreatorHyperLinkPortrait" href="User.aspx?ID=1">ROBLOX</a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="PortraitDiv" style="width: 140px; height: 190px; overflow: hidden;" visible="True">
                                            <div class="AssetThumbnail">
                                                <a id="ctl00_cphRoblox_rbxUserAssetsPane_AssetRec_dlAssets_ctl04_AssetThumbnailHyperLink" title="Paper Bag" href="/Paper-Bag-item?id=1051573" style="display:inline-block;height:110px;width:110px;cursor:pointer;"><img src="http://t5bg.roblox.com/bd564ff54d85136244788e442014a11a" border="0" onerror="return Roblox.Controls.Image.OnError(this)" alt="Paper Bag" /></a>
                                            </div>
                                            <div class="AssetDetails" style="height:90px;">
                                                <div class="AssetName">
                                                    <a id="ctl00_cphRoblox_rbxUserAssetsPane_AssetRec_dlAssets_ctl04_AssetNameHyperLinkPortrait" href="/Paper-Bag-item?id=1051573">Paper Bag</a>
                                                </div>
                                                <div class="AssetCreator">
                                                    <span class="Label">Creator:</span> <span class="Detail"><a id="ctl00_cphRoblox_rbxUserAssetsPane_AssetRec_dlAssets_ctl04_CreatorHyperLinkPortrait" href="User.aspx?ID=1">ROBLOX</a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="PortraitDiv" style="width: 140px; height: 190px; overflow: hidden;" visible="True">
                                            <div class="AssetThumbnail">
                                                <a id="ctl00_cphRoblox_rbxUserAssetsPane_AssetRec_dlAssets_ctl05_AssetThumbnailHyperLink" title="Rubber Duckie" href="/Rubber-Duckie-item?id=9254254" style="display:inline-block;height:110px;width:110px;cursor:pointer;"><img src="http://t1bg.roblox.com/c512c2bcc25c966873b978aea39d8f77" border="0" onerror="return Roblox.Controls.Image.OnError(this)" alt="Rubber Duckie" /></a>
                                            </div>
                                            <div class="AssetDetails" style="height:90px;">
                                                <div class="AssetName">
                                                    <a id="ctl00_cphRoblox_rbxUserAssetsPane_AssetRec_dlAssets_ctl05_AssetNameHyperLinkPortrait" href="/Rubber-Duckie-item?id=9254254">Rubber Duckie</a>
                                                </div>
                                                <div class="AssetCreator">
                                                    <span class="Label">Creator:</span> <span class="Detail"><a id="ctl00_cphRoblox_rbxUserAssetsPane_AssetRec_dlAssets_ctl05_CreatorHyperLinkPortrait" href="User.aspx?ID=1">ROBLOX</a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div style="clear: both;">
                </div>
            </div>
            <div id="ctl00_cphRoblox_rbxUserAssetsPane_CreateSetPanelDiv" class="createSetPanelPopup" style="width: 400px; height: 100%; padding: 0px; float: left; display: none">
                <div>
                    <div style="width: 100%; height: 100%; top: 0; left: 0; z-index: 249; position: fixed; opacity:0.5;filter:alpha(opacity=50); background-color: grey;">
                    </div>
                    <div style="background-color: #ffffdd; border-width: 3px; border-style: solid; border-color: Gray; 
                        padding: 3px; float: left; width: 400px; position: fixed; top: 25%; left: 40%; z-index: 250;">
                        <div class="StandardBoxHeader" style="float: left; width: 380px"><span>Create A Set</span></div>
                        <div id="ctl00_cphRoblox_rbxUserAssetsPane_CreateSetPanel1_CreateSetInnerDIV" style="background-color: #ffffdd; width: 380px; padding: 10px; float: left">
                            <div style="float: left">
                                <p style="margin-bottom: 0px">
                                    <span style="width: 40px">Name:  </span>
                                    <span id="NameDisplay" style="font-weight: bold; font-style: italic;" ></span>
                                </p>
                                <div id="ctl00_cphRoblox_rbxUserAssetsPane_CreateSetPanel1_NameDiv">
                                    <input name="ctl00$cphRoblox$rbxUserAssetsPane$CreateSetPanel1$Name" type="text" maxlength="100" id="ctl00_cphRoblox_rbxUserAssetsPane_CreateSetPanel1_Name" onkeydown="enableButton();" onkeyup="ismaxlength(this); updateRegularNameDisplay(this);" style="width:250px;" />
                                </div>
                                <span id="ctl00_cphRoblox_rbxUserAssetsPane_CreateSetPanel1_CustomValidatorSetNameProfanity" style="color:Red;display:none;">This set name contains some improper words.</span>
                                <p style="margin-bottom: 0px">Description:</p>
                                <textarea name="ctl00$cphRoblox$rbxUserAssetsPane$CreateSetPanel1$Description" rows="2" cols="20" id="ctl00_cphRoblox_rbxUserAssetsPane_CreateSetPanel1_Description" onkeyup="return ismaxlength(this);" style="width: 376px; height: 100px"></textarea>
                                <p style="width: 40px; margin-bottom: 0px">Image:</p>
                                <input type="file" name="ctl00$cphRoblox$rbxUserAssetsPane$CreateSetPanel1$Uploader" id="ctl00_cphRoblox_rbxUserAssetsPane_CreateSetPanel1_Uploader" onchange="fileUploadIsReady = true; enableButton();" style="width:350px;" />
                                <div id="ButtonDiv" style="text-align: center; margin: 10px 0px 10px 0px">
                                    <input type="submit" name="ctl00$cphRoblox$rbxUserAssetsPane$CreateSetPanel1$CreateSet" value="Create Set" id="ctl00_cphRoblox_rbxUserAssetsPane_CreateSetPanel1_CreateSet" disabled="disabled" />
                                    <input type="button" value="Cancel" id="CancelButton" name="CancelButton" onclick="$('.createSetPanelPopup').hide();" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
