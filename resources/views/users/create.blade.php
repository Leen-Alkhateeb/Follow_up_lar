@extends('layouts.app')
@section('title', 'Add User')

@section('content')
<h2>Add User</h2>

@if($errors->any())
    <ul class="errors">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <p>Name: <input type="text" name="name" value="{{ old('name') }}"></p>
    <p>Email: <input type="email" name="email" value="{{ old('email') }}"></p>
    <p>Password: <input type="password" name="password"></p>
    <p>Confirm Password: <input type="password" name="password_confirmation"></p>
    <button type="submit">Save</button>
    <a href="{{ route('users.index') }}">Cancel</a>
</form>
@endsection