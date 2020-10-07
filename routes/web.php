<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
Route::get('/',[App\Http\Controllers\MainController::class,'home'])->middleware('auth');
Route::post('/',[App\Http\Controllers\MainController::class,'store']);
Route::get('/logout',function() {
    Redis::publish('channel',json_encode(['event'=>'left','data'=>['user'=>['id'=>Auth::user()->id,'name'=>Auth::user()->name]]]));
    auth()->logout();
    return redirect('/login');
});