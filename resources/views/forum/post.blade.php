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
                    <td>&nbsp; &nbsp; &nbsp;</td>
                    <!-- center column -->
                    <td id="ctl00_cphRoblox_CenterColumn" width="95%" class="CenterColumn">
                        <br>
                        <span id="ctl00_cphRoblox_PostView1">
                            <table cellPadding="0" width="100%">
                                <tr>
                                    <td align="left" colSpan="2">
                                        <span id="ctl00_cphRoblox_PostView1_ctl00_Whereami1" NAME="Whereami1">
                                            <table cellPadding="0" cellSpacing="0" width="100%">
                                                <tr>
                                                    <td valign="top" align="left" width="1px">
                                                        <nobr>
                                                            <a id="ctl00_cphRoblox_PostView1_ctl00_Whereami2_ctl00_LinkHome" class="linkMenuSink" href="{{ route('forum.index') }}">{{ config('app.name') }} Forum</a>
                                                        </nobr>
                                                    </td>
                                                    <td id="ctl00_cphRoblox_PostView1_ctl00_Whereami2_ctl00_ForumGroupMenu" class="popupMenuSink" valign="top" align="left" width="1px">
                                                        <nobr>
                                                            <span id="ctl00_cphRoblox_PostView1_ctl00_Whereami2_ctl00_ForumGroupSeparator" class="normalTextSmallBold">&nbsp;&gt;</span>
                                                            <a id="ctl00_cphRoblox_PostView1_ctl00_Whereami2_ctl00_LinkForumGroup" class="linkMenuSink" href="{{ route('forum.category', $post->category->id) }}">{{ $post->category->name }}</a>
                                                        </nobr>
                                                    </td>
                                                    <td id="ctl00_cphRoblox_PostView1_ctl00_Whereami2_ctl00_PostMenu" class="popupMenuSink" valign="top" align="left" width="1px">
                                                        <nobr>
                                                            <span id="ctl00_cphRoblox_PostView1_ctl00_Whereami2_ctl00_PostSeparator" class="normalTextSmallBold">&nbsp;&gt;</span>
                                                            <a id="ctl00_cphRoblox_PostView1_ctl00_Whereami2_ctl00_LinkPost" class="linkMenuSink" href="{{ route('forum.getthread', $post->id) }}">{{ $post->title }}</a>
                                                        </nobr>
                                                    </td>
                                                    <td valign="top" align="left" width="*">&nbsp;</td>
                                                </tr>
                                            </table>
                                            <span id="ctl00_cphRoblox_PostView1_ctl00_Whereami1_ctl00_MenuScript"></span>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" colSpan="2">&nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td colSpan="2">
                                        <table id="ctl00_cphRoblox_PostView1_ctl00_PostList" class="tableBorder" cellspacing="1" cellpadding="0" border="0" style="width:100%;">
                                            <tr>
                                                <td class="forumHeaderBackgroundAlternate" colspan="2" style="height:20px;">
                                                    <table cellspacing="0" cellpadding="0" border="0" style="width:100%;border-collapse:collapse;">
                                                        <tr>
                                                            <td align="left"></td>
                                                            <td align="right"><a id="ctl00_cphRoblox_PostView1_ctl00_PostList_ctl00_PreviousThread" class="linkSmallBold" href="{{ route('forum.getthread', $post->id - 1) }}">Previous Thread</a>&nbsp;<span class="normalTextSmallBold">::</span>&nbsp;<a id="ctl00_cphRoblox_PostView1_ctl00_PostList_ctl00_NextThread" class="linkSmallBold" href="{{ route('forum.getthread', $post->id + 1) }}">Next Thread</a>&nbsp;</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="tableHeaderText" align="left" style="height:25px;width:100px;">&nbsp;Author</th>
                                                <th class="tableHeaderText" align="left" style="width:85%;">&nbsp;Thread: {{ $post->title }}</th>
                                            </tr>
                                            <tr>
                                                <td class="forumRow" valign="top" style="width:150px;white-space:nowrap;">
                                                    <table border="0">
                                                        <tr>
                                                            <td><img @if (Cache::has('last_online' . $post->user->id)) src="/ForumC/skins/default/images/user_IsOnline.gif" @else src="/ForumC/skins/default/images/user_IsOffline.gif" @endif style="border-width:0px;" />&nbsp;<a class="normalTextSmallBold" href="{{ route('users.profile', $post->user->id) }}">{{ $post->user->username }}</a><br></td>
                                                        </tr>
                                                        <tr>
                                                            <td><a href="{{ route('users.profile', $post->user->id) }}" style="width:100px;height:100px;position:relative;"><img width="100" height="100" src="{{ route('users.thumbnail', $post->user->id) }}" style="border-width:0px;" /></a></td>
                                                        </tr>
                                                        @if ($post->user->admin)
                                                        <tr>
                                                            <td><img src="/ForumC/skins/default/images/users_moderator.gif" alt="Forum Moderator" style="border-width:0px;"></td>
                                                        </tr>
                                                        @endif
                                                        <tr>
                                                            <td><span class="normalTextSmaller"><b>Joined:</b> {{ date('m/d/Y', strtotime($post->user->joined)) }}</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td><span class="normalTextSmaller"><b>Total Posts: </b>{{ $post->user->posts->count() + $post->user->threads->count() }}</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td><span class="normalTextSmaller primaryGroupInfo" username="{{ $post->user->username }}" style="display:none;"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>&nbsp;</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td class="forumRow" valign="top">
                                                    <table cellspacing="0" cellpadding="3" border="0" style="width:100%;border-collapse:collapse;table-layout:fixed;overflow:hidden;word-wrap:break-word;">
                                                        <tr>
                                                            <td id="thread{{ $post->id }}" class="forumRowHighlight">
                                                                <span class="normalTextSmallBold">
                                                                    {{ $post->title }}
                                                                </span>
                                                                <br><span class="normalTextSmaller"> Posted: </span><span class="normalTextSmaller">{{ date('m-d-Y g:i A', strtotime($post->created_at)) }} ({{ $post->created_at->diffForHumans() }})</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                        <td colspan="2"><span class="normalTextSmall">@parsedown($post->body)</span></td>
                                                        </tr><tr>
                                                        <td colspan="2"><span class="normalTextSmaller"></span></td>
                                                        </tr><tr>
                                                        <td style="height:2px;"></td>
                                                        </tr><tr>
                                                        <td colspan="2">
                                                            @if (!$post->locked)
                                                            <a style="text-decoration: none; display: inline;" href="{{ route('forum.createreply', $post->id) }}"><img style="display: inline;" src="/ForumC/skins/default/images/newpost.gif" border="0">
                                                            @endif
                                                            @if (Auth::user()->admin)
                                                            <div style="display: inline; float: right;">
                                                                <form style="display: inline;" method="POST" action="{{ route('forum.togglelock', $post->id)  }}">
                                                                    @csrf
                                                    
                                                                    <button class="Button" type="submit">@if ($post->locked) Unlock @else Lock @endif</button>
                                                                </form>
                                                                <form style="display: inline;" method="POST" action="{{ route('forum.togglesticky', $post->id)  }}">
                                                                    @csrf
                                                    
                                                                    <button class="Button" type="submit">@if ($post->stickied) Unsticky @else Sticky @endif</button>
                                                                </form>
                                                                <a class="btn btn-primary btn-sm" href="{{ route('forum.editthread', $post->id) }}"><button class="Button">Edit</button></a>
                                                                <form style="display: inline;" method="POST" action="{{ route('forum.deletethread', $post->id) }}">
                                                                    @csrf
                                                    
                                                                    <button class="Button" type="submit">Delete</button>
                                                                </form>
                                                            </div>
                                                            @endif
                                                        </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            @foreach ($replies as $reply)
                                            <tr>
                                                <td class="forumRow" valign="top" style="width:150px;white-space:nowrap;">
                                                    <table border="0">
                                                        <tr>
                                                            <td><img @if (Cache::has('last_online' . $reply->user->id)) src="/ForumC/skins/default/images/user_IsOnline.gif" @else src="/ForumC/skins/default/images/user_IsOffline.gif" @endif style="border-width:0px;" />&nbsp;<a class="normalTextSmallBold" href="{{ route('users.profile', $reply->user->id) }}">{{ $reply->user->username }}</a><br></td>
                                                        </tr>
                                                        <tr>
                                                            <td><a href="{{ route('users.profile', $reply->user->id) }}" style="width:100px;height:100px;position:relative;"><img width="100" height="100" src="{{ route('users.thumbnail', $reply->user->id) }}" style="border-width:0px;" /></a></td>
                                                        </tr>
                                                        @if ($reply->user->admin)
                                                        <tr>
                                                            <td><img src="/ForumC/skins/default/images/users_moderator.gif" alt="Forum Moderator" style="border-width:0px;"></td>
                                                        </tr>
                                                        @endif
                                                        <tr>
                                                            <td><span class="normalTextSmaller"><b>Joined:</b> {{ date('m/d/Y', strtotime($reply->user->joined)) }}</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td><span class="normalTextSmaller"><b>Total posts: </b>{{ $reply->user->posts->count() + $reply->user->threads->count() }}</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td><span class="normalTextSmaller primaryGroupInfo" username="{{ $reply->user->username }}" style="display:none;"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>&nbsp;</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td class="forumRow" valign="top">
                                                    <table cellspacing="0" cellpadding="3" border="0" style="width:100%;border-collapse:collapse;table-layout:fixed;overflow:hidden;word-wrap:break-word;">
                                                        <tr>
                                                            <td id="reply{{ $reply->id }}" class="forumRowHighlight">
                                                                <span class="normalTextSmallBold">
                                                                    Re: {{ $post->title }}
                                                                </span>
                                                                <br><span class="normalTextSmaller"> Posted: </span><span class="normalTextSmaller">{{ date('F j, Y, g:i A', strtotime($reply->created_at)) }} ({{ $reply->created_at->diffForHumans() }})</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                        <td colspan="2"><span class="normalTextSmall">@parsedown($reply->body)</span></td>
                                                        </tr><tr>
                                                        <td colspan="2"><span class="normalTextSmaller"></span></td>
                                                        </tr><tr>
                                                            <td style="height:2px;"></td>
                                                        </tr><tr>
                                                        <td colspan="2">
                                                            @if (!$post->locked)
                                                            <a style="text-decoration: none; display: inline;" href="{{ route('forum.createreply', $post->id) }}"><img style="display: inline;" src="/ForumC/skins/default/images/newpost.gif" border="0">
                                                            @endif
                                                            @if (Auth::user()->admin)
                                                            <div style="display: inline; float: right;">
                                                                <a class="btn btn-primary btn-sm" href="{{ route('forum.editreply', $reply->id) }}"><button class="Button">Edit</button></a>
                                                                <form style="display: inline;" method="POST" action="{{ route('forum.deletereply', $reply->id) }}">
                                                                    @csrf
                                                    
                                                                    <button class="Button" type="submit">Delete</button>
                                                                </form>
                                                            </div>
                                                            @endif
                                                        </td>
                                                        </tr>
                                                        <tr>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </table>
                                        <span id="ctl00_cphRoblox_PostView1_ctl00_Pager">
                                            <table cellspacing="0" cellpadding="0" border="0" style="width:100%;border-collapse:collapse;">
                                                <tr>
                                                    <td><span>{{ $replies->links('pagination.simple') }}</span></td>
                                                </tr>
                                            </table>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colSpan="2">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align="left" colSpan="2">
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" colSpan="2">
                                        <span id="ctl00_cphRoblox_PostView1_ctl00_Whereami2" NAME="Whereami2">
                                            <table cellPadding="0" cellSpacing="0" width="100%">
                                                <tr>
                                                    <td valign="top" align="left" width="1px">
                                                        <nobr>
                                                            <a id="ctl00_cphRoblox_PostView1_ctl00_Whereami2_ctl00_LinkHome" class="linkMenuSink" href="{{ route('forum.index') }}">{{ config('app.name') }} Forum</a>
                                                        </nobr>
                                                    </td>
                                                    <td id="ctl00_cphRoblox_PostView1_ctl00_Whereami2_ctl00_ForumGroupMenu" class="popupMenuSink" valign="top" align="left" width="1px">
                                                        <nobr>
                                                            <span id="ctl00_cphRoblox_PostView1_ctl00_Whereami2_ctl00_ForumGroupSeparator" class="normalTextSmallBold">&nbsp;&gt;</span>
                                                            <a id="ctl00_cphRoblox_PostView1_ctl00_Whereami2_ctl00_LinkForumGroup" class="linkMenuSink" href="{{ route('forum.category', $post->category->id) }}">{{ $post->category->name }}</a>
                                                        </nobr>
                                                    </td>
                                                    <td id="ctl00_cphRoblox_PostView1_ctl00_Whereami2_ctl00_PostMenu" class="popupMenuSink" valign="top" align="left" width="1px">
                                                        <nobr>
                                                            <span id="ctl00_cphRoblox_PostView1_ctl00_Whereami2_ctl00_PostSeparator" class="normalTextSmallBold">&nbsp;&gt;</span>
                                                            <a id="ctl00_cphRoblox_PostView1_ctl00_Whereami2_ctl00_LinkPost" class="linkMenuSink" href="{{ route('forum.getthread', $post->id) }}">{{ $post->title }}</a>
                                                        </nobr>
                                                    </td>
                                                    <td valign="top" align="left" width="*">&nbsp;</td>
                                                </tr>
                                            </table>
                                            <span id="ctl00_cphRoblox_PostView1_ctl00_Whereami2_ctl00_MenuScript"></span>
                                        </span>
                                    </td>
                                </tr>
                            </table>
                        </span>
                    </td>
                    <td class="CenterColumn">&nbsp;&nbsp;&nbsp;</td>
                    <!-- right margin -->
                    <td class="RightColumn">&nbsp;&nbsp;&nbsp;</td>
                </tr>
            </table>
        </td>
    </tr>
</table>
@endsection