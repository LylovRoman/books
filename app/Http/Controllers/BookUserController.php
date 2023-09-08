<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookUserRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\BookUser;
use App\Models\User;
use Illuminate\Http\Request;

class BookUserController extends Controller
{
    public function index()
    {
        $bookusers = BookUser::query()->with('book')->with('user')->get();

        return view('bookuser.index', compact('bookusers'));
    }
    public function create()
    {
        $books = Book::all();
        $users = User::all();

        return view('bookuser.create', compact(['books', 'users']));
    }
    public function store(BookUserRequest $request)
    {
        $validated = $request->validated();

        $book = Book::find($validated['book_id']);

        if ($book->quantity) {
            BookUser::query()->create([
                'book_id' => $validated['book_id'],
                'user_id' => $validated['user_id'],
                'return_date' => $validated['return_date']
            ]);

            $book->update([
                'quantity' => $book->quantity - 1
            ]);
        }

        return redirect()->route('book-user.index');
    }

    public function show(BookUser $bookuser)
    {
        return view('bookuser.show', compact('bookuser'));
    }

    public function edit(BookUser $bookuser)
    {
        $books = Book::all();
        $users = User::all();
        return view('bookuser.edit', compact(['bookuser', 'books', 'users']));
    }
    public function update(BookUserRequest $request, BookUser $bookuser)
    {
        $validated = $request->validated();

        $book = Book::find($bookuser->book_id);

        $book->update([
            'quantity' => $book->quantity + 1
        ]);

        $book = Book::find($validated['book_id']);

        if ($book->quantity) {
            $bookuser->update([
                'book_id' => $validated['book_id'],
                'user_id' => $validated['user_id'],
                'return_date' => $validated['return_date']
            ]);

            $book->update([
                'quantity' => $book->quantity - 1
            ]);
        }

        return redirect()->route('book-user.index');
    }
    public function destroy(BookUser $bookuser)
    {
        $book = Book::find($bookuser->book_id);

        $book->update([
            'quantity' => $book->quantity + 1
        ]);

        $bookuser->delete();

        return redirect()->route('book-user.index');
    }
}
