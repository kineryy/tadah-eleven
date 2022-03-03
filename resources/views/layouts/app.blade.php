<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<!-- MachineID: APP71 -->
<head id="ctl00_Head1">
    <!--[if lte IE 7]>
    <style>
        .Navigation .dropdownnavcontainer
        {
        margin-left:121px;
        }
    </style>
    <![endif]-->
    <meta http-equiv="X-UA-Compatible" content="IE=7" />
    <title>
        {{ config('app.name') }}
    </title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('favicon.ico') }}" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Language" content="en-us" />
    <meta name="author" content="{{ config('app.name') }}" />
    <meta id="ctl00_metadescription" name="description" content="{{ config('app.name') }} is not affiliated with Roblox Corporation. Free Games and Building Games!  A virtual world with user-created castles, cars, spaceships, swords, battles, trucks, zombies and awesome destruction.  Build, battle, chat, or just hang out online." />
    <meta id="ctl00_metakeywords" name="keywords" content="free games, online games, building games, virtual world" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    <!-- Used for execution that must happen before page load -->
    <div id="MasterContainer">
        <div id="InstallationInstructions"  class="modalPopup blueAndWhite" style="display: none;overflow:hidden;width:380px;" >
        <div style="padding: 0px 0px 10px 0px; text-align:center;">
            <div class="titleBar">
                Installation Instructions
            </div>
            <div id="CancelButton" onclick="return Roblox.Client._onCancel();" class="Button" style="width: 80px; margin: 0px auto;">Close Window</div>
        </div>
        </div>
        <!-- <iframe id="downloadInstallerIFrame" style="visibility:hidden; height: 0px; width:1px;"> !-->
        </iframe>
        <div id="pluginObjDiv" style="height: 0px; width:1px;visibility:hidden;"></div>
        <div ID="PlaceLauncherStatusPanel" style="display: none; width: 300px;">
        <div class="modalPopup blueAndWhite PlaceLauncherModal" style="min-height: 160px;">
            <div id="Spinner" style="margin:0 1em 1em 0; padding:20px 0px;">
                <img src="/images/ProgressIndicator3.gif" alt="Progress" />
            </div>
            <div id="status" style="min-height:40px; text-align:center; margin: 5px 20px;">
                <div id="Starting" class="PlaceLauncherStatus" style="display:block">
                    Starting {{ config('app.name') }}...
                </div>
                <div id="Waiting" class="PlaceLauncherStatus">Connecting to Players...</div>
                <div id="StatusBackBuffer" class="PlaceLauncherStatus PlaceLauncherStatusBackBuffer"></div>
            </div>
            <div style="text-align: center; margin-top: 1em;">
                <input type="button" class="Button CancelPlaceLauncherButton" value="Cancel" />
            </div>
        </div>
        </div>
        <!-- Begin chat bar -->
        <div style="width: 100%">        
        </div>
        <!-- End chat bar -->
        <div id="Container">
        <div id="HeaderContainer">
            <div id="Header">
                <div id="Banner">
                    <div id="Options">
                    @if (Auth::user())
                        <div id="Authentication">
                            <span id="AuthenticationBannerSpan">
                            <span id="ctl00_BannerOptionsLoginView_BannerOptions_Authenticated_lnLoginName">Hi {{ Auth::user()->username }} </span>
                            <span class="rbx2hide">| </span>
                            <a id="ctl00_BannerOptionsLoginView_BannerOptions_Authenticated_lsLoginStatus" onclick="document.getElementById('LogoutForm').submit()">Logout</a>
                            </span>
                        </div>
                    @else
                        <div id="Authentication">
                            <span id="AuthenticationBannerSpan" style="width: 40px;">
                            <a id="ctl00_BannerOptionsLoginView_BannerOptions_Anonymous_LoginHyperLink" href="{{ route('login') }}">Login</a>
                            </span>
                        </div>
                    @endif
                    <div id="Settings"></div>
                    </div>
                    <a id="Logo" href="{{ route('welcome') }}" style="cursor: pointer; border: none;"></a>
                    @if (Auth::user())
                    <div id="Alerts">
                        <table style="width:100%;height:100%">
                        <tr>
                            <td valign="middle">
                                <div id="ctl00_BannerAlertsLoginView_BannerAlerts_Authenticated_rbxBannerAlert_rbxAlerts_AlertSpacePanel">
                                    <div class="AlertSpace">
                                    <div class="MessageAlert">
                                        <div class="icons message_icon">
                                        </div>
                                        <a id="ctl00_BannerAlertsLoginView_BannerAlerts_Authenticated_rbxBannerAlert_rbxAlerts_MessageAlertCaptionHyperLink" class="MessageAlertCaption tooltip-left" title="Inbox" href="#">0</a>
                                    </div>
                                    <div class="FriendsAlert">
                                        <div class="icons friends_icon">
                                        </div>
                                        <a id="ctl00_BannerAlertsLoginView_BannerAlerts_Authenticated_rbxBannerAlert_rbxAlerts_FriendsAlertCaptionHyperLink" class="FriendsAlertCaption tooltip-right" title="Friend Requests" href="#">0</a>
                                    </div>
                                    <div class="RobuxAlert">
                                        <div class="icons robux_icon">
                                        </div>
                                        <a id="ctl00_BannerAlertsLoginView_BannerAlerts_Authenticated_rbxBannerAlert_rbxAlerts_RobuxAlertCaptionHyperLink" class="RobuxAlertCaption tooltip-left" title="{{ Auth::user()->money }} {{ config('app.currency_name_multiple') }}" href="#">{{ Auth::user()->getReadableMoney() }}</a>
                                    </div>
                                    <div class="TicketsAlert">
                                        <div class="icons tickets_icon">
                                        </div>
                                        <a id="ctl00_BannerAlertsLoginView_BannerAlerts_Authenticated_rbxBannerAlert_rbxAlerts_TicketsAlertCaptionHyperLink" class="TicketsAlertCaption tooltip-right" title="SOMETHING THAT DOESN'T EXIST" href="#">0</a>
                                    </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </table>
                    </div>
                    @else
                    <div style="float: right; width: 203px;">
                    <a id="ctl00_BannerAlertsLoginView_BannerAlerts_Anonymous_rbxAlerts_SignupAndPlayHyperLink" class="SignUpAndPlay" Text="Sign-up and Play!" href="/Games.aspx" style="display:inline-block;height:40px;width:210px;cursor:pointer;"><img src="/images/Holiday3Button.png" border="0" onerror="return Roblox.Controls.Image.OnError(this)" /></a>
                    </div>
                    @endif
                </div>
                <script type="text/javascript" language="javascript">
                    function toggleDropDownNav()
                    {
                        if ($(".dropdownnavcontainer:visible").size() > 0)
                        {
                            $(".dropdownnavcontainer").hide();
                            $("#gamesMenuToggle").css("background-position", "0 0");
                        }
                        else
                        {
                            $(".dropdownnavcontainer").show();
                            $("#gamesMenuToggle").css("background-position", "0 -6px");
                        }
                    }
                </script>
                <div class="Navigation">
                    <div class="dropdownnavcontainer">
                    <div class="dropdownmainnav" style="z-index:1023;">
                        <div style="float: left; width: 50%; text-align: left;" onclick="window.location = '/all-games'">
                            <img src="/images/GenreIconsInverted/Classic.png" />
                            <a href='/all-games' title="All" style="padding: 0; margin: 0 2px 0 0; border: none; font-size: 15px;">All</a>
                        </div>
                        <div style="float: left; width: 50%; text-align: left;" onclick="window.location = '/town-and-city-games'">
                            <img src="/images/GenreIconsInverted/City.png" />
                            <a href='/town-and-city-games' title="Town and City" style="padding: 0; margin: 0 2px 0 0; border: none; font-size: 15px;">Town and City</a>
                        </div>
                        <div style="float: left; width: 50%; text-align: left;" onclick="window.location = '/medieval-games'">
                            <img src="/images/GenreIconsInverted/Castle.png" />
                            <a href='/medieval-games' title="Fantasy" style="padding: 0; margin: 0 2px 0 0; border: none; font-size: 15px;">Fantasy</a>
                        </div>
                        <div style="float: left; width: 50%; text-align: left;" onclick="window.location = '/sci-fi-games'">
                            <img src="/images/GenreIconsInverted/SciFi.png" />
                            <a href='/sci-fi-games' title="Sci-Fi" style="padding: 0; margin: 0 2px 0 0; border: none; font-size: 15px;">Sci-Fi</a>
                        </div>
                        <div style="float: left; width: 50%; text-align: left;" onclick="window.location = '/ninja-games'">
                            <img src="/images/GenreIconsInverted/Ninja.png" />
                            <a href='/ninja-games' title="Ninja" style="padding: 0; margin: 0 2px 0 0; border: none; font-size: 15px;">Ninja</a>
                        </div>
                        <div style="float: left; width: 50%; text-align: left;" onclick="window.location = '/scary-games'">
                            <img src="/images/GenreIconsInverted/Cthulu.png" />
                            <a href='/scary-games' title="Scary" style="padding: 0; margin: 0 2px 0 0; border: none; font-size: 15px;">Scary</a>
                        </div>
                        <div style="float: left; width: 50%; text-align: left;" onclick="window.location = '/pirate-games'">
                            <img src="/images/GenreIconsInverted/Pirate.png" />
                            <a href='/pirate-games' title="Pirate" style="padding: 0; margin: 0 2px 0 0; border: none; font-size: 15px;">Pirate</a>
                        </div>
                        <div style="float: left; width: 50%; text-align: left;" onclick="window.location = '/adventure-games'">
                            <img src="/images/GenreIconsInverted/Adventure.png" />
                            <a href='/adventure-games' title="Adventure" style="padding: 0; margin: 0 2px 0 0; border: none; font-size: 15px;">Adventure</a>
                        </div>
                        <div style="float: left; width: 50%; text-align: left;" onclick="window.location = '/sports-games'">
                            <img src="/images/GenreIconsInverted/Sports.png" />
                            <a href='/sports-games' title="Sports" style="padding: 0; margin: 0 2px 0 0; border: none; font-size: 15px;">Sports</a>
                        </div>
                        <div style="float: left; width: 50%; text-align: left;" onclick="window.location = '/funny-games'">
                            <img src="/images/GenreIconsInverted/LOL.png" />
                            <a href='/funny-games' title="Funny" style="padding: 0; margin: 0 2px 0 0; border: none; font-size: 15px;">Funny</a>
                        </div>
                        <div style="float: left; width: 50%; text-align: left;" onclick="window.location = '/wild-west-cowboy-games'">
                            <img src="/images/GenreIconsInverted/WildWest.png" />
                            <a href='/wild-west-cowboy-games' title="Wild West" style="padding: 0; margin: 0 2px 0 0; border: none; font-size: 15px;">Wild West</a>
                        </div>
                        <div style="float: left; width: 50%; text-align: left;" onclick="window.location = '/war-games'">
                            <img src="/images/GenreIconsInverted/ModernMilitary.png" />
                            <a href='/war-games' title="War" style="padding: 0; margin: 0 2px 0 0; border: none; font-size: 15px;">War</a>
                        </div>
                        <div style="float: left; width: 50%; text-align: left;" onclick="window.location = '/skatepark-games'">
                            <img src="/images/GenreIconsInverted/Skatepark.png" />
                            <a href='/skatepark-games' title="Skate Park" style="padding: 0; margin: 0 2px 0 0; border: none; font-size: 15px;">Skate Park</a>
                        </div>
                        <div style="float: left; width: 50%; text-align: left;" onclick="window.location = '/gametutorials-games'">
                            <img src="/images/GenreIconsInverted/Tutorial.gif" />
                            <a href='/gametutorials-games' title="Tutorial" style="padding: 0; margin: 0 2px 0 0; border: none; font-size: 15px;">Tutorial</a>
                        </div>
                    </div>
                    <div class="dropdownmainnav" style="width:145px;border-left:0px;z-index:1023">
                        <div onclick="window.location = '/games.aspx'"><a href="/games.aspx" style="font-size:15px;"><b>Most Popular</b></a><br /></div>
                        <div onclick="window.location = '/games.aspx?m=TopFavorites'"><a href="/games.aspx?t=PastWeek&m=TopFavorites" style="font-size:15px;">Top Favorites</a><br /></div>
                        <div onclick="window.location = '/games.aspx?m=Featured'"><a href="/games.aspx?m=Featured" style="font-size:15px;">Featured Games</a><br /></div>
                        <div onclick="window.location = '/Catalog.aspx?m=TopFavorites&c=9&t=AllTime&d=All&q='"><a href="/Catalog.aspx?m=TopFavorites&c=9&t=AllTime&d=All&q=" style="font-size:15px;">Search Games</a></div>
                    </div>
                    </div>
                    <ul id="ctl00_Menu_MenuUL">
                    <li>
                        <a id="ctl00_Menu_hlMyRobloxLink_hlMyRoblox" href="{{ route('home') }}" style="">
                            <h2>My {{ config('app.name') }}</h2>
                        </a>
                    </li>
                    <li class="gamesLink">
                        <a id="hlGames" href="{{ route('servers.index') }}" style="" title="Games">
                            <h2>Games</h2>
                        </a>
                        <a id="gamesMenuToggle" onclick='toggleDropDownNav();' style="padding:0 2px;cursor:pointer;border:none;background:url(/images/topNav_arrow_white.png) no-repeat;height:6px;width:10px;display:inline-block;*margin-bottom:5px;"></a>
                    </li>
                    <li>
                        <a id="hlCatalog" href="{{ route('catalog.index', 'hats') }}" style="" title="Catalog">
                            <h2>Catalog</h2>
                        </a>
                    </li>
                    <li>
                        <a id="hlBrowse" href="{{ route('users.index') }}" style="" title="People">
                            <h2>People</h2>
                        </a>
                    </li>
                    <!--<li>
                        <a id="hlBuildersClub" href="/Upgrades/BuildersClub.aspx" style="" title="Builders Club">
                            <h2>Builders Club</h2>
                        </a>
                    </li>
                    <li id="ctl00_Menu_ContestsMenuTab">
                        <a id="hlContests" href="/Contests/" style="" title="Contests">
                            <h2>Contests</h2>
                        </a>
                    </li>!-->
                    <li>
                        <a id="hlForum" onclick="" href="{{ route('forum.index') }}" style="" title="Forum">
                            <h2>Forum</h2>
                        </a>
                    </li>
                    <li>
                        <a id="hlNews" href="{{ route('forum.category', 1) }}" target="_blank" title="News">
                            <h2>News</h2>
                        </a>
                    </li>
                    <li>
                        <a id="hlHelp" href="{{ route('forum.index') }}" style="" title="Help">
                            <h2>Help</h2>
                        </a>
                    </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="ctl00_Announcement">
            <div class="SystemAlert">
                <div id="ctl00_SystemAlertTextColor" class="SystemAlertText" style="background-color:red;">
                    <div class="Exclamation">
                    </div>
                    <div id="ctl00_LabelAnnouncement">Tadah Eleven is not finished at the moment. Please hang tight as development continues!</div>
                </div>
            </div>
        </div>
        <div id="Body">
            @yield('content')
        </div>
        <div id="Footer">
            <div class="FooterNav">
                <a id="ctl00_rbxFooter_PrivacyHyperLink" href="/rules"><b>Privacy Policy</b></a>
                &nbsp;|&nbsp; 
                <a id="ctl00_rbxFooter_ContactHyperLink" href="/rules">Contact Us</a>
                &nbsp;|&nbsp;
                <a id="ctl00_rbxFooter_AboutHyperLink" href="/rules">About Us</a>
                &nbsp;|&nbsp;
                <a id="ctl00_rbxFooter_FreeGamesHyperLink" href="{{ route('servers.index') }}">Free Games</a>
            </div>
            <div  class="FooterNav">
                <div id="ctl00_rbxFooter_SEOGenreLinks" class="SEOGenreLinks"><a href='#' title='Town and City Games'>Town and City</a>&nbsp;|&nbsp;<a href='#' title='Fantasy Games'>Fantasy</a>&nbsp;|&nbsp;<a href='#' title='Sci-Fi Games'>Sci-Fi</a>&nbsp;|&nbsp;<a href='#' title='Ninja Games'>Ninja</a>&nbsp;|&nbsp;<a href='#' title='Scary Games'>Scary</a>&nbsp;|&nbsp;<a href='#' title='Pirate Games'>Pirate</a>&nbsp;|&nbsp;<a href='#' title='Adventure Games'>Adventure</a>&nbsp;|&nbsp;<a href='#' title='Sports Games'>Sports</a>&nbsp;|&nbsp;<a href='#' title='Funny Games'>Funny</a>&nbsp;|&nbsp;<a href='#' title='Wild West Games'>Wild West</a>&nbsp;|&nbsp;<a href='#' title='War Games'>War</a>&nbsp;|&nbsp;<a href='#' title='Skate Park Games'>Skate Park</a>&nbsp;|&nbsp;<a href='#' title='Tutorial Games'>Tutorial</a></div>
            </div>
            <p class="Legalese">
                {{ config('app.name') }} is not affiliated, owned by, nor partnered with Roblox corporation. Roblox, "Powering Imagination", characters, logos, names, and all related indicia are trademarks of <a id="ctl00_rbxFooter_hlRobloxCorporation" href="https://corp.roblox.com/">Roblox Corporation</a>, ©{{ \Carbon\Carbon::now()->year }}.
                <br />
                {{ config('app.name') }} is not sponsored, authorized or endorsed by any producer of plastic building bricks, including The LEGO Group, MEGA Brands, and K'Nex,<br /> and no resemblance to the products of these companies is intended.<br />Use of this site signifies your acceptance of the <a id="ctl00_rbxFooter_hlTermsOfService" href="/rules">Terms and Conditions</a>.
                <br />
            </p>
        </div>
        </div>
        @yield('scripts')
        <form id="LogoutForm" action="{{ route('logout') }}" method="post">@csrf</form>
    </div>
</body>
</html>
