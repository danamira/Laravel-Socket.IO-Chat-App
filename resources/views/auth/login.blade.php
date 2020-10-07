@extends('app')
@section('content')
<h3>Login to your account</h3>
<br>
<div class="col col-lg-6">
<form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="row">
            @if($errors->any())
            <div class="alert alert-danger" style="width:100%">
            {{$errors->first()}}
            </div>
            @endif
            </div>
            <div class="form-group">
            <div class="row">
            <input class="form-control" placeholder="Email" type="email" value="{{old('email')}}" name="email">
            </div>
            <div class="form-group">
            <div class="row" style="margin-top:10px;">
            <input class="form-control" placeholder="Password" type="password" name="password">
            </div>
            <div class="form-group">
            <div class="row" style="margin-top:10px;">
            <Button class="btn btn-primary">Login</Button>
            </div>
            </div>  
</form>
</div>
@stop