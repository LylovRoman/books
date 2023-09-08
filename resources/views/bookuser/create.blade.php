@extends('template')

@section('title', 'Выдать книгу')

@section('content')
    <h1>Выдать книгу</h1>
    <form method="POST" action="{{ route('book-user.store') }}">
        @csrf
        <label for="book_id">Название:</label>
        <select name="book_id" id="book_id">
            @foreach($books as $book)
                <option value="{{ $book->id }}">{{ $book->name }}</option>
            @endforeach
        </select>
        <label for="user_id">Кому:</label>
        <select name="user_id" id="user_id">
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
        <label for="return_date">До:</label>
        <input type="date" name="return_date" id="return_date">
        <button type="submit">Отправить</button>
    </form>
@endsection
