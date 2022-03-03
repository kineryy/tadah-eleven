@extends('layouts.app')

@section('content')
<!-- The second set of script includes are for optimization (CompositeScript). The 'true' include is declared in PlaceLauncher.ascx -->
<div id="ItemContainer">
    <div class="StandardBoxHeader" style="width: 709px;">
        <span class="item-header">
            <a id="ctl00_cphRoblox_FavoriteThisButton2" class="favoriteStar_20h tooltip" title="Add This to Your Favorites" href="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$cphRoblox$FavoriteThisButton2&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, true))" style=""></a>
            <h1>
                {{ $item->name }}
            </h1>
        </span>
    </div>
    <div id="Item" class="StandardBox" style="width: 709px;">
        <div id="Details">
            <div id="SetListControl_47643125" class="SetList">
                <img src="/images/star.png" id="ctl00_cphRoblox_AddToSetsPanel_setlistbutton" alt="Add To Sets" />
                <div id="setList_47643125" class="SetListDropDown" >
                    <div id="ctl00_cphRoblox_AddToSetsPanel_SetListDiv" class="SetListDropDownList">
                        <span style='font-style: italic; text-align: center'>Add to Set:</span>
                        <hr style='top: -5px; position: relative;' />
                        <span>
                        <a class='CreateSetButton' onclick="$('.createSetPanelPopup').show();">Add a new set</a>
                        </span>
                    </div>
                </div>
            </div>
            <div id="assetContainer">
                <div id="Thumbnail">
                    <a id="ctl00_cphRoblox_AssetThumbnailImage" disabled="disabled" title="{{ $item->name }}" onclick="return false" style="display:inline-block;height:420px;width:420px;"><img src="{{ route('catalog.getthumbnail', $item->id) }}" border="0" alt="{{ $item->name }}" /></a>
                </div>
                <div id="Actions">
                    <a id="ctl00_cphRoblox_FavoriteThisButton" href="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$cphRoblox$FavoriteThisButton&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, true))">Favorite</a>
                </div>
            </div>
            <!-- details -->
            <div id="Summary" style="float: right;">
                <h3>
                    {{ config('app.name') }} {{ $item->type }}
                </h3>
                <div>
                    <b></b>
                    @if ($item->onsale && $item->approved)
                        @if (!$ownedItem)
                            <div id="ctl00_cphRoblox_RobuxPurchasePanel">
                                <div id="RobuxPurchase">
                                    <div id="PriceInRobux">
                                        D$: {{ number_format($item->price) }}
                                    </div>
                                    <div id="BuyWithRobux">
                                        <form method="POST" action="{{ route('catalog.buy', $item->id) }}">
                                            @csrf
                                            <a role="button" id="ctl00_cphRoblox_PurchaseWithRobuxButton" class="Button" onclick="this.closest('form').submit(); return false;">Buy with D$</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @else
                            <span class="text-muted">You already own this.</span>
                        @endif
                    @else
                    <span class="text-muted">Item not for sale.</span>
                    @endif
                    <div class="clear"></div>
                </div>
                <!-- timer -->
                <div id="Creator" class="Creator section">
                    <div class="Avatar">
                        <a id="ctl00_cphRoblox_AvatarImage" class="tooltip-right" title="{{ $item->user->username }}" href="{{ route('users.profile', $item->user->id) }}" style="display:inline-block;height:100px;width:100px;cursor:pointer;"><img src="{{ route('users.thumbnail', $item->user->id) }}" width="100" height="100" border="0" alt="{{ $item->user->username }}" /></a>
                    </div>
                    <span class="label creator-name">Creator:</span>
                    <a id="ctl00_cphRoblox_CreatorHyperLink" href="{{ route('users.profile', $item->user->id) }}">{{ $item->user->username }}</a>
                </div>
                <div class="item-detail">
                    <div>
                        <span class="label">Created:</span>
                        {{ $item->created_at->diffForHumans() }}
                    </div>
                    <div id="LastUpdate">
                        <span class="label">Updated:</span>
                        {{ $item->updated_at->diffForHumans() }}
                    </div>
                    <!--<div id="Favorited">
                        <span class="label">Favorited:</span>
                        0 times
                    </div>!-->
                    <div id="ctl00_cphRoblox_Sold">
                        <span class="label">Total Sold:</span>
                        {{ $item->sales }}
                    </div>
                </div>
                <div id="Genres" class="box section">
                    <div id="ctl00_cphRoblox_Genres">
                        <div class="head label">Genres:</div>
                        <div class="body">
                            <div id="ctl00_cphRoblox_IsClassic">
                                <img id="ctl00_cphRoblox_Image3" class="GamesInfoIcon" src="/images/GenreIcons/Classic.png" alt="All Genres" style="border-width:0px;" />
                                <a href="#">All Genres</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="ctl00_cphRoblox_DescriptionPanel" class="box section">
                    <div class="head label">
                        Description:
                    </div>
                    <div class="Description body">
                        {{ $item->description }}
                    </div>
                </div>
                <div class="ReportAbuse">
                    <div id="ctl00_cphRoblox_AbuseReportButton1_AbuseReportPanel" class="ReportAbusePanel">
                        <span class="AbuseIcon"><a id="ctl00_cphRoblox_AbuseReportButton1_ReportAbuseIconHyperLink" href="#"><img src="/images/abuse.PNG?v=2" alt="Report Abuse" style="border-width:0px;" /></a></span>
                        <span class="AbuseButton"><a id="ctl00_cphRoblox_AbuseReportButton1_ReportAbuseTextHyperLink" href="#">Report Abuse</a></span>
                    </div>
                </div>
                @if ($item->user == Auth::user() || Auth::user()->admin)
                <div id="ctl00_cphRoblox_EditItemPanel">
                    <div class="ItemVerb">
                        <a id="ctl00_cphRoblox_EditItemHyperLink" href="My/Item.aspx?ID=47643125">Configure this {{ $item->type }}</a>
                    </div>
                </div>
                @endif
            </div>
        </div>
        <div style="margin-top: 10px;">
            <div>
                <div class="StandardTabWhite"><span>Recommendations</span></div>
                <div class="StandardBoxWhite">
                    <div style="font-size: x-small;">Here are some other items that we think you might like.</div>
                    <table id="ctl00_cphRoblox_AssetRec_dlAssets" cellspacing="0" align="Center" border="0" style="height:200px;width:600px;border-collapse:collapse;">
                        <tr>
                            <!--<td>
                                <div class="PortraitDiv" style="width: 140px; height: 190px; overflow: hidden;" visible="True">
                                    <div class="AssetThumbnail">
                                        <a id="ctl00_cphRoblox_AssetRec_dlAssets_ctl00_AssetThumbnailHyperLink" title="jail cell" href="/jail-cell-item?id=1861607" style="display:inline-block;height:110px;width:110px;cursor:pointer;"><img src="http://t3bg.roblox.com/9a51cbef32a584ec80459f60ba9033af" border="0" onerror="return Roblox.Controls.Image.OnError(this)" alt="jail cell" /></a>
                                    </div>
                                    <div class="AssetDetails" style="height:90px;">
                                        <div class="AssetName">
                                            <a id="ctl00_cphRoblox_AssetRec_dlAssets_ctl00_AssetNameHyperLinkPortrait" href="/jail-cell-item?id=1861607">jail cell</a>
                                        </div>
                                        <div class="AssetCreator">
                                            <span class="Label">Creator:</span> <span class="Detail"><a id="ctl00_cphRoblox_AssetRec_dlAssets_ctl00_CreatorHyperLinkPortrait" href="User.aspx?ID=166431">Spartan774</a></span>
                                        </div>
                                    </div>
                                </div>
                            </td>!-->
                            <p>There's nothing here.</p>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div style="width: 703px; color: #000000; margin-bottom: 10px;">
            <a name="tabRegion">&nbsp;</a>
            <div id="ctl00_cphRoblox_TabbedInfo" class="tab_white_31h_container" style="visibility:hidden;">
                <div id="ctl00_cphRoblox_TabbedInfo_header">
                    <span id="__tab_ctl00_cphRoblox_TabbedInfo_CommentaryTab">
                        <h3 class="ajax_tab_label">
                            Commentary
                        </h3>
                    </span>
                </div>
                <div id="ctl00_cphRoblox_TabbedInfo_body">
                    <div id="ctl00_cphRoblox_TabbedInfo_CommentaryTab" style="display:none;visibility:hidden;">
                        <div id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsUpdatePanel">
                            <div class="CommentsContainer">
                                <a id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_LoadCommentsButton" class="GreenButton" href="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$cphRoblox$TabbedInfo$CommentaryTab$CommentsPane$LoadCommentsButton&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, true))"><span>Load comments (2)</span></a>
                                <div id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_PostAComment" class="PostAComment">
                                    <h3>Comment on this Model</h3>
                                    <div class="CommentText">
                                        <textarea name="ctl00$cphRoblox$TabbedInfo$CommentaryTab$CommentsPane$NewCommentTextBox" id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_NewCommentTextBox" class="MultilineTextBox" rows="5" onkeydown="limitText(this,200);" style="margin-bottom: 0px"></textarea>
                                        <p id="CharsRemaining"></p>
                                    </div>
                                    <div class="Buttons"><a id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_NewCommentButton" class="Button" href="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$cphRoblox$TabbedInfo$CommentaryTab$CommentsPane$NewCommentButton&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, true))">Post Comment</a></div>
                                </div>
                            </div>
                            <script type="text/javascript" language="javascript">
                                function limitText(limitField, limitNum)
                                {
                                    if (limitField.value.length > limitNum) 
                                    {
                                        limitField.value = limitField.value.substring(0, limitNum);
                                    }
                                    $('#CharsRemaining').html(Math.max(0, Math.min(200, limitNum - limitField.value.length)) + " characters remaining");
                                }
                            </script>   
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                var commentsLoaded = false;
                function LoadComments(sender, eventargs) {
                    if (!commentsLoaded) {
                        __doPostBack('ctl00$cphRoblox$TabbedInfo$CommentaryTab$CommentsPane$LoadCommentsButton','');
                        commentsLoaded = true;
                    }
                }
            </script>
        </div>
        <!--<div id="FreeGames">
            <span><b>Other free games and items:</b></span>
            <ul class='freegames' style='list-style: none; text-align: center;'>
                <li style='display: inline; margin-right: 10px;'><a href='/RBLK-Boise-State-Hockey-Stick-item?id=47643025' title='Free Games: [RBLK] Boise State Hockey Stick'>[RBLK] Boise State Hockey Stick</a></li>
                <li style='display: inline; margin-right: 10px;'><a href='/Security-item?id=47643115' title='Free Games: Security'>Security</a></li>
                <li style='display: inline; margin-right: 10px;'><a href='/ShockingGhost23s-Place-item?id=47643124' title='Free Games: ShockingGhost23's Place'>ShockingGhost23's Place</a></li>
                <li style='display: inline; margin-right: 10px;'><a href='/BD1GP-Race-Circut-Under-Contuction-item?id=47643126' title='Free Games: BD1GP Race Circut [Under Contuction]'>BD1GP Race Circut [Under Contuction]</a></li>
                <li style='display: inline; margin-right: 10px;'><a href='/Epic-swordfights-item?id=47643135' title='Free Games: Epic swordfights'>Epic swordfights</a></li>
                <li style='display: inline; margin-right: 10px;'><a href='/1234yodas-Place-item?id=47643225' title='Free Games: 1234yoda's Place'>1234yoda's Place</a></li>
            </ul>
            <span><b>Other game genres you may like:</b></span>
            <ul class='freegames' style='list-style: none; text-align: center;'>
                <li style='display: inline; margin-right: 10px;'><a href='scary-games' title='Scary games'>Scary games</a></li>
                <li style='display: inline; margin-right: 10px;'><a href='pirate-games' title='Pirate games'>Pirate games</a></li>
                <li style='display: inline; margin-right: 10px;'><a href='adventure-games' title='Adventure games'>Adventure games</a></li>
                <li style='display: inline; margin-right: 10px;'><a href='sports-games' title='Sports games'>Sports games</a></li>
            </ul>
        </div>!-->
    </div>
    <!--<div class="Ads_WideSkyscraper">
        <div id="ctl00_cphRoblox_adsWideSkyscraper_OutsideAdPanel" class="AdPanel">
            <iframe id="ctl00_cphRoblox_adsWideSkyscraper_AsyncAdIFrame" allowtransparency="true" frameborder="0" scrolling="no" height="600" src="/Ads/IFrameAdContent.aspx?v=2&amp;slot=Roblox_Item_Right_160x600&amp;format=skyscraper&amp;v=2" width="160"></iframe>
        </div>
        <a id="ctl00_cphRoblox_adsWideSkyscraper_ReportAdButton" title="click to report an offensive ad" class="BadAdButton" href="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$cphRoblox$adsWideSkyscraper$ReportAdButton&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, true))">[ report ]</a>
        <script type="text/javascript">
            $(function()
                     {
                      $(".AdPanel").css("z-index", 9998);
                     });
                 
        </script>
    </div>!-->
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
                <img id="ctl00_cphRoblox_Image22" src="/images/ProgressIndicator2.gif" alt="Processing..." align="middle" style="border-width:0px;" />&nbsp&nbsp; Processing transaction
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
        </div>
    </div>
</div>
@endsection