@extends('layouts.app')

@section('content')


<table width="100%" cellspacing="0" cellpadding="0" border="0">
    <tbody>
        <tr>
            <td>
            </td>
        </tr>
        <tr valign="bottom">
            <td>
                <table width="100%" height="100%" cellspacing="0" cellpadding="0" border="0">
                    <tbody>
                        <tr valign="top">
                            <!-- left column -->
                            <td class="LeftColumn">&nbsp;&nbsp;&nbsp;</td>
                            <td id="ctl00_cphRoblox_LeftColumn" class="LeftColumn" width="180" nowrap="nowrap">
                                <p>
                                    <span id="ctl00_cphRoblox_SearchRedirect">
                                    </span>
                                </p>
                                <table class="tableBorder" width="100%" cellspacing="1" cellpadding="3">
                                    <tbody>
                                        <tr>
                                            <th class="tableHeaderText" colspan="2" align="left">
                                                &nbsp;Search Forums
                                            </th>
                                        </tr>
                                        <tr>
                                            <td class="forumRow" colspan="2" valign="top" align="left">
                                                <table cellspacing="1" cellpadding="2" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <input name="ctl00$cphRoblox$SearchRedirect$ctl00$SearchText" type="text" maxlength="50" id="ctl00_cphRoblox_SearchRedirect_ctl00_SearchText" size="10">
                                                            </td>
                                                            <td colspan="2" align="right">
                                                                <input type="submit" name="ctl00$cphRoblox$SearchRedirect$ctl00$SearchButton" value="Search" id="ctl00_cphRoblox_SearchRedirect_ctl00_SearchButton">
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <span class="normalTextSmall">
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                                <p></p>
                            </td>
                            <td class="LeftColumn">&nbsp;&nbsp;&nbsp;
                            </td>
                            <!-- center column -->
                            <td class="CenterColumn">&nbsp;&nbsp;&nbsp;</td>
                            <td id="ctl00_cphRoblox_CenterColumn" class="CenterColumn" width="95%">
                                <br>
                                <table class="tableBorder" width="100%" cellspacing="1" cellpadding="2" border="0">
                                    <tbody>
                                        <tr>
                                            <th class="tableHeaderText" colspan="2">Forum</th>
                                            <th class="tableHeaderText" style="width:50px;white-space:nowrap;">&nbsp;&nbsp;Threads&nbsp;&nbsp;</th>
                                            <th class="tableHeaderText" style="width:50px;white-space:nowrap;">&nbsp;&nbsp;Posts&nbsp;&nbsp;</th>
                                            <th class="tableHeaderText" style="width:135px;white-space:nowrap;">&nbsp;Last Post&nbsp;</th>
                                        </tr>
                                        <tr id="ctl00_cphRoblox_ForumGroupRepeater1_ctl01_ForumGroup">
                                            <td class="forumHeaderBackgroundAlternate" colspan="5" style="height:20px;"><a id="ctl00_cphRoblox_ForumGroupRepeater1_ctl01_GroupTitle" class="forumTitle">{{ config('app.name') }}</td>
                                        </tr>
                                        @foreach ($categories as $category)
                                        <tr>
                                            <td class="forumRow" style="width:34px;white-space:nowrap;" valign="top" align="center"><img src="ForumC/skins/default/images/forum_status.gif" style="width:34px;border-width:0px;"></td>
                                            <td class="forumRow" style="width:80%;"><a class="forumTitle" href="{{ route('forum.category', $category->id) }}">{{ $category->name }}</a><span class="normalTextSmall"><br>{{ $category->description }}</span></td>
                                            <td class="forumRowHighlight" align="center"><span class="normalTextSmaller">{{ $category->threads()->count() }}</span></td>
                                            <td class="forumRowHighlight" align="center"><span class="normalTextSmaller">{{ $category->threads()->count() + $category->posts()->count() }}</span></td>
                                            <td class="forumRowHighlight" align="center"><span class="normalTextSmaller"><span><b>{{ $category->updated_at->diffForHumans() }}</b></span></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <p></p>
                            </td>
                            <td class="CenterColumn">&nbsp;&nbsp;&nbsp;</td>
                            <!-- right margin -->
                            <td class="RightColumn">&nbsp;&nbsp;&nbsp;</td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
@endsection