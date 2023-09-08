@extends('template')

@section('title', 'Редактировать выдачу книги')

@section('content')
    <h1>Редактировать выдачу книги</h1>
    <form method="POST" action="{{ route('book-user.update', ['bookuser' => $bookuser]) }}">
        @csrf
        <label for="book_id">Название:</label>
        <select name="book_id" id="book_id">
            @foreach($books as $book)
                <option value="{{ $book->id }}" {{ ($bookuser->book_id === $book->id) ? 'selected' : '' }}>{{ $book->name }}</option>
            @endforeach
        </select>
        <label for="author_id">Кому:</label>
        <select name="user_id" id="user_id">
            @foreach($users as $user)
                <option value="{{ $user->id }}" {{ ($bookuser->user_id === $user->id) ? 'selected' : '' }}>{{ $user->name }}</option>
            @endforeach
        </select>
        <label for="return_date">До:</label>
        <input type="date" name="return_date" id="return_date" value="{{ $bookuser->return_date }}">
        <button type="submit">Отправить</button>
    </form>
@endsection
