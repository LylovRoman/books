@extends('templatePdf')

@section('title', 'Выданные книги')

@section('content')
    <p>Выданные книги</p>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Книга</th>
            <th scope="col">Пользователь</th>
            <th scope="col">Дата возврата</th>
        </tr>
        </thead>
        <tbody>
        @foreach($bookusers as $bookuser)
            <tr>
                <th scope="row"><a href="{{ route('book-user.show', ['bookuser' => $bookuser]) }}" style="text-decoration: none">{{ $bookuser->id }}</a></th>
                <td><a href="{{ route('books.show', ['book' => $bookuser->book]) }}" style="text-decoration: none">{{ $bookuser->book->name }}</a></td>
                <td><a href="{{ route('users.show', ['user' => $bookuser->user]) }}" style="text-decoration: none">{{ $bookuser->user->name }}</a></td>
                <td>{{ $bookuser->return_date }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
