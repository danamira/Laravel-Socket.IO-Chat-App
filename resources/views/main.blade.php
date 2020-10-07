@extends('app')
@section('content')
<h3 style="margin-bottom:20px;">{{env('APP_NAME','Laravel Chat')}}</h3>
<div class="alert alert-info server_msg" style="display:none"></div>
<div class="alert alert-danger server_error" style="display:none"></div>
<div class="alert alert-info pending_msg">Connecting to server ...</div>
<div>
    <br>
    <div id="messages">
@foreach($messages as $message)
<div class="msg">
@if(auth()->user()->id==$message->user->id)
<span class="badge badge-primary">{{$message->user->name}} :</span> {{$message->body}}
@else
<span class="badge badge-dark">{{$message->user->name}} :</span> {{$message->body}}
@endif
</div>
@endforeach
</div>
</div>
<div style="position:fixed;bottom:20px; width:100%;left:0">
<input type="text" class="form-control" placeholder="Say something and hit the Enter" id="toSend">
</div>
<script>
let me = "{{Auth::user()->id}}";
</script>
<script src="/js/j.js"></script>
<script src="/js/n.js"></script>
<script src="/js/app.js"></script>
@stop