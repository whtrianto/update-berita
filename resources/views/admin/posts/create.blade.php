@extends('layouts.admin')

@section('title','New Post')

@section('content')
<h1>New Post</h1>
<form method="POST" action="{{ route('posts.store') }}">
    @csrf
    <label>Title
        <input name="title" value="{{ old('title') }}" required>
    </label>
    <label>Slug
        <input name="slug" value="{{ old('slug') }}" required>
    </label>
    <label>Category
        <select name="category_id">
            <option value="">- none -</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}" @selected(old('category_id')==$category->id)>{{ $category->name }}</option>
            @endforeach
        </select>
    </label>
    <fieldset>
        <legend>Tags</legend>
        @foreach($tags as $tag)
        <label>
            <input type="checkbox" name="tags[]" value="{{ $tag->id }}" @checked(collect(old('tags', []))->contains($tag->id))>
            {{ $tag->name }}
        </label>
        @endforeach
    </fieldset>
    <label>Excerpt
        <textarea name="excerpt">{{ old('excerpt') }}</textarea>
    </label>
    <label>Content
        <textarea name="content" rows="10">{{ old('content') }}</textarea>
    </label>
    <label>Thumbnail Path
        <input name="thumbnail_path" value="{{ old('thumbnail_path') }}">
    </label>
    <label>Published At
        <input type="datetime-local" name="published_at" value="{{ old('published_at') }}">
    </label>
    <label>
        <input type="checkbox" name="is_published" value="1" @checked(old('is_published'))>
        Published
    </label>
    <button type="submit">Save</button>
</form>
@endsection