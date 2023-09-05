@extends('template')

@section('title', 'Редактировать книгу')

@section('content')
    <h1>Редактировать книгу</h1>
    <form method="POST" action="{{ route('books.update', ['book' => $book]) }}">
        @csrf
        <label for="name">Название:</label>
        <input type="text" name="name" id="name" value="{{ $book->name }}">
        <label for="author_id">Автор:</label>
        <input type="number" name="author_id" id="author_id" value="{{ $book->author_id }}">
        <button type="submit">Отправить</button>
    </form>
@endsection
