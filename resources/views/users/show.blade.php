@extends('layouts.app')
@section('title', $user->name)

@section('content')
<h2>{{ $user->name }}</h2>
<p>Email: {{ $user->email }}</p>

<h3>Seller (One-to-One)</h3>
@if($user->seller)
    <p>Store: {{ $user->seller->store_name }}</p>
    <p>Phone: {{ $user->seller->phone }}</p>
@else
    <p>This user is not a seller.</p>
@endif

<a href="{{ route('users.index') }}">Back</a>
@endsection