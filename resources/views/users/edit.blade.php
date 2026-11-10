@extends('layouts.app')
@section('title', 'Edit User')

@section('content')
<h2>Edit User</h2>

@if($errors->any())
    <ul class="errors">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('users.update', $user) }}" method="POST">
    @csrf
    @method('PUT')
    <p>Name: <input type="text" name="name" value="{{ old('name', $user->name) }}"></p>
    <p>Email: <input type="email" name="email" value="{{ old('email', $user->email) }}"></p>
    <p>New Password (optional): <input type="password" name="password"></p>
    <p>Confirm Password: <input type="password" name="password_confirmation"></p>
    <button type="submit">Update</button>
    <a href="{{ route('users.index') }}">Cancel</a>
</form>
@endsection