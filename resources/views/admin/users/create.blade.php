@extends('layouts.admin')

@section('title','Tambah User')

@section('content')
<h3>Tambah User</h3>

@if ($errors->any())
<article>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</article>
@endif

<form method="POST" action="{{ route('users.store') }}">
    @csrf
    <label>Nama</label>
    <input type="text" name="name" value="{{ old('name') }}" required>

    <label>Email</label>
    <input type="email" name="email" value="{{ old('email') }}" required>

    <label>Password</label>
    <input type="password" name="password" required>

    <button type="submit">Simpan</button>
    <a role="button" class="secondary" href="{{ route('users.index') }}">Batal</a>
</form>
@endsection