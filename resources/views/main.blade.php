@extends('template')

@section('title', 'Главная')

@section('content')
    <h1>Главная</h1>
    @foreach($authors as $author)
        <p>
            <b>{{ $author->name }}</b>:
            @foreach($author->books as $book)
                @if(Auth::check())
                    <a href="{{ route('books.show', ['book' => $book]) }}">{{ $book->name }}</a> |
                @else
                    {{ $book->name }} |
                @endif
            @endforeach
        </p>
    @endforeach
@endsection
