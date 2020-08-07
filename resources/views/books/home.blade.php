@extends('layouts.default')
@section('title', 'Books')
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
        <div class="col-md-3 p-3">
          <input type="text" name="keywords" class="form-control" placeholder="Title">

        </div>
        <div class="col-md-3 p-3">
          <select name="category" class="form-control">
            <option value="">All categories</option>
            @foreach(App\Models\Category::all() as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-md-3 p-3">
          <input type="text" name="author" class="form-control" placeholder="Author">
        </div>
        <div class="col-md-3 p-3">
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
            <img src="{{$book->photo}}" loading=" lazy" style="width:140px;max-height:200px;">
          </div>
          <div class="card-body">
            <p class="card-title text-center font-weight-bold">
              {{$book->name}} <br />
              <a href="{{url('?author='.$book->author)}}'">By {{$book->author}}</a>

            </p>
          </div>
          <div class="d-flex flex-row">
            <a style="flex: 1" href="{{asset($book->file)}}" target="_blank">
              <button class="btn w-100">
                Read
              </button>
            </a>
            <button style="flex: 1" class="btn">
              Detail
            </button>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>

  <div class="mt-3 d-flex justify-content-center">
    <span>

      {!! $books->links() !!}
    </span>
  </div>
</div>
@stop
