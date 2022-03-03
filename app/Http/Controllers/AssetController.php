<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function getasset(Request $request)
    {
        if (!$request->id) {
            abort(404);
        }

        $item = Item::findOrFail($request->id);
        
        if (Storage::disk('public')->exists('items/' . $item->id)) {
            $response = Response::make(Storage::disk('public')->get('items/' . $item->id, 200));
            $response->header('Content-Type', 'application/octet-stream');
            return $response;
        } else {
            abort(404);
        }
    }

    public function getxmlasset(Request $request)
    {
        if (!$request->id) {
            abort(404);
        }

        $item = Item::findOrFail($request->id);

        if ($item->isXmlAsset()) {
            if (Storage::disk('public')->exists('items/' . $request->id)) {
                $response = Response::make(Storage::disk('public')->get('items/' . $request->id, 200));
                $response->header('Content-Type', 'application/octet-stream');
                return $response;
            } else {
                return abort(404);
            }
        }

        return view('client.xmlasset')->with('item', $item);
    }

    public function robloxredirect(Request $request)
    {
        if (!$request->id) {
            abort(404);
        }

        if ($request->id == "humHealth") {
            return view('client.humanoidHealth');
        }

        return redirect('https://assetdelivery.roblox.com/v1/asset/?id=' . $request->id);
    }
}
