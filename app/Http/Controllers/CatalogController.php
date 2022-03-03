<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\OwnedItems;
use App\Models\RenderQueue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use claviska\SimpleImage;
use Illuminate\Support\Facades\Response;
use App\Rules\AssetTypesRule;

class CatalogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request, $requestType)
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
            case "models":
                $type = "Model";
                break;
		}

        $items = Item::where(['type' => $type, 'approved' => true, 'onsale' => true])->orderBy('created_at', 'desc');

        if (request('search')) {
            $items->where('name', 'LIKE', '%' . request('search') . '%');
        }

        return view('catalog.index')->with(['items' => $items->paginate(20)->appends($request->all()), 'type' => $type, 'search' => request('search')]);
    }

    public function item(Request $request, $id)
    {
        $item = Item::findOrFail($id);
        $ownedItem = OwnedItems::where(['user_id' => $request->user()->id, 'item_id' => $item->id])->first();

        return view('catalog.item')->with(['item' => $item, 'ownedItem' => $ownedItem]);
    }

    public function upload(Request $request)
    {
        return view('catalog.upload');
    }

    public function processupload(Request $request)
    {
        // TODO: #1 Modify thumbnail code below for new asset types in the future (audio, mesh, etc.)

        if (! config('app.item_creation_enabled')) {
            abort(403);
        }

        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'description' => ['string', 'max:2000'],
            'price' => ['required', 'integer', 'min:0', 'max:999999'],
            'type' => ['required', new AssetTypesRule()],
            'asset' => ['required', 'max:51200', 'image']
        ]);
        
        $user = $request->user();

        if ($request['type'] == "Face" && !$user->admin || $request['type'] == "Hat") {
            return abort(403);
        }

        if ($user->money < config('app.asset_upload_cost')) {
            return redirect('/catalog/upload')->with('error', 'You do not have enough money to upload an asset.');
        }

        $user->money = $user->money - config('app.asset_upload_cost');
        $user->save();

        $item = Item::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'creator' => $user->id,
            'price' => $request['price'],
            'type' => $request['type'],
            'sales' => 0,
            'onsale' => true,
            'approved' => config('app.assets_approved_by_default')
        ]);

        try {
            $img = new SimpleImage($request->file('asset'));

            switch ($request->type) {
                case "Face":
                case "T-Shirt":
                default:
                    $img->bestFit(250, 250);
                    break;
                case "Shirt":
                    $img->crop(165, 201, 424, 74);
                    break;
                case "Pants":
                    $img->crop(217, 482, 371, 355);
                    break;
            }

            $savePath = storage_path() . "/app/public/items/" . $item->id . '_thumbnail.png';
            $img->toFile($savePath, 'image/png', 75);
        } catch (\Exception $exception) {
            Storage::disk('public')->copy('items/asset-error.png', 'items/' . $item->id . '_thumbnail.png');
        }

        $request->file('asset')->move(storage_path() . "/app/public/items/", $item->id);

        OwnedItems::create([
            'user_id' => $user->id,
            'item_id' => $item->id,
            'wearing' => false
        ]);

        if ($item->type == "Shirt" || $item->type == "Pants") {
            RenderQueue::create([
                'type' => 'clothing',
                'target_id' => $item->id
            ]);
        }

        return redirect('/item/' . $item->id)->with('message', 'Item successfully uploaded.');
    }

    public function configure(Request $request, $id)
    {
        $item = Item::findOrFail($id);
        $user = $request->user();

        if (!$item) {
            abort(404);
        }

        if (!$user == $item->user && !$user->admin) {
            abort(403);
        }

        return view('catalog.configure')->with('item', $item);
    }

    public function processconfigure(Request $request, $id)
    {
        $item = Item::findOrFail($id);
        $user = $request->user();

        if (!$item) {
            abort(404);
        }

        if (!$user == $item->user && !$user->admin) {
            abort(403);
        }

        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'description' => ['string', 'max:2000'],
            'price' => ['required', 'integer', 'min:0', 'max:999999'],
            'xml' => ['string']
        ]);

        $item->name = $request['name'];
        $item->description = $request['description'];
        $item->price = $request['price'];
        $item->onsale = $request->has('onsale'); // check boxes are weird

        if ($item->isXmlAsset()) {
            $item->thumbnail_url = $request['thumbnailurl'];

            Storage::disk('public')->put('items/' . $item->id, $request['xml']);
        }

        $item->save();

        return redirect(route('catalog.item', $item->id))->with('message', 'Changes saved successfully.');
    }

    public function buyitem(Request $request, $id)
    {
        $item = Item::findOrFail($id);
        $ownedItem = OwnedItems::where(['user_id' => $request->user()->id, 'item_id' => $item->id])->first();

        if (!$item->onsale) {
            abort(403);
        }

        if (!$item->approved) {
            abort(403);
        }

        if ($ownedItem) {
            abort(403);
        }

        if ($request->user()->money < $item->price) {
            abort(403);
        }

        OwnedItems::create([
            'user_id' => $request->user()->id,
            'item_id' => $item->id,
            'wearing' => false
        ]);

        $request->user()->money = $request->user()->money - $item->price;
        $request->user()->save();

        $item->user->money = $item->user->money + $item->price;
        $item->user->save();

        $item->sales = $item->sales + 1;
        $item->save();

        return redirect(route('catalog.item', $item->id))->with('message', 'Item purchased successfully.');
    }

    public function getthumbnail(Request $request, $id)
    {
        $item = Item::findOrFail($id);

        if ($item->thumbnail_url) {
            return redirect($item->thumbnail_url);
        }

        $path = 'items/asset-error.png'; // default image (not found)
        if (Storage::disk('public')->exists('items/' . $item->id . '_thumbnail.png')) {
            $path = $item->approved ?
                ('items/' . $id . '_thumbnail.png') :   // item thumbnail if it's approved
                'items/asset-notapproved.png';          // not approved image otherwise
        }

        $response = Response::make(Storage::disk('public')
        ->get($path, 200))
        ->header('Content-Type', 'image/png');
        return $response;
    }
}
