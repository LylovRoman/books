@extends('templatePdf')

@section('title', 'Пользователи')

@section('content')
    <p>Пользователи</p>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Имя</th>
            <th scope="col">Роль</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td><a href="{{ route('users.show', ['user' => $user]) }}" style="text-decoration: none">{{ $user->name }}</a></td>
                <td>{{ $user->role }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
