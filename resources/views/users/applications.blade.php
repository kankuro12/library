@extends('layouts.default')
@section('title', 'Applications')

@section('content')
<div>
  <div class="index-title mb-2">
    <form action="{{ route('createAdmin') }}" method="get">
      <button type="submit" class="btn btn-m btn-info create-btn">
        <i class="fa fa-plus"></i> Add
      </button>
    </form>
  </div>

  <div>
    <table class="table">
      <tr>
        <th>Image</th>
        <th>name</th>
        <th>address</th>
        <th>email</th>
        <th>phone</th>
        <th></th>
      </tr>
      @foreach ($apps as $user)
      <tr>

        <td><img src="{{asset($user->photo)}}" style="max-width: 150px;" /></td>
        <td>{{$user->name}}</td>
        <td>{{$user->address}}</td>
        <td>
          {{$user->email}}
        </td>
        <td>{{$user->phone}}</td>
        <td>
          <form action="/users/{{$user->id}}" method="POST" class="d-inline">
            @csrf
            @method('delete')
            <input type="submit" value="delete" class="btn btn-link" />
          </form><br />
          <a href="/accept/{{$user->id}}" class="btn btn-link">accept</a>
        </td>
      </tr>
      @endforeach
    </table>
  </div>

</div>
@stop
