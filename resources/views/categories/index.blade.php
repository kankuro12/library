@extends('layouts.default')
@section('title', 'Manage categories')

@section('content')
<div>
  <div class="index-title mb-2">
    <form action="{{ route('createCategory') }}" method="get" class="mb-1">
      <button type="submit" class="btn btn-primary">
        <i class="fa fa-plus"></i>Add
      </button>
    </form>
    <h2 class="font-weight-bold text-white"> All categories</h2>
  </div>

  <table class="table table-hover bg-light">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Amount</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($categories as $category)
      @include('categories._category')
      @endforeach
    </tbody>
  </table>

  <div class="mt-3">
    {!! $categories->render() !!}
  </div>
</div>
@stop
