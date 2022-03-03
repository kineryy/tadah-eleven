<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Server;
use App\Models\GameToken;
use App\Models\InviteKey;
use App\Models\Item;
use App\Models\OwnedItems;
use App\Models\RenderQueue;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(Request $request) {
        return view('admin.index');
    }

    public function truncategametokens(Request $request) {
        GameToken::Truncate();

        return redirect('/admin')->with('message', 'Cleared all Game Tokens from the database.');
    }

    public function truncateservers(Request $request) {
        Server::Truncate();

        return redirect('/admin')->with('message', 'Cleared all Servers from the database.');
    }

    public function invitekeys(Request $request) {
        $invitekeys = InviteKey::query();

        return view('admin.invitekeys')->with('invitekeys', $invitekeys->orderBy('updated_at', 'DESC')->paginate(10)->appends($request->all()));
    }

    public function createinvitekey(Request $request) {
        return view('admin.createinvitekey');
    }

    public function generateinvitekey(Request $request) {
        $request->validate([
            'uses' => ['required', 'min:1', 'max:20', 'integer']
        ]);

        $inviteKey = InviteKey::create([
            'creator' => $request->user()->id,
            'token' => 'TadahKey-' . Str::random(25),
            'uses' => $request['uses']
        ]);

        return redirect('/admin/createinvitekey')->with('success', 'Created invite key. Key: "' . $inviteKey->token  . '"');
    }

    public function disableinvitekey(Request $request, $id) {
        $invitekey = InviteKey::find($id);

        if (!$invitekey) {
            return abort(404);
        }

        $invitekey->uses = 0;
        $invitekey->save();

        return redirect('/admin/invitekeys')->with('message', 'Invite key ID: ' . $invitekey->id . ', Token: ' . $invitekey->token . ' disabled.');
    }

    public function ban(Request $request) {
        return view('admin.ban');
    }

    public function banuser(Request $request) {
        $request->validate([
            'username' => ['required', 'min:3', 'max:50'],
            'banreason' => ['required', 'max:2000'],
            'unbandate' => ['required', 'date']
        ]);

        $user = User::where('username', $request['username'])->first();

        if (!$user) {
            return redirect('/admin/ban')->with('error', 'That user does not exist. Name: ' . $request['username']);
        }

        if ($user->banned) {
            return redirect('/admin/ban')->with('error', 'That user is already banned. Reason: ' . $user->ban_reason);
        }

        if ($request->user()->id == $user->id) {
            return redirect('/admin/ban')->with('error', 'You\'re trying to ban yourself?');
        }

        $user->banned = true;
        $user->ban_reason = $request['banreason'];
        $user->banned_until = Carbon::parse($request['unbandate']);
        $user->save();

        return redirect('/admin/ban')->with('success', $user->username . '  has been banned until ' . $user->banned_until);
    }

    public function unban(Request $request) {
        return view('admin.unban');
    }

    public function unbanuser(Request $request) {
        $request->validate([
            'username' => ['required', 'min:3', 'max:20']
        ]);

        $user = User::where('username', $request['username'])->first();

        if (!$user) {
            return redirect('/admin/unban')->with('error', 'That user does not exist. Name: ' . $request['username']);
        }

        if (!$user->banned) {
            return redirect('/admin/unban')->with('error', 'That user is not banned.');
        }

        if ($request->user()->id == $user->id) {
            return redirect('/admin/unban')->with('error', 'but... but... but... you are not banned......');
        }

        $user->banned = false;
        $user->ban_reason = null;
        $user->banned_until = null;
        $user->save();

        return redirect('/admin/unban')->with('success', $user->username . '  has been unbanned.');
    }

    public function xmlitem(Request $request)
    {
        return view('admin.newxmlitem');
    }

    public function createxmlitem(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'description' => ['string', 'max:2000'],
            'price' => ['required', 'integer', 'min:0', 'max:999999'],
            'xml' => ['required', 'string'],
            'type' => ['required', 'string']
        ]);

        $item = Item::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'creator' => $request->user()->id,
            'thumbnail_url' => $request['thumbnailurl'],
            'price' => $request['price'],
            'type' => $request['type'],
            'sales' => 0,
            'onsale' => true,
            'approved' => config('app.assets_approved_by_default')
        ]);

        Storage::disk('public')->put('items/' . $item->id, $request['xml']);

        if ($item->type == "Hat" || $item->type == "Model" || $item->type == "Gear") {
            RenderQueue::create([
                'type' => 'xml',
                'target_id' => $item->id
            ]);
        }

        if ($item->type == "Package") {
            RenderQueue::create([
                'type' => 'clothing',
                'target_id' => $item->id
            ]);
        }

        OwnedItems::create([
            'user_id' => $request->user()->id,
            'item_id' => $item->id,
            'wearing' => false
        ]);

        return redirect(route('catalog.item', $item->id))->with('message', 'XML asset successfully created.');
    }

    public function robloxitemdata(Request $request, $id)
    {
        $response = Http::asForm()->get('https://api.roblox.com/marketplace/productinfo', [
            "assetId" => $id
        ]);

        return $response;
    }

    public function robloxxmldata(Request $request, $id, $version)
    {
        $response = Http::get('https://assetdelivery.roblox.com/v1/asset?id=' . intval($id) . "&version=" . intval($version));

        return $response;
    }
    
    public function regenalluserthumbs(Request $request)
    {
        if (!$request->user()->id == 1) {
            abort(404);
        }

        $users = User::all();
        foreach ($users as $user) {
            RenderQueue::create([
                "type" => "user",
                "target_id" => $user->id
            ]);
        }

        return "OK";
    }
}
