@extends('layouts.app')

@section('content')
<div id="CatalogContainer">
    <div style="width: 876px; height: 28px; clear: both; display: block; background-color: #006699;" class="StandardBox">
    <table width="876px" border="0">
        <tr>
            <td style="font-family: Verdana, Helvetica, Sans-Serif; font-size: 12pt; color: Black; font-weight: bold; width: 200px; text-align: left;">
                Catalog
            </td>
            <td style="width: 660px; text-align: right;">
                <input type="hidden" name="ctl00$cphRoblox$rbxCatalog$UserIDHiddenField" id="ctl00_cphRoblox_rbxCatalog_UserIDHiddenField" />
                <input name="ctl00$cphRoblox$rbxCatalog$SearchTextBox" type="text" maxlength="100" id="ctl00_cphRoblox_rbxCatalog_SearchTextBox" style="width: 520px;" />
                <input type="submit" name="ctl00$cphRoblox$rbxCatalog$SearchButton" value="Search" onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$cphRoblox$rbxCatalog$SearchButton&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, false))" id="ctl00_cphRoblox_rbxCatalog_SearchButton" />
                <input type="submit" name="ctl00$cphRoblox$rbxCatalog$ResetSearchButton" value="Reset" onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$cphRoblox$rbxCatalog$ResetSearchButton&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, false))" id="ctl00_cphRoblox_rbxCatalog_ResetSearchButton" />
            </td>
        </tr>
    </table>
    </div>
    <div id="SearchBar" style="display: none;" class="SearchBar">
    <span class="SearchBox"></span><span class="SearchButton"></span><span class="SearchLinks">
    <sup>&nbsp;|&nbsp;</sup><a href="#"><sup>Tips</sup> <span>Exact Phrase: "red brick"<br />
    Find ALL Terms: red and brick =OR= red + brick<br />
    Find ANY Term: red or brick =OR= red | brick<br />
    Wildcard Suffix: tel* (Finds teleport, telamon, telephone, etc.)<br />
    Terms Near each other: red near brick =OR= red ~ brick<br />
    Excluding Terms: red and not brick =OR= red - brick<br />
    Grouping operations: brick and (red or blue) =OR= brick + (red | blue)<br />
    Combinations: "red brick" and not (tele* or tower) =OR= "red brick" - (tele* | tower)<br />
    Wildcard Prefix is NOT supported: *port will not find teleport, airport, etc. </span>
    </a></span>
    </div>
    <div class="SearchError">
    <span id="ctl00_cphRoblox_rbxCatalog_QueryValidator" style="color:Red;display:none;"></span>
    </div>
    <!--[if IE 6]>
    <table width="900px">
    <td width="210px" align="left" valign="top">
        <![endif]-->
        <div style="float: left; margin-right: 8px">
            <div class="StandardBox" style="width: 185px">
                <div id="BrowseMode">
                <h2><a id="ctl00_cphRoblox_rbxCatalog_CafePressHyperLink" href="#" target="_blank">Buy {{ config('app.name') }} Stuff!</a></h2>
                <br />
                <h2><a id="ctl00_cphRoblox_rbxCatalog_CurrencyPurchaseHyperLink" href="#">Buy {{ config('app.currency_name_multiple') }}!</a></h2>
                <br />
                <h2 style="margin-top:20px;">Browse</h2>
                <ul>
                    <li class='' >
                        <h3><a id="ctl00_cphRoblox_rbxCatalog_BrowseModeFeaturedSelector" href="#">Featured</a></h3>
                    </li>
                    <li class='' >
                        <h3><a id="ctl00_cphRoblox_rbxCatalog_BrowseModeTopFavoritesSelector" href="#">Top Favorites</a></h3>
                    </li>
                    <li class='' >
                        <h3><a id="ctl00_cphRoblox_rbxCatalog_BrowseModeBestSellingSelector" href="#">Best Selling</a></h3>
                    </li>
                    <li class='' >
                        <h3><a id="ctl00_cphRoblox_rbxCatalog_BrowseModeRecentlyUpdatedSelector" href="#">Recently Updated</a></h3>
                    </li>
                    <li class='Selected' >
                        <h3><a id="ctl00_cphRoblox_rbxCatalog_BrowseModeForSaleSelector" href="#">For Sale</a></h3>
                    </li>
                    <li class='' >
                        <h3><a id="ctl00_cphRoblox_rbxCatalog_BrowseModePublicDomainSelector" href="#">Public Domain</a></h3>
                    </li>
                    <li class='' >
                        <h3><a id="ctl00_cphRoblox_rbxCatalog_BrowseModeCollectibleSelector" href="#">Collectible</a></h3>
                    </li>
                    <li visible="" class='' >
                        <h3><a id="ctl00_cphRoblox_rbxCatalog_BrowseModeAssetSetsSelector" href="#">Sets</a></h3>
                    </li>
                </ul>
                </div>
                <div id="ctl00_cphRoblox_rbxCatalog_Category">
                <h2>Category</h2>
                <ul>
                    <li class=''>
                        <h3><a id="ctl00_cphRoblox_rbxCatalog_AssetCategoryRepeater_ctl01_AssetCategorySelector" href="{{ route('catalog.index', 'heads') }}">Heads</a></h3>
                    </li>
                    <li class=''>
                        <h3><a id="ctl00_cphRoblox_rbxCatalog_AssetCategoryRepeater_ctl02_AssetCategorySelector" href="{{ route('catalog.index', 'faces') }}">Faces</a></h3>
                    </li>
                    <li class=''>
                        <h3><a id="ctl00_cphRoblox_rbxCatalog_AssetCategoryRepeater_ctl03_AssetCategorySelector" href="{{ route('catalog.index', 'gears') }}">Gear</a></h3>
                    </li>
                    <li class='Selected'>
                        <h3><a id="ctl00_cphRoblox_rbxCatalog_AssetCategoryRepeater_ctl04_AssetCategorySelector" href="{{ route('catalog.index', 'hats') }}">Hats</a></h3>
                    </li>
                    <li class=''>
                        <h3><a id="ctl00_cphRoblox_rbxCatalog_AssetCategoryRepeater_ctl05_AssetCategorySelector" href="{{ route('catalog.index', 'tshirts') }}">T-Shirts</a></h3>
                    </li>
                    <li class=''>
                        <h3><a id="ctl00_cphRoblox_rbxCatalog_AssetCategoryRepeater_ctl06_AssetCategorySelector" href="{{ route('catalog.index', 'shirts') }}">Shirts</a></h3>
                    </li>
                    <li class=''>
                        <h3><a id="ctl00_cphRoblox_rbxCatalog_AssetCategoryRepeater_ctl07_AssetCategorySelector" href="{{ route('catalog.index', 'pants') }}">Pants</a></h3>
                    </li>
                    <li class=''>
                        <h3><a id="ctl00_cphRoblox_rbxCatalog_AssetCategoryRepeater_ctl08_AssetCategorySelector" href="{{ route('catalog.index', 'packages') }}">Packages</a></h3>
                    </li>
                    <li class=''>
                        <h3><a id="ctl00_cphRoblox_rbxCatalog_AssetCategoryRepeater_ctl09_AssetCategorySelector" href="{{ route('catalog.index', 'images') }}">Images</a></h3>
                    </li>
                    <li class=''>
                        <h3><a id="ctl00_cphRoblox_rbxCatalog_AssetCategoryRepeater_ctl10_AssetCategorySelector" href="{{ route('catalog.index', 'models') }}">Models</a></h3>
                    </li>
                </ul>
                </div>
            </div>
            <br clear="all" />
            <div class="StandardBox" style="width: 185px;">
                <b style="font-size: 14px; color: #990000">LEGEND</b><br />
                <br />
                <img src="/images/icons/overlay_bcOnly.png" /><br />
                <b>Builders Club Only</b> items are those which can only be purchased by users with a <a href="#" alt="Builders Club!">Builders Club</a> membership.<br />
                <br />
                <img src="/images/assetIcons/limited.png" /><br />
                <b>Limited Items</b> are those which were once sold by Roblox and will not be sold again. Users who own these items can re-sell them to other users for the price of their choice.<br />
                <br />
                <img src="/images/assetIcons/limitedunique.png" /><br />
                <b>Limited Unique Items</b> are sold by Roblox until they run out (we could release, say, 100 of a certain hat.) When you buy these, they are stamped with a serial number (i.e. 7 / 100) that shows which one you got.<br />
                <br />
                Once these items run out, they can also be sold to other users.
            </div>
        </div>
        <div id="ctl00_cphRoblox_rbxCatalog_CreateSetPanelDiv" class="createSetPanelPopup" style="width: 400px; height: 100%; padding: 0px; float: left; display: none">
            <div>
                <div style="width: 100%; height: 100%; top: 0; left: 0; z-index: 249; position: fixed; opacity:0.5;filter:alpha(opacity=50); background-color: grey;">
                </div>
                <div style="background-color: #ffffdd; border-width: 3px; border-style: solid; border-color: Gray; 
                padding: 3px; float: left; width: 400px; position: fixed; top: 25%; left: 40%; z-index: 250;">
                <div class="StandardBoxHeader" style="float: left; width: 380px"><span>Create A Set</span></div>
                <div id="ctl00_cphRoblox_rbxCatalog_CreateSetPanel1_CreateSetInnerDIV" style="background-color: #ffffdd; width: 380px; padding: 10px; float: left">
                    <div style="float: left">
                        <p style="margin-bottom: 0px">
                            <span style="width: 40px">Name:  </span>
                            <span id="NameDisplay" style="font-weight: bold; font-style: italic;" ></span>
                        </p>
                        <div id="ctl00_cphRoblox_rbxCatalog_CreateSetPanel1_NameDiv">
                            <input name="ctl00$cphRoblox$rbxCatalog$CreateSetPanel1$Name" type="text" maxlength="100" id="ctl00_cphRoblox_rbxCatalog_CreateSetPanel1_Name" onkeydown="enableButton();" onkeyup="ismaxlength(this); updateRegularNameDisplay(this);" style="width:250px;" />
                        </div>
                        <span id="ctl00_cphRoblox_rbxCatalog_CreateSetPanel1_CustomValidatorSetNameProfanity" style="color:Red;display:none;">This set name contains some improper words.</span>
                        <p style="margin-bottom: 0px">Description:</p>
                        <textarea name="ctl00$cphRoblox$rbxCatalog$CreateSetPanel1$Description" rows="2" cols="20" id="ctl00_cphRoblox_rbxCatalog_CreateSetPanel1_Description" onkeyup="return ismaxlength(this);" style="width: 376px; height: 100px"></textarea>
                        <p style="width: 40px; margin-bottom: 0px">Image:</p>
                        <input type="file" name="ctl00$cphRoblox$rbxCatalog$CreateSetPanel1$Uploader" id="ctl00_cphRoblox_rbxCatalog_CreateSetPanel1_Uploader" onchange="fileUploadIsReady = true; enableButton();" style="width:350px;" />
                        <div id="ButtonDiv" style="text-align: center; margin: 10px 0px 10px 0px">
                            <input type="submit" name="ctl00$cphRoblox$rbxCatalog$CreateSetPanel1$CreateSet" value="Create Set" id="ctl00_cphRoblox_rbxCatalog_CreateSetPanel1_CreateSet" disabled="disabled" />
                            <input type="button" value="Cancel" id="CancelButton" name="CancelButton" onclick="$('.createSetPanelPopup').hide();" />
                        </div>
                    </div>
                </div>
                <script type="text/javascript" language="javascript">
                    var userName = 'Cubut';
                    var maxAdjectives = '2';
                    var maxCategories = '2';
                    var superSafeAdjectiveListClientId = 'ctl00_cphRoblox_rbxCatalog_CreateSetPanel1_SuperSafeAdjectiveChoices';
                    var superSafeCategoryListClientId = 'ctl00_cphRoblox_rbxCatalog_CreateSetPanel1_SuperSafeCategoryChoices';
                    var superSafeNameListClientId = 'ctl00_cphRoblox_rbxCatalog_CreateSetPanel1_SuperSafeNameChoice';
                    var fileUploadIsReady = false;
                    var nameClientID = 'ctl00_cphRoblox_rbxCatalog_CreateSetPanel1_Name';
                    var createSetClientID = 'ctl00_cphRoblox_rbxCatalog_CreateSetPanel1_CreateSet';
                    var errorOnPage = 'False';
                    
                    var prevSelected = [];
                    
                    $(document).ready(function() { if (errorOnPage == "True") { $('.createSetPanelPopup').show(); } });
                </script>
                <script src="/UserControls/CreateSetPanel.js" type="text/javascript" language=javascript></script>
                </div>
            </div>
        </div>
        <!--[if IE 6]>
    </td>
    <td valign="top" align="left">
        <![endif]-->
        <div class="Assets">
            <div id="ctl00_cphRoblox_rbxCatalog_HeaderPagerPanel" class="HeaderPager" style="display: none;">
                <a id="ctl00_cphRoblox_rbxCatalog_HeaderPagerHyperLink_Previous" href="Catalog.aspx?m=ForSale&amp;c=8&amp;t=PastWeek&amp;d=All&amp;q=&amp;p=3&amp;mn=-9223372036854775808&amp;mx=9223372036854775807"><span class="NavigationIndicators">&lt;&lt;</span> Previous</a>
                <span id="ctl00_cphRoblox_rbxCatalog_HeaderPagerLabel">Page 4 of 75</span>
                <a id="ctl00_cphRoblox_rbxCatalog_HeaderPagerHyperLink_Next" href="Catalog.aspx?m=ForSale&amp;c=8&amp;t=PastWeek&amp;d=All&amp;q=&amp;p=5&amp;mn=-9223372036854775808&amp;mx=9223372036854775807">Next <span class="NavigationIndicators">&gt;&gt;</span></a>
            </div>
            <div class="StandardBoxHeader">
                <span id="ctl00_cphRoblox_rbxCatalog_AssetsDisplaySetLabel">{{ $type }} For Sale</span>
            </div>
            <div class="StandardBox">
                <table id="ctl00_cphRoblox_rbxCatalog_AssetsDataList" cellspacing="0" align="Center" border="0" style="border-collapse:collapse;">
                @foreach (array_chunk($items->items(), 5) as $rowitems)
                <tr>
                    @foreach ($rowitems as $item)
                        <td valign="top">
                            <div class="Asset" style="margin-left:5px;margin-right:5px;">
                                <div class="AssetThumbnail">
                                    <a id="ctl00_cphRoblox_rbxCatalog_AssetsDataList_ctl00_AssetThumbnailHyperLink" title="{{ $item->name }}" href="{{ route('catalog.item', $item->id) }}" style="display:inline-block;height:110px;width:110px;cursor:pointer;"><img width="110" height="110" src="@if ($item->thumbnail_url) {{ $item->thumbnail_url }} @else {{ route('catalog.getthumbnail', $item->id) }} @endif" border="0" onerror="return Roblox.Controls.Image.OnError(this)" alt="{{ $item->name }}" /></a>
                                </div>
                                <div class="AssetDetails">
                                    <div class="AssetName"><a id="ctl00_cphRoblox_rbxCatalog_AssetsDataList_ctl00_AssetNameHyperLink" href="{{ route('catalog.item', $item->id) }}">{{ $item->name }}</a></div>
                                    <div class="AssetLastUpdate">
                                        <span class="Label">Updated:</span>
                                        <span class="Detail">{{ $item->updated_at->diffForHumans() }}</span>
                                    </div>
                                    <div class="AssetCreator">
                                        <span class="Label">Creator:</span>
                                        <span class="Detail"><a id="ctl00_cphRoblox_rbxCatalog_AssetsDataList_ctl00_CreatorHyperLink" href="{{ route('users.profile', $item->user->id) }}">{{ $item->user->username }}</a></span>
                                    </div>
                                    <div class="AssetsSold">
                                        <span class="Label">Number Sold:</span> 
                                        <span class="Detail">{{ number_format($item->sales) }}</span>
                                    </div>
                                    <!--<div class="AssetFavorites">
                                        <span class="Label">Favorited:</span>
                                        <span class="Detail">0 times</span>
                                    </div>!-->
                                    <div class="AssetPrice">
                                        <span class="PriceInRobux">D$: {{ number_format($item->price) }}</span>
                                    </div>
                                </div>
                            </div>
                        </td>
                    @endforeach
                </tr>
                @endforeach
                <tr>
                    <td colspan="5">
                        <div id="ctl00_cphRoblox_rbxCatalog_AssetsDataList_ctl20_CatalogDescriptionPanel" style="float: left; width: 630px; font-size: 0.9em; padding: 10px; border-top: 1px solid #AAAAAA;">
                            Avatar Items - {{ config('app.name') }} has a full virtual goods catalog with avatar items and other virtual items. Create a free account on {{ config('app.name') }} and start collecting 
                            <h1 style="display:inline; font-size:100%; font-weight:normal;">virtual avatar items</h1>
                            , virtual goods, virtual items, and other gear for your virtual avatars.
                        </div>
                    </td>
                </tr>
                </table>
            </div>
            <div id="ctl00_cphRoblox_rbxCatalog_FooterPagerPanel" class="HeaderPager">
                {{ $items->links('pagination.simple') }}
            </div>
        </div>
        <!--[if IE 6]>
    </td>
    </table>
    <![endif]-->
    <div style="clear: both;"></div>
</div>
@endsection
