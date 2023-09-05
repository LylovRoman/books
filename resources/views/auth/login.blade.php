@extends('template')

@section('title', 'Вход')

@section('content')
    <h1>Вход</h1>
    <form method="POST" action="/login">
        @csrf
        <label for="name">Имя:</label>
        <input type="text" name="name" id="name">
        <label for="password">Пароль:</label>
        <input type="password" name="password" id="password">
        <button type="submit">Отправить</button>
    </form>
@endsection
