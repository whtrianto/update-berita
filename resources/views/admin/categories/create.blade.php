@extends('layouts.admin')

@section('title','New Category')

@section('content')
<h1>New Category</h1>
<form method="POST" action="{{ route('categories.store') }}">
    @csrf
    <label>Name
        <input name="name" value="{{ old('name') }}" required>
    </label>
    <label>Slug
        <input name="slug" value="{{ old('slug') }}" required>
    </label>
    <label>Description
        <textarea name="description">{{ old('description') }}</textarea>
    </label>
    <button type="submit">Save</button>
</form>
@endsection