@extends('layouts.default')
@section('title', $book->title)

@section('content')
<div class="row">

  <div class="col-md-6 ">
    <img src="{{asset( $book->cover) }}" width="100%" />
  </div>

  <div class="col-md-6">
    <div class="mt-4 mt-md-0">
      <section class="user_info">
        @include('shared._book_info', ['book' => $book])
      </section>
    </div>
  </div>

</div>
@stop
