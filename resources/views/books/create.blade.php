@extends('template')

@section('title', 'Добавить книгу')

@section('content')
    <h1>Добавить книгу</h1>
    <form method="POST" action="{{ route('books.store') }}">
        @csrf
        <label for="name">Название:</label>
        <input type="text" name="name" id="name">
        <label for="author_id">Автор:</label>
        <select name="author_id" id="author_id">
            @foreach($authors as $author)
                <option value="{{ $author->id }}">{{ $author->name }}</option>
            @endforeach
        </select>
        <button type="submit">Отправить</button>
    </form>
@endsection
