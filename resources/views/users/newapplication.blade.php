@extends('layouts.default')
@section('title', 'application')

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
      <h5>Register application</h5>
    </div>
    <div class="card-body">
      @include('shared._errors')

      <form method="POST" action="{{ route('newapplication') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
          <div class="col-md-6">

            <div class="form-group pt-1">
              <label for="name">Name </label>
              <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group pt-1">
              <label for="address">Address </label>
              <input type="text" name="address" class="form-control" value="{{ old('address') }}" required>
            </div>

          </div>
        </div>
        <div class="row">
          <div class="col-md-6">

            <div class="form-group pt-1">
              <label for="phone">Phone </label>
              <input type="tel" name="phone" class="form-control" value="{{ old('phone') }}" required>
            </div>
          </div>
          <div class="col-md-6">

            <div class="form-group pt-1">
              <label for="id">Email </label>
              <input type="email" name="email" class="form-control" value="{{ old('email') }}">
            </div>
          </div>
        </div>

        <div class="form-group pt-1">
          <label for="description">Purpose of joining library </label>
          <textarea type="text" name="description" class="form-control">{{ old('description') }}</textarea>
        </div>

        <div class="form-group pt-1">
          <label for="image">Image</label>
          <input type="file" name="photo" class="form-control">
        </div>

        <div class="form-group pt-1">
          <button type="submit" class="btn btn-primary">
            <i class="fa fa-sign-in fa-fw fa-lg"></i> Submit Application
          </button>
        </div>
      </form>


    </div>
  </div>
</div>
@stop
