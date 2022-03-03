@inject('user', 'App\Http\Controllers\UsersController')

@extends('layouts.app')

@section('content')
<!-- The second set of script includes are for optimization (CompositeScript). The 'true' include is declared in PlaceLauncher.ascx -->
<div id="ItemContainer">
    <div class="StandardBoxHeader" style="width: 709px;">
        <span class="item-header">
            <a id="ctl00_cphRoblox_FavoriteThisButton2" class="favoriteStar_20h tooltip" title="Add This to Your Favorites" href="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$cphRoblox$FavoriteThisButton2&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, true))" style=""></a>
            <h1>
                {{ $server->name }} 
            </h1>
        </span>
    </div>
    <div id="Item" class="StandardBox" style="width: 709px;">
        <div id="Details">
            <div id="placeContainer">
                <div id="Thumbnail_Place">
                    <a id="ctl00_cphRoblox_AssetThumbnailImage_Place" title="{{ $server->name }} " style="display:inline-block;height:230px;width:420px;cursor:pointer;"><img width="420" height="230px" src="{{ asset('images/placeholdergame.png') }}" border="0" onerror="return Roblox.Controls.Image.OnError(this)" alt="{{ $server->name }} " /></a>
                </div>
                <div id="Actions_Place">
                    <a id="ctl00_cphRoblox_FavoriteThisPlaceButton" href="#">Favorite</a>
                </div>
                <div id="ctl00_cphRoblox_PlayGames" class="PlayGames">
                    <div class="PlaceInfoIcons">
                        <span class="PlaceAccessIndicator">
                        <span id="ctl00_cphRoblox_PlaceAccessIndicator_FriendsOnlyLocked" style="display: none">
                        <a class="iLocked tooltip" title="Friends Only"></a><span class="rbx2hide">&nbsp;Friends-only</span></span>
                        <span id="ctl00_cphRoblox_PlaceAccessIndicator_FriendsOnlyUnlocked" style="display: none">
                        <a class="iUnlocked tooltip" title="Friends Only - You are friends"></a><span class="rbx2hide">&nbsp;Friends-only: You are friends</span></span>
                        <span id="ctl00_cphRoblox_PlaceAccessIndicator_ExpiredSelf" style="display: none">
                        <a class="iLocked tooltip" title="Locked"></a>
                        </span>
                        <span id="ctl00_cphRoblox_PlaceAccessIndicator_ExpiredOther" style="display: none">
                        <a class="iLocked tooltip" title="Locked"></a>
                        <span class="rbx2hide">This place is locked because the creator's Builders
                        Club / Turbo Builders Club has expired. </span></span>
                        </span>
                        <a class="CopyLockedIcon tooltip" title="Copylocked"></a>
                        <span class="rbx2hide">Copy Protection: CopyLocked</span>
                        <a class="NoGearIcon tooltip" title="No Gear Allowed"></a>
                        <span class="rbx2hide">Gear Not Allowed</span>
                    </div>
                    <center>
                        <div ID="PlaceLauncherStatusPanel" style="display: none; width: 300px">
                            <div class="modalPopup" style="margin: 1.5em; color: Black; padding: 10px">
                                <div id="Spinner" style="float:left;margin:0 1em 1em 0">
                                    <img id="ctl00_cphRoblox_VisitButtons_rbxPlaceLauncher_Image1" src="images/ProgressIndicator2.gif" alt="Progress" style="border-width:0px;" />
                                </div>
                                <div id="Starting" style="display: inline">
                                    Starting Roblox...
                                </div>
                                <div id="Waiting" style="display: none">
                                    Waiting for a server...
                                </div>
                                <div id="Loading" style="display: none">
                                    A server is loading the game...
                                </div>
                                <div id="Joining" style="display: none">
                                    The server is ready. Joining the game...
                                </div>
                                <div id="Error" style="display: none">
                                    An error occurred. Please try again later.
                                </div>
                                <div id="Expired" style="display: none">
                                    Joining games is temporarily disabled while we upgrade. Please try again soon.
                                </div>
                                <div id="GameEnded" style="display: none">
                                    The game you requested has ended.
                                </div>
                                <div id="GameFull" style="display: none">
                                    The game you requested is currently full. Waiting for an opening...
                                </div>
                                <div id="Updating" style="display: none">
                                    Roblox is updating. Please wait...
                                </div>
                                <div id="Updated" style="display: none">
                                    Requesting a server
                                </div>
                                <div style="text-align: center; margin-top: 1em">
                                    <input type="button" class="Button CancelPlaceLauncherButton" value="Cancel" />
                                </div>
                            </div>
                        </div>
                        <div id="InstallationInstructions"  class="modalPopup blueAndWhite" style="display: none;overflow:hidden;width:380px;" >
                            <div style="padding: 0px 0px 10px 0px; text-align:center;">
                                <div class="titleBar">
                                    Installation Instructions
                                </div>
                                <div style="text-align: left; width: 350px; margin: 0px auto; font-size: 15px; margin-top: 10px">
                                    1) A window will open. Click <b>Run</b>.<br />&nbsp;&nbsp;&nbsp;&nbsp;(If there is no "Run" button, click Open).<br />
                                    2) Click <b>Run</b> and start playing ROBLOX!<br />
                                    <br />
                                </div>
                                <img id="ie7_install_img" src="" alt="Installation Instructions"/><br /><br />
                                <div id="CancelButton" onclick="return Roblox.Client._onCancel();" class="Button" style="width: 80px; margin: 0px auto;">Close Window</div>
                            </div>
                        </div>
                        <iframe id="downloadInstallerIFrame" src="" style="visibility:hidden; height: 0px">
                        </iframe>
                        <div id="pluginObjDiv" style="height: 0px"></div>
                        <div id="ctl00_cphRoblox_VisitButtons_FancyButtons" style="overflow: hidden; width: 400px;">
                            <div id="ctl00_cphRoblox_VisitButtons_VisitMPButton" style="display: inline; width: 10px;">
                                <a id="ctl00_cphRoblox_VisitButtons_MultiplayerVisitButton" class="ImageButton MultiplayerVisit" onclick="if (Roblox.Client.WaitForRoblox(function() { RobloxLaunch.RequestGame('PlaceLauncherStatusPanel', 26027557) })) {tryToDownload('/install/setup.ashx'); logStatistics('playmp'); } return false;"></a>
                            </div>
                        </div>
                    </center>
                    <div style="clear:both; height:10px;"></div>
                </div>
            </div>
            <!-- details -->
            <div id="Summary" style="float: right;">
                <h3>
                    {{ config('app.name') }} Place
                </h3>
                <div>
                    <b></b>
                    <div class="clear"></div>
                </div>
                <!-- timer -->
                <div id="Creator" class="Creator section">
                    <div class="Avatar">
                        <a id="ctl00_cphRoblox_AvatarImage" class="tooltip-right" title="{{ $server->user->username }}" href="{{ route('users.profile', $server->user->id) }}" style="display:inline-block;height:100px;width:100px;cursor:pointer;"><img width="100" height="100" src="{{ route('users.thumbnail', $server->user->id) }}" border="0" onerror="return Roblox.Controls.Image.OnError(this)" alt="{{ $server->user->username }}" /></a>
                    </div>
                    <span class="label creator-name">Creator:</span>
                    <a id="ctl00_cphRoblox_CreatorHyperLink" href="{{ route('users.profile', $server->user->id) }}">{{ $server->user->username }}</a>
                </div>
                <div class="item-detail">
                    <div>
                        <span class="label">Created:</span>
                        {{ $server->created_at->diffForHumans() }}
                    </div>
                    <div id="LastUpdate">
                        <span class="label">Updated:</span>
                        {{ $server->updated_at->diffForHumans() }}
                    </div>
                    <div id="Favorited">
                        <span class="label">Favorited:</span>
                        0 times
                    </div>
                    <div id="ctl00_cphRoblox_VisitedPanel" class="Visited">
                        <span class="label">Visited:</span>
                        0 times
                    </div>
                </div>
                <div class="ReportAbuse">
                    <div id="ctl00_cphRoblox_AbuseReportButton1_AbuseReportPanel" class="ReportAbusePanel">
                        <span class="AbuseIcon"><a id="ctl00_cphRoblox_AbuseReportButton1_ReportAbuseIconHyperLink" href="#"><img src="images/abuse.PNG?v=2" alt="Report Abuse" style="border-width:0px;" /></a></span>
                        <span class="AbuseButton"><a id="ctl00_cphRoblox_AbuseReportButton1_ReportAbuseTextHyperLink" href="#">Report Abuse</a></span>
                    </div>
                </div>
            </div>
            <div class="clear">
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>
<div id="ctl00_cphRoblox_ItemPurchasePopupPanel" class="modalPopup" style="width:27em;display: none">
    <div id="ctl00_cphRoblox_ItemPurchasePopupUpdatePanel">
    </div>
</div>
<div id="ctl00_cphRoblox_SalePriceConfirmPopupPanel" class="modalPopup" style="width:27em;display: none">
    <div id="ctl00_cphRoblox_UpdatePanel1">
        <div id="RobloxOffer">
            <h2>
                <font color="red">Warning!</font>
            </h2>
            <p>
                You are trying to sell this item for <b>
                ERROR: No P2P offer price</b> ROBUX.
            </p>
            <p>
                This item normally sells for around <b>
                </b> ROBUX.
            </p>
            <p>
                If you want, ROBLOX will purchase this item from you instantly for <b>
                0</b> ROBUX.
            </p>
            <p>
                Minus marketplace fees, your profit would be: <b>
                ERROR: No P2P offer price</b> ROBUX
            </p>
            <p>
                <input type="submit" name="ctl00$cphRoblox$CancelAttemptedSale" value="Cancel Sale" onclick="$find('myBehavior2').hide();WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$cphRoblox$CancelAttemptedSale&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, false))" id="ctl00_cphRoblox_CancelAttemptedSale" class="MediumButton" style="width:100%;" />
            </p>
            <p>
                <input type="submit" name="ctl00$cphRoblox$SellItemToROBLOX" value="Sell to ROBLOX" onclick="document.getElementById('RobloxOffer').style.display = 'none';document.getElementById('ProcessROBLOXPurchase').style.display = 'block';WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$cphRoblox$SellItemToROBLOX&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, false))" id="ctl00_cphRoblox_SellItemToROBLOX" class="MediumButton" style="width:100%;" />
            </p>
        </div>
        <div id="ProcessROBLOXPurchase">
            <div id="Div8" class="processingMgs">
                <img id="ctl00_cphRoblox_Image22" src="images/ProgressIndicator2.gif" alt="Processing..." align="middle" style="border-width:0px;" />&nbsp&nbsp; Processing transaction
                ...
            </div>
        </div>
    </div>
</div>
<input type="hidden" name="ctl00$cphRoblox$HiddenField1" id="ctl00_cphRoblox_HiddenField1" />
<input type="hidden" name="ctl00$cphRoblox$HiddenField2" id="ctl00_cphRoblox_HiddenField2" />
<input type="hidden" name="ctl00$cphRoblox$HiddenField3" id="ctl00_cphRoblox_HiddenField3" />
<div id="ctl00_cphRoblox_CreateSetPanelDiv" class="createSetPanelPopup">
    <div>
        <div style="width: 100%; height: 100%; top: 0; left: 0; z-index: 249; position: fixed; opacity:0.5;filter:alpha(opacity=50); background-color: grey;">
        </div>
        <div style="background-color: #ffffdd; border-width: 3px; border-style: solid; border-color: Gray; 
            padding: 3px; float: left; width: 400px; position: fixed; top: 25%; left: 40%; z-index: 250;">
            <div class="StandardBoxHeader" style="float: left; width: 380px"><span>Create A Set</span></div>
            <div id="ctl00_cphRoblox_CreateSetPanel1_CreateSetInnerDIV" style="background-color: #ffffdd; width: 380px; padding: 10px; float: left">
                <div style="float: left">
                    <p style="margin-bottom: 0px">
                        <span style="width: 40px">Name:  </span>
                        <span id="NameDisplay" style="font-weight: bold; font-style: italic;" ></span>
                    </p>
                    <div id="ctl00_cphRoblox_CreateSetPanel1_NameDiv">
                        <input name="ctl00$cphRoblox$CreateSetPanel1$Name" type="text" maxlength="100" id="ctl00_cphRoblox_CreateSetPanel1_Name" onkeydown="enableButton();" onkeyup="ismaxlength(this); updateRegularNameDisplay(this);" style="width:250px;" />
                    </div>
                    <span id="ctl00_cphRoblox_CreateSetPanel1_CustomValidatorSetNameProfanity" style="color:Red;display:none;">This set name contains some improper words.</span>
                    <p style="margin-bottom: 0px">Description:</p>
                    <textarea name="ctl00$cphRoblox$CreateSetPanel1$Description" rows="2" cols="20" id="ctl00_cphRoblox_CreateSetPanel1_Description" onkeyup="return ismaxlength(this);" style="width: 376px; height: 100px"></textarea>
                    <p style="width: 40px; margin-bottom: 0px">Image:</p>
                    <input type="file" name="ctl00$cphRoblox$CreateSetPanel1$Uploader" id="ctl00_cphRoblox_CreateSetPanel1_Uploader" onchange="fileUploadIsReady = true; enableButton();" style="width:350px;" />
                    <div id="ButtonDiv" style="text-align: center; margin: 10px 0px 10px 0px">
                        <input type="submit" name="ctl00$cphRoblox$CreateSetPanel1$CreateSet" value="Create Set" id="ctl00_cphRoblox_CreateSetPanel1_CreateSet" disabled="disabled" />
                        <input type="button" value="Cancel" id="CancelButton" name="CancelButton" onclick="$('.createSetPanelPopup').hide();" />
                    </div>
                </div>
            </div>
            <script type="text/javascript" language="javascript">
                var userName = 'Cubut';
                var maxAdjectives = '2';
                var maxCategories = '2';
                var superSafeAdjectiveListClientId = 'ctl00_cphRoblox_CreateSetPanel1_SuperSafeAdjectiveChoices';
                var superSafeCategoryListClientId = 'ctl00_cphRoblox_CreateSetPanel1_SuperSafeCategoryChoices';
                var superSafeNameListClientId = 'ctl00_cphRoblox_CreateSetPanel1_SuperSafeNameChoice';
                var fileUploadIsReady = false;
                var nameClientID = 'ctl00_cphRoblox_CreateSetPanel1_Name';
                var createSetClientID = 'ctl00_cphRoblox_CreateSetPanel1_CreateSet';
                var errorOnPage = 'False';
                
                var prevSelected = [];
                
                $(document).ready(function() { if (errorOnPage == "True") { $('.createSetPanelPopup').show(); } });
            </script>
            <script src="/UserControls/CreateSetPanel.js" type="text/javascript" language=javascript></script>
        </div>
    </div>
</div>
@endsection