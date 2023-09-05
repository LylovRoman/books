@extends('template')

@section('title', 'Книга')

@section('content')
    <h1>Книга</h1>
    <ul class="list-group">
        <li class="list-group-item">ID: {{ $book->id }}</li>
        <li class="list-group-item">Имя: {{ $book->name }}</li>
        <li class="list-group-item">ID автора: {{ $book->author_id }}</li>
    </ul>
@endsection
