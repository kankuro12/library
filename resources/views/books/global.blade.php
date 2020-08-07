@extends('layouts.default')
@section('title', 'public Books')
@section('content')
<style>
  body {
    background: #EDF2F5;
  }
</style>
<div>
  <div class="index-title mb-2">

    <form action="" method="get">
      <div class="row">
        <div class="col-md-4 p-3">
          <input type="text" name="keywords" class="form-control" placeholder="Title">
        </div>
        <div class="col-md-4 p-3">
          <input type="text" name="author" class="form-control" placeholder="Author">
        </div>
        <div class="col-md-4 p-3">
          <button type="submit" class="fa fa-search form-control">Search</button>
        </div>
      </div>
    </form>
  </div>
  <div class="mt-3">
    <div class="row">
      @foreach ($books as $book)
      <div class="col-md-3 mb-3">
        <div class="card w-100 h-100 ">
          <div style="height:200px;" class="m-3 text-center">
            <img src="{{$book->photo}}" class="shadow" loading="lazy" style="width:140px;max-height:200px;">
          </div>
          <div class="card-body">
            <p class="card-title text-center font-weight-bold">
              {{$book->title}} <br />
              <a href="{{url('public?author='.str_replace(" ","+", $book->author))}}">By {{$book->author}}</a>
            </p>
          </div>
          <div class="d-flex flex-row">
            <button style="flex: 1" class="btn" data-toggle="modal" data-target="#pb-{{$book->uid}}">
              read
            </button>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>

  <div class="mt-3 d-flex justify-content-center">
    <span>

      {!! $books->appends(request()->toArray())->links() !!}
    </span>
  </div>
</div>


@foreach ($books as $book)
<!-- Modal-{{$book->uid}} -->
<div class="modal fade" id="pb-{{$book->uid}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Read {{$book->title}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @foreach (\App\Models\Link::where('public_book_id',$book->id)->get() as $link)
        <a href="{{$link->link}}" target="_blank">{{$link->title}}</a>
        <hr>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endforeach
@stop
