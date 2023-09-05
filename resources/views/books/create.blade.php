@extends('template')

@section('title', 'Добавить книгу')

@section('content')
    <h1>Добавить книгу</h1>
    <form method="POST" action="{{ route('books.store') }}">
        @csrf
        <label for="name">Название:</label>
        <input type="text" name="name" id="name">
        <label for="author_id">Автор:</label>
        <input type="number" name="author_id" id="author_id">
        <button type="submit">Отправить</button>
    </form>
@endsection
