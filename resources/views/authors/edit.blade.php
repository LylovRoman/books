@extends('template')

@section('title', 'Редактировать автора')

@section('content')
    <h1>Редактировать автора</h1>
    <form method="POST" action="{{ route('authors.update', ['author' => $author]) }}">
        @csrf
        <label for="name">Имя:</label>
        <input type="text" name="name" id="name" value="{{ $author->name }}">
        <button type="submit">Отправить</button>
    </form>
@endsection
