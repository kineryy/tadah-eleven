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
                        <span id="ctl00_cphRoblox_Createeditpost1" NAME="Createeditpost1">
                            <table cellSpacing="0" border="0">
                                <tr>
                                    <td>
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
                                                            <a id="ctl00_cphRoblox_ThreadView1_ctl00_Whereami1_ctl00_LinkForumGroup" class="linkMenuSink" href="{{ route('forum.category', $post->category->id) }}">{{ $post->category->name }}</a>
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
                            </table>
                            <p>
                            <table class="tableBorder" cellSpacing="1" cellPadding="3" width="100%">
                                <tr>
                                    <th class="tableHeaderText" align="left" height="25">
                                        &nbsp;<span id="ctl00_cphRoblox_Createeditpost1_PostForm_PostTitle">Reply to an Existing Message</span>
                                    </th>
                                </tr>
                                <span id="ctl00_cphRoblox_Createeditpost1_PostForm_ReplyTo">
                                    <tr>
                                        <td class="forumRow">
                                            <table cellSpacing="1" cellPadding="3">
                                                <tr>
                                                    <td colSpan="2"><span class="normalTextSmall">The message you are replying to: </span></td>
                                                </tr>
                                                <tr>
                                                    <td vAlign="top" noWrap align="right"><span class="normalTextSmallBold">Posted By: </span></td>
                                                    <td vAlign="top" align="left"><a id="ctl00_cphRoblox_Createeditpost1_PostForm_ReplyPostedBy" class="normalTextSmall" href="{{ route('users.profile', $post->user->id) }}">{{ $post->user->username }}</a><span id="ctl00_cphRoblox_Createeditpost1_PostForm_ReplyPostedByDate" class="normalTextSmall"> on {{ date('F j, Y, g:i A', strtotime($post->created_at)) }}</span></td>
                                                </tr>
                                                <tr>
                                                    <td vAlign="top" align="right"><span class="normalTextSmallBold">Subject: </span></td>
                                                    <td vAlign="top" align="left"><a id="ctl00_cphRoblox_Createeditpost1_PostForm_ReplySubject" class="normalTextSmall" href="{{ route('forum.getthread', $post->id) }}">{{ $post->title }}</a></td>
                                                </tr>
                                                <tr>
                                                    <td vAlign="top" align="right"><span class="normalTextSmallBold">Message: </span></td>
                                                    <td vAlign="top" align="left"><span class="normalTextSmall"><span id="ctl00_cphRoblox_Createeditpost1_PostForm_ReplyBody">@parsedown($post->body)</span>
                                                        </span></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="forumAlternate">&nbsp;
                                        </td>
                                    </tr>
                                </span>
                                <span id="ctl00_cphRoblox_Createeditpost1_PostForm_Post">
                                    <tr>
                                        <td class="forumRow">
                                            <table cellSpacing="1" cellPadding="3">
                                                @if (session()->has('error'))
                                                <tr>
                                                    <td><span id="ctl00_cphRoblox_Createeditpost1_PostForm_RequiredFieldValidator1" class="validationWarningSmall" style="color:Red;">{{ session()->get('error') }}</span></td>
                                                </tr>
                                                @endif
                                                <tr>
                                                    
                                                </tr>
                                                <tr>
                                                    <td vAlign="top" nowrap align="right"><span class="normalTextSmallBold">Author: </span></td>
                                                    <td vAlign="top" align="left" colSpan="2"><span class="normalTextSmall"><span id="ctl00_cphRoblox_Createeditpost1_PostForm_PostAuthor">{{ Auth::user()->username }}</span>
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td vAlign="top" nowrap align="right"><span class="normalTextSmallBold">Message: </span></td>
                                                    <td vAlign="top" align="left"><textarea name="txtBody" rows="20" cols="90" id="txtBody"></textarea>
                                                    </td>
                                                    <td vAlign="top">&nbsp;</td>
                                                    @error('body')
                                                    <td><span id="ctl00_cphRoblox_Createeditpost1_PostForm_RequiredFieldValidator1" class="validationWarningSmall" style="color:Red;">{{ $message }}</span></td>
                                                    @enderror
                                                </tr>
                                                <tr>
                                                    <td vAlign="top" align="right" colSpan="2">
                                                        <input type="submit" name="ctl00$cphRoblox$Createeditpost1$PostForm$PostButton" value=" Reply " onclick="dopost()" id="ctl00_cphRoblox_Createeditpost1_PostForm_PostButton" />
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </span>
                            </table>
                            </p>
                            <p>
                            <table cellSpacing="0" border="0">
                                <tr>
                                    <td>
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
                                                            <a id="ctl00_cphRoblox_ThreadView1_ctl00_Whereami1_ctl00_LinkForumGroup" class="linkMenuSink" href="{{ route('forum.category', $post->category->id) }}">{{ $post->category->name }}</a>
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
                            </table>
                            </p>
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
<form id="PostForm" action="{{ route('forum.docreatereply', $post->id) }}" method="post">
    @csrf
    <input type="hidden" id="title" name="title" />
    <input type="hidden" id="body" name="body" />
</form>
@endsection

@section('scripts')
<script>
function dopost() {
    document.getElementById("body").value = document.getElementById("txtBody").value;
    document.getElementById("PostForm").submit();
}
</script>
@endsection