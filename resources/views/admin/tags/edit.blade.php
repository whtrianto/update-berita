@extends('layouts.admin')

@section('title','Edit Tag')

@section('content')
<h1>Edit Tag</h1>
<form method="POST" action="{{ route('tags.update', $tag) }}">
    @csrf
    @method('PUT')
    <label>Name
        <input name="name" value="{{ old('name', $tag->name) }}" required>
    </label>
    <label>Slug
        <input name="slug" value="{{ old('slug', $tag->slug) }}" required>
    </label>
    <button type="submit">Update</button>
</form>
@endsection