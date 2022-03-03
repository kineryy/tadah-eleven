@extends('layouts.app')

@section('content')
<script type="text/javascript">
    function GroupsSearch() {
        var search_text = $("#ctl00_cphRoblox_SearchTextBox").val();
        window.location.href = "Groups/Search.aspx?sort=Member+Count&filter=All&val=" + search_text;
    }
</script>
<div id="ctl00_cphRoblox_ContainerPanel">
    <div id="BrowseContainer" style="font-family: Verdana, Sans-Serif; text-align: left">
        <div style="width: 876px; height: 28px; clear: both; display: block; background-color: #006699;"
            class="StandardBox">
            <table border="0">
                <tr>
                    <td style="font-family: Verdana, Helvetica, Sans-Serif; font-size: 12pt; color: Black;
                        font-weight: bold; text-align: left;">
                        Search:
                    </td>
                    <td style="text-align: right;">
                        <span class="SearchBox">
                        <input name="ctl00$cphRoblox$SearchTextBox" type="text" maxlength="100" id="ctl00_cphRoblox_SearchTextBox" style="width: 400px;" /></span>
                        <span class="SearchButton">
                        <input type="submit" name="ctl00$cphRoblox$SearchButton" value="Search Users" onclick="doUserSearch()" id="ctl00_cphRoblox_SearchButton" /></span>
                        <input name="ctl00$cphRoblox$Button1" type="button" id="ctl00_cphRoblox_Button1" value="Search Groups" />
                        <input type="text" style="visibility: hidden; position: absolute">
                        <!-- Enter key submission hack - IE -->
                    </td>
                </tr>
            </table>
        </div>
        <div class="SearchError">
            <span id="ctl00_cphRoblox_QueryValidator" style="color:Red;display:none;"></span>
        </div>
        <div>
            <table class="Grid" cellspacing="0" cellpadding="4" border="0" id="ctl00_cphRoblox_gvUsersSearched" style="border-collapse:collapse;width:889px;">
                <tr class="GridHeader">
                    <th scope="col">Avatar</th>
                    <th scope="col">&nbsp;</th>
                    <th scope="col">Name</th>
                    <th scope="col">Blurb</th>
                    <th scope="col">Last Seen</th>
                </tr>
                @foreach ($users as $user)
                    <tr class="GridItem">
                        <td style="width:50px;">
                            <a id="ctl00_cphRoblox_gvUsersSearched_ctl02_hlAvatar" title="{{ $user->username }}" href="/User.aspx?ID=23161574" style="display:inline-block;height:48px;width:48px;cursor:pointer;"><img src="{{ route('users.thumbnail', $user->id) }}" height="48" width="48" border="0" onerror="return Roblox.Controls.Image.OnError(this)" alt="{{ $user->username }}" /></a>
                        </td>
                        <td style="width:7px;">
                            <span class="OnlineStatus">
                            <img id="ctl00_cphRoblox_gvUsersSearched_ctl02_iOnlineStatus" @if (Cache::has('last_online' . $user->id)) src="images/online.png" @else src="images/offline.png" @endif style="border-width:0px;" /></span>
                        </td>
                        <td>
                            <a id="ctl00_cphRoblox_gvUsersSearched_ctl02_hlName" href="{{ route('users.profile', $user->id) }}">{{ $user->username }}</a>
                        </td>
                        <td>
                            <div style="width:586px;overflow:hidden;word-wrap:break-word;">
                                <span id="ctl00_cphRoblox_gvUsersSearched_ctl02_lBlurb">{{ $user->blurb }}</span>
                            </div>
                        </td>
                        <td>
                            <span id="ctl00_cphRoblox_gvUsersSearched_ctl02_lblUserLocationOrLastSeen">{{ $user->last_online->diffForHumans() }}</span>
                        </td>
                    </tr>
                @endforeach
            </table>
            <br>
            <span><center>{{ $users->links('pagination.simple') }}</center></span>
        </div>
        <br style="clear:both" />
    </div>
</div>
@endsection

@section('scripts')
<script>
function doUserSearch() {
    const urlParams = new URLSearchParams(window.location.search);
    urlParams.set('search', document.getElementById('ctl00_cphRoblox_SearchTextBox').textContent)
}
</script>
@endsection