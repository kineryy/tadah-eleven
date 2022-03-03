<?php

namespace App\Http\Controllers;

use App\Models\Server;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $servers = Server::orderBy('updated_at', 'DESC')
            ->paginate(10)
            ->appends($request->all());

        return view('servers.index')->with('servers', $servers);
    }

    public function server(Request $request, $id)
    {
        $server = Server::findOrFail($id);
        
        return view('servers.server')->with('server', $server);
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:40'],
            'description' => ['string', 'max:250'],
            'ipaddress' => ['required', 'string', 'ipv4'],
            'port' => ['integer']
        ]);

        $server = Server::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'creator' => $request->user()->id,
            'ip' => $request['ipaddress'],
            'port' => $request['port'],
            'secret' => Str::random(20)
        ]);

        return redirect(route('servers.index', $server->id));
    }

    public function delete(Request $request, $id)
    {
        $user = $request->user();
        $server = Server::findOrFail($id);

        if (!$user == $server->user && !$user->admin) {
            abort(403);
        }

        $server->delete();

        return redirect(route('servers.index'))->with('message', 'Server successfully deleted.');
    }

    public function configure(Request $request, $id)
    {
        $server = Server::findOrFail($id);
        $user = $request->user();

        if (!$server) {
            abort(404);
        }

        if (!$user == $server->user && !$user->admin) {
            abort(403);
        }

        return view('servers.configure')->with('server', $server);
    }

    public function processconfigure(Request $request, $id)
    {
        $server = Server::findOrFail($id);
        $user = $request->user();

        if (!$server) {
            abort(404);
        }

        if (!$user == $server->user && !$user->admin) {
            abort(403);
        }

        $request->validate([
            'name' => ['required', 'string', 'max:40'],
            'description' => ['string', 'max:250'],
            'ipaddress' => ['required', 'string', 'ipv4'],
            'port' => ['integer']
        ]);

        $server->name = $request['name'];
        $server->description = $request['description'];
        $server->ip = $request['ipaddress'];
        $server->port = $request['port'];

        $server->save();

        return redirect(route('servers.server', $server->id))->with('success', 'Changes saved successfully.');
    }
}
