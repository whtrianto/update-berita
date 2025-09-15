@extends('layouts.admin')

@section('title','Edit Category')

@section('content')
<h1>Edit Category</h1>
<form method="POST" action="{{ route('categories.update', $category) }}">
    @csrf
    @method('PUT')
    <label>Name
        <input name="name" value="{{ old('name', $category->name) }}" required>
    </label>
    <label>Slug
        <input name="slug" value="{{ old('slug', $category->slug) }}" required>
    </label>
    <label>Description
        <textarea name="description">{{ old('description', $category->description) }}</textarea>
    </label>
    <button type="submit">Update</button>
</form>
@endsection