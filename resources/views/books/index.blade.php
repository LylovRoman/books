@extends('template')

@section('title', 'Книги')

@section('content')
    <h1>Книги
        @if(Auth::check())
            <a href="{{ route('books.create') }}" style="text-decoration: none">+</a>
        @endif
    </h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Книга</th>
            <th scope="col">Автор</th>
            <th scope="col">Количество</th>
            <th scope="col">Редактировать</th>
            <th scope="col">Удалить</th>
        </tr>
        </thead>
        <tbody>
        @foreach($books as $book)
            <tr>
                <th scope="row">{{ $book->id }}</th>
                <td><a href="{{ route('books.show', ['book' => $book]) }}" style="text-decoration: none">{{ $book->name }}</a></td>
                <td>{{ $book->author->name }}</td>
                <td>{{ $book->quantity }}</td>
                <th scope="col"><a href="{{ route('books.edit', ['book' => $book]) }}" style="text-decoration: none">✏️</a></th>
                <th scope="col"><a href="{{ route('books.destroy', ['book' => $book]) }}" style="text-decoration: none">❌</a></th>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a href="{{ route('books.export.pdf') }}">Скачать PDF</a>
    <a href="{{ route('books.export.csv') }}">Скачать CSV</a>
    <a href="{{ route('books.export.xls') }}">Скачать XLS</a>
@endsection
