<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ForumThread;
use App\Models\ForumPost;
use App\Models\ForumCategory;
use App\Models\RenderQueue;
use App\Models\User;
use App\Models\Item;

class WelcomeController extends Controller
{
    public function welcome(Request $request)
    {
        $announcements = ForumThread::where(['category_id' => 1])->latest()->take(4)->get();
        $userCount = User::count();
        $renderQueueCount = RenderQueue::count();
        $threadCount = ForumThread::count();
        $postCount = ForumPost::count();
        $totalPosts = $threadCount + $postCount;
        $itemCount = Item::count();
        $newestUser = User::orderBy('joined', 'DESC')->first();

        return view('welcome')->with(
            [
                'announcements' => $announcements,
                'userCount' => $userCount,
                'renderQueueCount' => $renderQueueCount,
                'threadCount' => $threadCount,
                'postCount' => $postCount,
                'totalPosts' => $totalPosts,
                'itemCount' => $itemCount,
                'newestUser' => $newestUser
            ]
        );
    }
}
