@extends('template')

@section('title', 'Авторы')

@section('content')
    <h1>Авторы
        @if(Auth::check())
            <a href="{{ route('authors.create') }}" style="text-decoration: none">+</a>
        @endif
    </h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Автор</th>
            <th scope="col">Количество книг</th>
            @if(Auth::check())
                <th scope="col">Редактировать</th>
                <th scope="col">Удалить</th>
            @endif
        </tr>
        </thead>
        <tbody>
        @foreach($authors as $author)
            <tr>
                <th scope="row">{{ $author->id }}</th>
                <td><a href="{{ route('authors.show', ['author' => $author]) }}" style="text-decoration: none">{{ $author->name }}</a></td>
                <td>{{ $author->books_count }}</td>
                @if(Auth::check())
                    <td><a href="{{ route('authors.edit', ['author' => $author]) }}" style="text-decoration: none">✏️</a></td>
                    <td><a href="{{ route('authors.destroy', ['author' => $author]) }}" style="text-decoration: none">❌</a></td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
