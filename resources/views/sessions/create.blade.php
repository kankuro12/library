@extends('layouts.default')
@section('title', 'Login')

@section('content')
<style>
  body {
    font-size: 14px;
    font-weight: bold;
    font-family: "Roboto-Thin";
    background-image: url(https://oss.macrohard.cn/img/gallery/amazing-landscape-2.jpg);
    background-size: cover;
    background-attachment: fixed;
    background-repeat: no-repeat;
  }
</style>
<div class="offset-md-2 col-md-8">
  <div class="card ">
    <div class="card-header">
      <h5>Login</h5>
    </div>
    <div class="card-body">
      @include('shared._errors')

      <form method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}

        <div class="form-group pt-1">
          <label for="id">Email </label>
          <input type="email" name="email" class="form-control" value="{{ old('emial') }}">
        </div>

        <div class="form-group pt-1">
          <label for="password">Password (<a href="{{ route('password.request') }}">Forget password</a>): </label>
          <input type="password" name="password" class="form-control" value="{{ old('password') }}">
        </div>

        <div class="form-group pt-1">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" name="remember" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Remember me</label>
          </div>
        </div>
        <div class="form-group pt-1">
          <button type="submit" class="btn btn-primary">
            <i class="fa fa-sign-in fa-fw fa-lg"></i> Login
          </button>
          <a class="btn btn-primary" href="{{ route('newapplication') }}">Apply For membership</a>
        </div>
      </form>

      <hr>
    </div>
  </div>
</div>
@stop
