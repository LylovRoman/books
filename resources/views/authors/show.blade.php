@extends('template')

@section('title', 'Автор')

@section('content')
    <h1>Автор</h1>
    <ul class="list-group">
        <li class="list-group-item">ID: {{ $author->id }}</li>
        <li class="list-group-item">Имя: {{ $author->name }}</li>
    </ul>
@endsection
