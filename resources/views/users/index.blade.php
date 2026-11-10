@extends('layouts.app')
@section('title', 'Users')

@section('content')
<h2>Users</h2>
<a href="{{ route('users.create') }}">Add User</a>

<table>
    <tr><th>#</th><th>Name</th><th>Email</th><th>Seller</th><th>Actions</th></tr>
    @foreach($users as $user)
    <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->seller->store_name ?? '-' }}</td>
        <td>
            <a href="{{ route('users.show', $user) }}">Show</a>
            <a href="{{ route('users.edit', $user) }}">Edit</a>
            <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Delete this user?')">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection