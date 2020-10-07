@extends('app')
@section('content')
<h3>Create an account</h3>
<br>
<div class="col col-lg-6">
<form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="row">
            @if($errors->any())
            <div class="alert alert-danger" style="width:100%">
            {{$errors->first()}}
            </div>
            @endif
            </div>
            <div class="row" >
            <input class="form-control" placeholder="Email" type="email" value="{{old('email')}}" name="email">
            </div>
            <div class="row"  style="margin-top:10px;">
            <input class="form-control" placeholder="Full name" type="text" value="{{old('name')}}" name="name">
            </div>
            <div class="row" style="margin-top:10px;">
            <input class="form-control" placeholder="Password" type="password" name="password">
            </div>
            <div class="row" style="margin-top:10px;">
            <input class="form-control" placeholder="Password confirmation" type="password" name="password_confirmation">
            </div>
            <div class="row" style="margin-top:10px;">
            <Button class="btn btn-primary">Login</Button>
            </div>
            </div>  
</form>
</div>
@stop