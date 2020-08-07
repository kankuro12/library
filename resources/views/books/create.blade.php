@extends('layouts.default')
@section('title', 'Create a book')

@section('content')
<div class="">
  <div class="card">
    <div class="card-header">
      <h5>Create a book</h5>
    </div>
    <div class="card-body ">
      <div class="p-2">

        @include('shared._errors')

        <form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data">
          {{ csrf_field() }}

          <div class="form-group">
            <label for="isbn" class="form-label">ISBN: </label>
            <input type="text" name="isbn" class="form-control" value="{{ old('ibsn') }}">
          </div>

          <div class="form-group">
            <label for="title" class="form-label">Title: </label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
          </div>

          <div class="form-group">
            <label for="category_id" class="form-label">Category: </label><br>
            <select name="category_id" class="combobox form-control">
              <option></option>
              @foreach ($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="author" class="form-label">Author: </label>
            <input type="text" name="author" class="form-control" value="{{ old('author') }}">
          </div>
          <div class="form-group">
            <label for="description" class="form-label">Description: </label>
            <textarea type="text" name="description" class="form-control">{{ old('description') }}</textarea>
          </div>


          <div class="form-group">
            <label for="cover" class="form-label">Cover: </label>
            <input type="file" id="cover" name="cover" class="form-control">
          </div>
          <div class="form-group">
            <label for="file" class="form-label">File: </label>
            <input type="file" id="file" name="file" class="form-control">
          </div>


          <div class="form-group">

            <button type="submit" class="btn btn-primary mt-3">
              <i class="fa fa-plus fa-fw fa-lg"></i> Create
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@stop
