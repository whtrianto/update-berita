@extends('layouts.admin')

@section('title','New Tag')

@section('content')
<h1>New Tag</h1>
<form method="POST" action="{{ route('tags.store') }}">
    @csrf
    <label>Name
        <input name="name" value="{{ old('name') }}" required>
    </label>
    <label>Slug
        <input name="slug" value="{{ old('slug') }}" required>
    </label>
    <button type="submit">Save</button>
</form>
@endsection