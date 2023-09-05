<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::query()->with('author')->get();

        return view('books.index', compact('books'));
    }
    public function create()
    {
        return view('books.create');
    }
    public function store(BookRequest $request)
    {
        $validated = $request->validated();

        Book::query()->create([
                'name' => $validated['name'],
                'author_id' => $validated['author_id']
        ]);

        return redirect()->route('books.index');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }
    public function update(BookRequest $request, Book $book)
    {
        $validated = $request->validated();

        $book->update([
            'name' => $validated['name'],
            'author_id' => $validated['author_id']
        ]);

        return redirect()->route('books.index');
    }
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index');
    }
}