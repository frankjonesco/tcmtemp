<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\PusherBroadcast;

class PusherController extends Controller
{
    
    public function index()
    {
        return view('pusher.index');
    }


    public function broadcast(Request $request)
    {
        broadcast(new PusherBroadcast($request->get('message')))->toOthers();
        
        return view('pusher.broadcast', [
            'message' => $request->get('message')
        ]);
    }


    public function receive(Request $request)
    {
        return view('pusher.receive', [
            'message' => $request->get('message')
        ]);
    }
}
