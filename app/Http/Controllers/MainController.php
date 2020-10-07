<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Redis;
class MainController extends Controller
{
    public function home() {
        // return Redis::publish('newMessage','What is up ?');
        return view('main',['messages'=>Message::all()]);
    }
    public function store(Request $request) {
        if(!Auth::check()) {
            return 'Not authenticated';
        }
        if(!$request->get('body')=='') {
            $msg = new Message();
            $msg->body = $request->get('body');
            $msg->user_id=Auth()->user()->id;
            $msg->save();
            Redis::publish('channel',json_encode(['event'=>'newMsg','data'=>['user'=>['id'=>Auth::user()->id,'name'=>Auth::user()->name],'body'=>$msg->body]]));
            return 'OK';
        }
    }
    
}
