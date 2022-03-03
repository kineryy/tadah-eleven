<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Server;
use App\Models\Item;
use App\Models\OwnedItems;
use App\Models\BodyColors;
use App\Models\RenderQueue;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $users = User::query();

        if (request('search')) {
            $users->where('username', 'LIKE', '%' . request('search') . '%')->orderBy('last_online', 'desc');
        } else {
            $users->orderBy('last_online', 'desc');
        }

        return view('users.index')->with('users', $users->paginate(10)->appends($request->all()));
    }

    public function me(Request $request)
    {
        $servers = Server::where('creator', $request->user()->id)->get();

        return view('users.user')->with('servers', $servers);
    }

    public function profile(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $servers = Server::where('creator', $user->id)->get();

        return view('users.profile')->with(['user' => $user, 'servers' => $servers]);
    }

    public function banned(Request $request)
    {
        if (!$request->user()->banned) {
            return redirect(route('home'));
        }

        return view('users.banned');
    }

    public function settings(Request $request)
    {
        return view('users.settings');
    }

    public function getthumbnail(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $userInQueue = RenderQueue::where(['type' => 'user', 'target_id' => $user->id])->first();

        $path = 'items/asset-error.png'; // default image (not found)
        if (Storage::disk('public')->exists('users/user_' . $user->id . '.png')) {
            $path = $user->banned ?
                    'items/asset-notapproved.png' :               // user thumbnail if they're not banned
                   ('users/user_' . $user->id . '.png');          // otherwise not approved if they're banned
        }

        if ($userInQueue) { // if user is in render queue, return loading spinner gif
            return redirect(asset('images/asset-loading.gif'));
        }

        $response = Response::make(Storage::disk('public')
        ->get($path, 200))
        ->header('Content-Type', 'image/png');
        return $response;
    }

    public function characterItems(Request $request, $requestType)
    {
        $type = "Hat";
		switch ($requestType) {
			case "hats":
			default:
				$type = "Hat";
				break;
			case "shirts":
				$type = "Shirt";
				break;
			case "pants":
				$type = "Pants";
				break;
            case "tshirts":
                $type = "T-Shirt";
                break;
            case "images":
                $type = "Image";
                break;
			case "faces":
				$type = "Face";
				break;
			case "gears":
				$type = "Gear";
				break;
            case "heads":
                $type = "Head";
                break;
            case "packages":
                $type = "Package";
                break;
		}

		$items = DB::table('owned_items')
			->join('items', 'owned_items.item_id', '=', 'items.id')
			->where('owned_items.user_id', $request->user()->id)
			->where('items.type', $type)
			->where('items.approved', 1)
			->select('items.id', 'items.thumbnail_url', 'items.name', 'items.type', 'owned_items.wearing')
			->orderBy('owned_items.created_at', 'desc')
			->get();

		return view('users.characteritems', ['items' => $items, 'type' => $type]);
    }

    public function toggleWearing(Request $request, $id)
	{
        $item = Item::findOrFail($id);
		$ownedItem = OwnedItems::where(['item_id' => $id, 'user_id' => $request->user()->id])->firstOrFail();

		$wearingItems = DB::table('owned_items')
			->join('items', 'owned_items.item_id', '=', 'items.id')
			->where('owned_items.user_id', $request->user()->id)
			->where('owned_items.wearing', true)
			->where('items.type', $item->type)
			->select('owned_items.id', 'owned_items.item_id', 'owned_items.wearing')
			->get();

		if (!$ownedItem->wearing) {
			if ($item->type == "Hat") {
				if (count($wearingItems) >= 5) {
					$wearingItem = OwnedItems::where(['id' => $wearingItems[0]->id, 'wearing' => true])->first();
					
					if ($wearingItem) {
						$wearingItem->wearing = false;
						$wearingItem->save();
					}
				}
			} else {
				foreach ($wearingItems as $wearingItem) {
					$wearingItem = OwnedItems::where(['id' => $wearingItem->id, 'user_id' => $request->user()->id])->first();
					$wearingItem->wearing = false;
					$wearingItem->save();
				}
			}

			$ownedItem->wearing = true;
			$ownedItem->save();
		} else {
			$ownedItem->wearing = false;
			$ownedItem->save();
		}

		return back();
	}

    public function regenThumbnail(Request $request)
    {
        $user = $request->user();
        $userInQueue = RenderQueue::where(['type' => 'user', 'target_id' => $user->id])->first();

        if ($userInQueue) {
            return 'INQUEUE';
        } else {
            RenderQueue::create([
                'type' => 'user',
                'target_id' => $user->id
            ]);

            return 'OK';
        }
    }

    public function download(Request $request)
    {
        return view('client.download');
    }

    public function savesettings(Request $request)
    {
        $user = $request->user();

        $request->validate([
            'blurb' => ['max:700']
        ]);

        $user->blurb = $request->blurb;
        $user->save();

        return redirect(route('users.settings'))->with('message', 'Settings saved successfully.');
    }
}
