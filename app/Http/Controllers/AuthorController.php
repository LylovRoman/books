<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorRequest;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::query()->withCount('books')->get();

        return view('authors.index', compact('authors'));
    }
    public function create()
    {
        return view('authors.create');
    }
    public function store(AuthorRequest $request)
    {
        $validated = $request->validated();

        Author::query()->create([
            'name' => $validated['name']
        ]);

        return redirect()->route('authors.index');
    }

    public function show(Author $author)
    {
        return view('authors.show', compact('author'));
    }

    public function edit(Author $author)
    {
        return view('authors.edit', compact('author'));
    }
    public function update(AuthorRequest $request, Author $author)
    {
        $validated = $request->validated();

        $author->update([
            'name' => $validated['name']
        ]);

        return redirect()->route('authors.index');
    }
    public function destroy(Author $author)
    {
        $author->delete();

        return redirect()->route('authors.index');
    }
}
