<tr>
  <td>
    <a href="{{ route('books.show', $book->id) }}">{{ $book->isbn }}</a>
  </td>
  <td>
    <a href="{{ route('books.show', $book->id) }}">{{ $book->name }}</a>
  </td>
  <td>{{ $book->author }}</td>
  <td>
    {{ App\Models\Category::find($book->category_id)->first()->name }}
  </td>

  @if (in_array(App\Models\User::getRole(Auth::user()), ['Superuser', 'Books admin']))
  <td>
    <form action="{{ route('books.edit', $book->id) }}" method="get">
      <button type="submit" class="btn btn-sm btn-secondary">
        <i class="fa fa-cog"></i> Update
      </button>
    </form>
  </td>
  <td>
    <form action="{{ route('books.destroy', $book->id) }}" method="post">
      {{ csrf_field() }}
      {{ method_field('DELETE') }}
      <button type="submit" class="btn btn-sm btn-danger">
        <i class="fa fa-trash-o fa-lg"></i> Delete
      </button>
    </form>
  </td>
  @endif
</tr>
