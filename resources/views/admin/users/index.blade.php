@extends('layouts.admin')

@section('title','Users')

@section('content')
<header style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1rem">
    <h3 style="margin:0">Users</h3>
    <a role="button" href="{{ route('users.create') }}">Tambah User</a>
</header>

@if(session('status'))
<article>{{ session('status') }}</article>
@endif

<table>
    <thead>
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th style="width:160px">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <a role="button" class="secondary" href="{{ route('users.edit',$user) }}">Edit</a>
                @if(auth()->id() !== $user->id)
                <form method="POST" action="{{ route('users.destroy',$user) }}" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="contrast" onclick="return confirm('Hapus user ini?')">Hapus</button>
                </form>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div style="margin-top:1rem">{{ $users->links() }}</div>
@endsection