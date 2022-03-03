@extends('layouts.app')

@section('content')
<table width="100%" cellspacing="0" cellpadding="0" border="0">
    <tr>
        <td>
        </td>
    </tr>
    <tr valign="bottom">
        <td>
            <table width="100%" height="100%" cellspacing="0" cellpadding="0" border="0">
                <tr valign="top">
                    <!-- left column -->
                    <td Width="12px">
                    </td>
                    <!-- center column -->
                    <td id="ctl00_cphRoblox_CenterColumn" class="CenterColumn">
                        <br>
                        <span id="ctl00_cphRoblox_ThreadView1">
                            <table cellPadding="0" width="100%">
                                <tr>
                                    <td colspan="2" align="left">
                                        <span id="ctl00_cphRoblox_ThreadView1_ctl00_Whereami1" NAME="Whereami1">
                                            <table cellPadding="0" cellSpacing="0" width="100%">
                                                <tr>
                                                    <td valign="top" align="left" width="1px">
                                                        <nobr>
                                                            <a id="ctl00_cphRoblox_ThreadView1_ctl00_Whereami1_ctl00_LinkHome" class="linkMenuSink" href="{{ route('forum.index') }}">{{ config('app.name') }} Forum</a>
                                                        </nobr>
                                                    </td>
                                                    <td id="ctl00_cphRoblox_ThreadView1_ctl00_Whereami1_ctl00_ForumGroupMenu" class="popupMenuSink" valign="top" align="left" width="1px">
                                                        <nobr>
                                                            <span id="ctl00_cphRoblox_ThreadView1_ctl00_Whereami1_ctl00_ForumGroupSeparator" class="normalTextSmallBold">&nbsp;&gt;</span>
                                                            <a id="ctl00_cphRoblox_ThreadView1_ctl00_Whereami1_ctl00_LinkForumGroup" class="linkMenuSink" href="{{ route('forum.category', $category->id) }}">{{ $category->name }}</a>
                                                        </nobr>
                                                    </td>
                                                    <td id="ctl00_cphRoblox_ThreadView1_ctl00_Whereami1_ctl00_PostMenu" class="popupMenuSink" valign="top" align="left" width="1px">
                                                        <nobr>
                                                        </nobr>
                                                    </td>
                                                    <td valign="top" align="left" width="*">&nbsp;</td>
                                                </tr>
                                            </table>
                                            <span id="ctl00_cphRoblox_ThreadView1_ctl00_Whereami1_ctl00_MenuScript"></span>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    @if (!$category->admin_only)
                                    <td vAlign="bottom" align="left"><a id="ctl00_cphRoblox_ThreadView1_ctl00_NewThreadLinkTop" href="{{ route('forum.createthread', $category->id) }}"><img id="ctl00_cphRoblox_ThreadView1_ctl00_NewThreadImageTop" src="/ForumC/skins/default/images/newtopic.gif" style="border-width:0px;" /></a></td>
                                    @else
                                        @if (Auth::user()->admin)
                                        <td vAlign="bottom" align="left"><a id="ctl00_cphRoblox_ThreadView1_ctl00_NewThreadLinkTop" href="{{ route('forum.createthread', $category->id) }}"><img id="ctl00_cphRoblox_ThreadView1_ctl00_NewThreadImageTop" src="/ForumC/skins/default/images/newtopic.gif" style="border-width:0px;" /></a></td>
                                        @endif
                                    @endif
                                    <TD align="right"><SPAN class="normalTextSmallBold">Search 
                                        this forum: </SPAN>
                                        <input name="ctl00$cphRoblox$ThreadView1$ctl00$Search" type="text" id="ctl00_cphRoblox_ThreadView1_ctl00_Search" />
                                        <input type="submit" name="ctl00$cphRoblox$ThreadView1$ctl00$SearchButton" value=" Go " id="ctl00_cphRoblox_ThreadView1_ctl00_SearchButton" />
                                    </TD>
                                </tr>
                                <tr>
                                    <td vAlign="top" colSpan="2">
                                        <table id="ctl00_cphRoblox_ThreadView1_ctl00_ThreadList" class="tableBorder" cellspacing="1" cellpadding="3" border="0" style="width:100%;">
                                            <tr>
                                                <th class="tableHeaderText" align="left" colspan="2" style="height:25px;">&nbsp;Thread&nbsp;</th>
                                                <th class="tableHeaderText" align="center" style="white-space:nowrap;">&nbsp;Started By&nbsp;</th>
                                                <th class="tableHeaderText" align="center">&nbsp;Replies&nbsp;</th>
                                                <th class="tableHeaderText" align="center" style="white-space:nowrap;">&nbsp;Last Post&nbsp;</th>
                                            </tr>
                                            @foreach ($posts as $post)
                                            <tr>
                                                <td class="forumRow" align="center" valign="middle" style="width:25px;"><img title="Post" src="@if ($post->stickied) /ForumC/skins/default/images/topic-popular.gif @else /ForumC/skins/default/images/topic_notread.gif @endif" style="border-width:0px;" /></td>
                                                <td class="forumRow" style="height:25px;"><a class="linkSmallBold" href="{{ route('forum.getthread', $post->id) }}">{{ $post->title }}</a></td>
                                                <td class="forumRowHighlight" align="left" style="width:100px;">&nbsp<a class="linkSmall" href="{{ route('users.profile', $post->user->id) }}">{{ $post->user->username }}</a></td>
                                                <td class="forumRowHighlight" align="center" style="width:50px;"><span class="normalTextSmaller">{{ $post->replies->count() }}</span></td>
                                                <td class="forumRowHighlight" align="center" style="width:140px;white-space:nowrap;"><span class="normalTextSmaller"><b>{{ $post->updated_at->diffForHumans() }}</b></span></td>
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <td class="forumHeaderBackgroundAlternate" colspan="6">&nbsp;</td>
                                            </tr>
                                        </table>
                                        <span id="ctl00_cphRoblox_ThreadView1_ctl00_Pager">
                                            <table cellspacing="0" cellpadding="0" border="0" style="width:100%;border-collapse:collapse;">
                                                <tr>
                                                    {{ $posts->links('pagination.simple') }}
                                                </tr>
                                            </table>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        &nbsp;
                                    </td>
                                </tr>
                            </table>
                        </span>
                    </td>
                    <td class="CenterColumn">&nbsp;&nbsp;&nbsp;</td>
                    <!-- right margin -->
                </tr>
            </table>
        </td>
    </tr>
</table>
@endsection