@extends('template')

@section('title', 'Выданные книги')

@section('content')
    <h1>Выданные книги
        @if(Auth::check())
            <a href="{{ route('book-user.create') }}" style="text-decoration: none">+</a>
        @endif
    </h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Книга</th>
            <th scope="col">Пользователь</th>
            <th scope="col">Дата возврата</th>
            <th scope="col">Редактировать</th>
            <th scope="col">Удалить</th>
        </tr>
        </thead>
        <tbody>
        @foreach($bookusers as $bookuser)
            <tr>
                <th scope="row"><a href="{{ route('book-user.show', ['bookuser' => $bookuser]) }}" style="text-decoration: none">{{ $bookuser->id }}</a></th>
                <td><a href="{{ route('books.show', ['book' => $bookuser->book]) }}" style="text-decoration: none">{{ $bookuser->book->name }}</a></td>
                <td><a href="{{ route('users.show', ['user' => $bookuser->user]) }}" style="text-decoration: none">{{ $bookuser->user->name }}</a></td>
                <td>{{ substr($bookuser->return_date, 0, -9) }}</td>
                <th scope="col"><a href="{{ route('book-user.edit', ['bookuser' => $bookuser]) }}" style="text-decoration: none">✏️</a></th>
                <th scope="col"><a href="{{ route('book-user.destroy', ['bookuser' => $bookuser]) }}" style="text-decoration: none">❌</a></th>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a href="{{ route('book-user.export.pdf') }}">Скачать PDF</a>
    <a href="{{ route('book-user.export.csv') }}">Скачать CSV</a>
    <a href="{{ route('book-user.export.xls') }}">Скачать XLS</a>
@endsection
