@extends('layouts.admin')

@section('title','Edit User')

@section('content')
<h3>Edit User</h3>

@if ($errors->any())
<article>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</article>
@endif

<form method="POST" action="{{ route('users.update',$user) }}">
    @csrf
    @method('PUT')
    <label>Nama</label>
    <input type="text" name="name" value="{{ old('name',$user->name) }}" required>

    <label>Email</label>
    <input type="email" name="email" value="{{ old('email',$user->email) }}" required>

    <label>Password (kosongkan jika tidak diubah)</label>
    <input type="password" name="password">

    <button type="submit">Update</button>
    <a role="button" class="secondary" href="{{ route('users.index') }}">Batal</a>
</form>
@endsection