<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use App\Models\BookInfo;
use App\Models\Category;
use App\Models\Lent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            'except' => []
        ]);
    }

    public function home(Request $request)
    {
        $books = DB::table('books');
        if ($request->input('category'))
            $books = $books->where('category_id', '=', $_GET['category']);
        if ($request->input('keywords'))
            $books = $books->where('name', 'like', '%' . $_GET['keywords'] . '%');
        $books = $books->paginate(12);
        // dd($books);
        return view('books.Home', compact('books'));
    }


    public function public(Request $request)
    {
        $books = DB::table('public_books');
        if ($request->input('author'))
            $books = $books->where('author', 'like', '%' . $_GET['author'] . '%');
        if ($request->input('keywords'))
            $books = $books->where('title', 'like', '%' . $_GET['keywords'] . '%');
        $books = $books->paginate(12);

        return view('books.global', compact('books'));
    }

    public function create()
    {
        if (in_array(User::getRole(Auth::user()), ['Superuser', 'Books admin'])) {
            $categories = Category::all();
            return view('books.create')->with('categories', $categories);
        }
        return redirect()->route('home');
    }

    public function index(Request $request)
    {
        $books = DB::table('books');
        if ($request->input('category'))
            $books = $books->where('category_id', '=', $_GET['category']);
        if ($request->input('keywords'))
            $books = $books->where('name', 'like', '%' . $_GET['keywords'] . '%');
        $books = $books->paginate(10);
        // dd($books);
        return view('books.index', compact('books'));
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        if (in_array(User::getRole(Auth::user()), ['Superuser', 'Books admin'])) {
            $categories = Category::all();
            return view('books.edit', compact('book'))->with('categories', $categories);
        }
        return redirect()->route('home');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'isbn' => 'required|string',
            'title' => 'required|max:50',
            'category_id' => 'required|integer',
            'author' => 'required|max:50',
            'cover' => 'file|image',
            'file' => 'file',

        ]);

        $data = [
            'isbn' => $request->isbn,
            'name' => $request->title,
            'category_id' => $request->category_id,
            'author' => $request->author,
            'description' => $request->description ?? "",
            'cover' => '.',
            'file' => '.',
        ];
        if ($request->hasFile("cover")) {
            $data['cover'] = $request->file('cover')->store('covers');
        }
        if ($request->hasFile("file")) {
            $data['file'] = $request->file('file')->store('files');
        }
        $book = Book::create($data);
        session()->flash('success', 'Creation succeeded.');
        return redirect()->route('books.show', [$book]);
    }

    public function update(Book $book, Request $request)
    {
        $this->validate($request, [
            'isbn' => 'required|string',
            'title' => 'required|max:50',
            'category_id' => 'required|integer',
            'author' => 'required|max:50',
            'cover' => 'file|image',
            'file' => 'file',

        ]);

        $data = [
            'isbn' => $request->isbn,
            'name' => $request->title,
            'category_id' => $request->category_id,
            'author' => $request->author,
            'description' => $request->description ?? "",
        ];
        if ($request->hasFile("cover")) {
            $data['cover'] = $request->file('cover')->store('covers');
        }
        if ($request->hasFile("file")) {
            $data['file'] = $request->file('file')->store('files');
        }
        $book->update($data);

        session()->flash('success', 'Update succeeded.');
        return redirect()->route('books.show', [$book]);
    }

    public function destroy(Book $book)
    {
        if (in_array(User::getRole(Auth::user()), ['Superuser', 'Books admin'])) {
            $book->delete();
            session()->flash('success', 'Deletion succeeded.');
            return back();
        }
    }
}
