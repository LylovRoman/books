@extends('templatePdf')

@section('title', 'Книги')

@section('content')
    <p>Книги</p>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Книга</th>
            <th scope="col">Автор</th>
        </tr>
        </thead>
        <tbody>
        @foreach($books as $book)
            <tr>
                <th scope="row">{{ $book->id }}</th>
                <td><a href="{{ route('books.show', ['book' => $book]) }}" style="text-decoration: none">{{ $book->name }}</a></td>
                <td>{{ $book->author->name }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
