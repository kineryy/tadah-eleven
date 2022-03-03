<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Server;
use App\Models\GameToken;
use App\Models\User;
use App\Models\BodyColors;
use App\Models\OwnedItems;
use App\Models\Item;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class ClientController extends Controller
{
    public function generate(Request $request, $serverId)
    {
        if (Server::find($serverId)) {
            $tokenString = Str::random(20);

            $token = new GameToken;
            $token->user_id = $request->user()->id;
            $token->server_id = $serverId;
            $token->token = $tokenString;
            $token->save();

            return $tokenString;
        } else {
            return abort(404);
        }
    }

    public function join(Request $request, $requestToken)
    {
        $token = GameToken::where('token', $requestToken)->first();

        if (!$token) {
            return 'game:SetMessage("Invalid join token. If this error persists, contact us.")';
        }

        return view('client.join')->with('token', $token);
    }

    public function host(Request $request, $secret)
    {
        $server = Server::where('secret', $secret)->first();

        if (!$server) {
            return 'print("Invalid server.")';
        }

        return view('client.host')->with('server', $server);
    }

    public function admin(Request $request, $secret)
    {
        $server = Server::where('secret', $secret)->first();

        if (!$server) {
            return 'print("Invalid server.")';
        }

        $admins = User::where('admin', true)->get();

        return view('client.admin')->with(['server' => $server, 'admins' => $admins]);
    }

    public function bodycolors(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $bodycolors = BodyColors::where('user_id', $user->id)->firstOrFail();

        return view('users.bodycolors')->with('bodycolors', $bodycolors);
    }

    public function charapp(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $appearance = array();
        $appearance[] = url('/users/' . $user->id . '/bodycolors');

        $wearingItems = OwnedItems::where(['user_id' => $user->id, 'wearing' => true])->get();

        foreach ($wearingItems as $wearingItem) {
            $item = Item::find($wearingItem->item_id);

            if ($item->approved) {
                if ($item->isXmlAsset()) {
                    $appearance[] = url('/asset?id=' . $item->id);
                } else {
                    $appearance[] = url('/xmlasset?id=' . $item->id);
                }
            }
        }

        return join(';', $appearance);
    }

    public function ping(Request $request, $secret)
    {
        $server = Server::where('secret', $secret)->first();

        if (!$server) {
            return abort(404);
        }

        Cache::put('server_online' . $server->id, true, Carbon::now()->addMinutes(1));

        return 'OK';
    }

    public function getuserthumbnail(Request $request)
    {
        $user = User::findOrFail($request->userId);

        $path = 'items/asset-error.png'; // default image (not found)
        if (Storage::disk('public')->exists('users/user_' . $user->id . '.png')) {
            $path = $user->banned ?
                    'items/asset-notapproved.png' :               // user thumbnail if they're not banned
                   ('users/user_' . $user->id . '.png');          // otherwise not approved if they're banned
        }

        $response = Response::make(Storage::disk('public')
        ->get($path, 200))
        ->header('Content-Type', 'image/png');
        return $response;
    }

    public function signscript(Request $request)
    {
        if (!$request->script) {
            abort(400);
        }

        if (!$request->version) {
            abort(400);
        }

        $signature = "";
        openssl_sign("\r\n" . $request->script, $signature, "-----BEGIN RSA PRIVATE KEY-----\nMIICXAIBAAKBgQCz+CJqGw2KhlX4fodgGk93S3jekukBqjXoUARhD5UEFZnjWQxLe/oRNQacHNnsvRlfI0r2Z8IrFiHUA+L7jdVZJG4vdk620OCGUy1xVbdDpV/Ja/4mF7HUC+2n+OMhVunAVX4/1rBWSRyCAl2PJ6ysgkY9DHWtZpXpBLrsdMgsrQIDAQABAoGAYIenbeI00Shc1HyJgDKcjRAeNMP31rzFTWYd8zG4bAhqElehEJve9XvLn9CZ0zFaen0jqCbfLt0gJ+gtx1+8Hr1T9WIfFvvv2MoUN+p5s0r/8DRUpzi2Yv6SfTeJNubO0XctJ4hoIOsLGt4Hik6pmrRhn61bCdav6vNbdVot9MECQQDnUNAx6w7hPRInJh7960yNWiR0HjIFgGtB25RYq4vflshxcVEjPtfkXDNDGzw3xGTGZFXTGQynmUtYR3vik/WPAkEAxyyd6XgY/8kOYCLOcu9JrJCS/iG0WjiqPSep+8HKe9OqXBQqjZNzTQJzCR3ogcPbYfQq7lwcA6n9UJWiSQD0AwJAX2dPVydRrchYclkgsy2XFz20h0fk7av3kOQVnTSzrfYsmc1Y36aNuJvmcKkM/xs7TTAYzcYpF/77ul9RUzQfNQJACUBFRWbSom7QQB7dv/DlVyKP8UXXfqlLHvQMrSjfIsk+DHDTWSgUHuuSNEYzWnOiaPZSWCfnFTR8E5Yfp4xnyQJBAIr5UxtuUY3LaztdQb4m9xwl9dX6E+tUXUu+xmwWbu99VSWfWJ7ppja6gracYqwwf3vlnpS5591Wi6jhrCiwtoo=\n-----END RSA PRIVATE KEY-----", OPENSSL_ALGO_SHA1);

        $base64signature = base64_encode($signature);
        
        $signedscript = "";
        if ($request->version == "new") {
            $signedscript = "--rbxsig%" . $base64signature . "%\r\n" . $request->script;
        } else {
            $signedscript = "%" . $base64signature . "%\r\n" . $request->script;
        }

        return $signedscript;
    }
}
