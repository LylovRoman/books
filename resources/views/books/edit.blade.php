@extends('template')

@section('title', 'Редактировать книгу')

@section('content')
    <h1>Редактировать книгу</h1>
    <form method="POST" action="{{ route('books.update', ['book' => $book]) }}">
        @csrf
        <label for="name">Название:</label>
        <input type="text" name="name" id="name" value="{{ $book->name }}">
        <label for="author_id">Автор:</label>
        <select name="author_id" id="author_id">
            @foreach($authors as $author)
                <option value="{{ $author->id }}" {{ ($book->author_id === $author->id) ? 'selected' : '' }}>{{ $author->name }}</option>
            @endforeach
        </select>
        <label for="quantity">Количество:</label>
        <input type="number" name="quantity" id="quantity" value="{{ $book->quantity }}">
        <button type="submit">Отправить</button>
    </form>
@endsection
