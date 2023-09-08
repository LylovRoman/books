@extends('templatePdf')

@section('title', 'Авторы')

@section('content')
    <p>Авторы</p>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Автор</th>
            <th scope="col">Количество книг</th>
        </tr>
        </thead>
        <tbody>
        @foreach($authors as $author)
            <tr>
                <th scope="row">{{ $author->id }}</th>
                <td><a href="{{ route('authors.show', ['author' => $author]) }}" style="text-decoration: none">{{ $author->name }}</a></td>
                <td>{{ $author->books_count }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
