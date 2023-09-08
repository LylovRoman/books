@extends('template')

@section('title', 'Выданная книга')

@section('content')
    <h1>Выданная книга</h1>
    <ul class="list-group">
        <li class="list-group-item">ID: {{ $bookuser->id }}</li>
        <li class="list-group-item">ID книги: {{ $bookuser->book_id }}</li>
        <li class="list-group-item">ID пользователя: {{ $bookuser->user_id }}</li>
        <li class="list-group-item">Дата возврата: {{ $bookuser->return_date }}</li>
    </ul>
@endsection
