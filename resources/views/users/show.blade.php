@extends('template')

@section('title', 'Пользователь')

@section('content')
    <h1>Пользователь</h1>
    <ul class="list-group">
        <li class="list-group-item">ID: {{ $user->id }}</li>
        <li class="list-group-item">Имя: {{ $user->name }}</li>
        <li class="list-group-item">ID автора: {{ $user->role }}</li>
    </ul>
@endsection
