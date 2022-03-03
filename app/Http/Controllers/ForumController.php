<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ForumCategory;
use App\Models\ForumThread;
use App\Models\ForumPost;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class ForumController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $categories = ForumCategory::orderBy('priority', 'desc')->take(50)->get();

        return view('forum.index')->with('categories', $categories);
    }

    public function getcategory(Request $request, $id)
    {
        $category = ForumCategory::findOrFail($id);
        $posts = ForumThread::where('category_id', $id)->orderBy('stickied', 'desc')->orderBy('updated_at', 'desc');

        return view('forum.category')->with(['posts' => $posts->paginate(15), 'category' => $category]);
    }

    public function createthread(Request $request, $id)
    {
        $category = ForumCategory::findOrFail($id);

        if ($category->admin_only) {
            if (!$request->user()->admin) {
                abort(404);
            }   
        }

        return view('forum.newpost')->with('category', $category);
    }

    public function docreatethread(Request $request, $id)
    {
        $category = ForumCategory::findOrFail($id);

        if ($category->admin_only) {
            if (!$request->user()->admin) {
                abort(404);
            }   
        }

        if (Cache::has('user-posted' . $request->user()->id)) {
            return redirect(route('forum.createthread', $category->id))->with('error', 'Posts can only be made every ' . config('app.posting_cooldown') . ' seconds.');
        }

        $request->validate([
            'title' => ['required', 'string', 'max:100'],
            'body' => ['required', 'string', 'min:3', 'max:2000']
        ]);

        Cache::put('user-posted' . $request->user()->id, true, Carbon::now()->addSeconds(config('app.posting_cooldown')));

        $thread = ForumThread::create([
            'category_id' => $category->id,
            'user_id' => $request->user()->id,
            'title' => $request->title,
            'body' => $request->body,
            'stickied' => false,
            'locked' => false
        ]);

        $category->touch();

        return redirect(route('forum.getthread', $thread->id))->with('message', 'Successfully posted thread.');
    }

    public function getthread(Request $request, $id)
    {
        $thread = ForumThread::findOrFail($id);
        $replies = ForumPost::where('thread_id', $thread->id)->orderBy('created_at', 'asc');
        $category = $thread->category;

        return view('forum.post', ['post' => $thread, 'replies' => $replies->paginate(14), 'category' => $category]);
    }

    public function editthread(Request $request, $id)
    {
        if (!$request->user()->admin) {
            abort(404);
        }

        $thread = ForumThread::findOrFail($id);

        return view('forum.editpost')->with('post', $thread);
    }

    public function doeditthread(Request $request, $id)
    {
        if (!$request->user()->admin) {
            abort(404);
        }

        $thread = ForumThread::findOrFail($id);

        $request->validate([
            'title' => ['required', 'string', 'max:100'],
            'body' => ['required', 'string', 'min:3', 'max:2000']
        ]);

        $thread->title = $request->title;
        $thread->body = $request->body;
        $thread->save();

        $thread->category->touch();

        return redirect(route('forum.getthread', $thread->id))->with('message', 'Successfully edited thread.');
    }

    public function deletethread(Request $request, $id)
    {
        if (!$request->user()->admin) {
            abort(404);
        }

        $thread = ForumThread::findOrFail($id);
        $category = $thread->category;

        foreach ($thread->replies as $reply) {
            $reply->delete();
        }

        $thread->delete();

        return redirect(route('forum.category', $category->id))->with('message', 'Successfully deleted thread.');
    }

    public function togglestickythread(Request $request, $id)
    {
        if (!$request->user()->admin) {
            abort(404);
        }

        $thread = ForumThread::findOrFail($id);

        $thread->stickied = !$thread->stickied;
        $thread->save();

        return redirect(route('forum.getthread', $thread->id))->with('message', 'Successfully toggled thread sticky.');
    }

    public function togglelock(Request $request, $id)
    {
        if (!$request->user()->admin) {
            abort(404);
        }

        $thread = ForumThread::findOrFail($id);

        $thread->locked = !$thread->locked;
        $thread->save();

        return redirect(route('forum.getthread', $thread->id))->with('message', 'Successfully toggled thread lock.');
    }

    public function createreply(Request $request, $id)
    {
        $thread = ForumThread::findOrFail($id);

        if ($thread->locked) {
            abort(403);
        }

        return view('forum.newreply')->with('post', $thread);
    }

    public function docreatereply(Request $request, $id)
    {
        $thread = ForumThread::findOrFail($id);

        if ($thread->locked) {
            abort(403);
        }

        if (Cache::has('user-posted' . $request->user()->id)) {
            return redirect(route('forum.createreply', $thread->id))->with('error', 'Posts can only be made every ' . config('app.posting_cooldown') . ' seconds.');
        }

        $request->validate([
            'body' => ['required', 'string', 'min:3', 'max:2000']
        ]);

        Cache::put('user-posted' . $request->user()->id, true, Carbon::now()->addSeconds(config('app.posting_cooldown')));

        $reply = ForumPost::create([
            'thread_id' => $thread->id,
            'category_id' => $thread->category->id,
            'user_id' => $request->user()->id,
            'body' => $request->body,
            'stickied' => false
        ]);

        $thread->touch();
        $thread->category->touch();

        return redirect(route('forum.getthread', $thread->id))->with('message', 'Successfully posted reply.');
    }

    public function editreply(Request $request, $id)
    {
        if (!$request->user()->admin) {
            abort(404);
        }

        $reply = ForumPost::findOrFail($id);

        return view('forum.editreply')->with('reply', $reply);
    }

    public function doeditreply(Request $request, $id)
    {
        if (!$request->user()->admin) {
            abort(404);
        }

        $reply = ForumPost::findOrFail($id);

        $request->validate([
            'body' => ['required', 'string', 'min:3', 'max:2000']
        ]);

        $reply->body = $request->body;
        $reply->save();

        $reply->category->touch();

        return redirect(route('forum.getthread', $reply->thread->id))->with('message', 'Successfully edited reply.');
    }

    public function deletereply(Request $request, $id)
    {
        if (!$request->user()->admin) {
            abort(404);
        }

        $reply = ForumPost::findOrFail($id);
        $thread = $reply->thread;

        $reply->delete();

        return redirect(route('forum.getthread', $thread->id))->with('message', 'Successfully deleted reply.');
    }
}
