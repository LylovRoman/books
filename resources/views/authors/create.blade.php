@extends('template')

@section('title', 'Добавить автора')

@section('content')
    <h1>Добавить автора</h1>
    <form method="POST" action="{{ route('authors.store') }}">
        @csrf
        <label for="name">Имя:</label>
        <input type="text" name="name" id="name">
        <button type="submit">Отправить</button>
    </form>
@endsection
