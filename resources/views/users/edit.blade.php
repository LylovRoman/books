@extends('template')

@section('title', 'Редактировать пользователя')

@section('content')
    <h1>Редактировать пользователя</h1>
    <form method="POST" action="{{ route('users.update', ['user' => $user]) }}">
        @csrf
        <label for="name">Имя:</label>
        <input type="text" name="name" id="name" value="{{ $user->name }}">
        <label for="role">Роль:</label>
        <select name="role" id="role">
            <option value="user" {{ ($user->role === "user") ? 'selected' : '' }}>Пользователь</option>
            <option value="admin" {{ ($user->role === "admin") ? 'selected' : '' }}>Администратор</option>
        </select>
        <button type="submit">Отправить</button>
    </form>
@endsection
