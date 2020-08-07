@extends('layouts.default')
@section('title', 'Update book info')

@section('content')
<div class="offset-md-2 col-md-8">
  <div class="card ">
    <div class="card-header">
      <h5>Update book info</h5>
    </div>
    <div class="card-body">

      @include('shared._errors')

      <form method="POST" action="{{ route('books.update', $book->id )}}" enctype="multipart/form-data">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}

        <div class="form-group">
          <label for="isbn" class="form-label">ISBN: </label>
          <input type="text" name="isbn" class="form-control" value="{{ $book->isbn }}" readonly>
        </div>

        <div class="form-group">
          <label for="title" class="form-label">Title: </label>
          <input type="text" name="title" class="form-control" value="{{ $book->name }}">
        </div>

        <div class="form-group">
          <label for="category">Cetegory: </label><br>
          <select name="category_id" class="combobox form-control">
            <option value="{{ $book->category_id }}">
              {{ App\Models\Category::find($book->category_id)->first()['name'] }}</option>
            @foreach ($categories as $category)
            @if ($category->id != $book->category_id)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endif
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="author" class="form-label">Author: </label>
          <input type="text" name="author" class="form-control" value="{{ $book->author }}">
        </div>



        <div class="form-group">
          <label for="description" class="form-label">Description: </label>
          <textarea type="text" name="description" class="form-control">{{ $book->description}}</textarea>
        </div>


        <div class="form-group">
          <label for="cover" class="form-label">Cover: </label>
          <input type="file" id="cover" name="cover" class="form-control">
        </div>
        <div class="form-group">
          <label for="file" class="form-label">File: </label>
          <input type="file" id="file" name="file" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">
          <i class="fa fa-cog fa-fw fa-lg"></i> Update
        </button>
      </form>
    </div>
  </div>
</div>
@stop
