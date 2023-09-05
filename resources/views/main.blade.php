@extends('template')

@section('title', 'Книги')

@section('content')
    <h1>Главная</h1>
    @foreach($authors as $author)
        <p>
            {{ $author->name }}:
            @foreach($author->books as $book)
                <a href="{{ route('books.show', ['book' => $book]) }}">{{ $book->name }}</a> |
            @endforeach
        </p>
    @endforeach
@endsection
