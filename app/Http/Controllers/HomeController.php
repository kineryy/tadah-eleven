<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Server;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $servers = Server::where('creator', $request->user()->id)->get();

        return view('home')->with('servers', $servers);
    }
}
