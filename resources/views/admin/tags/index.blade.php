@extends('layouts.admin')

@section('title','Tags')

@section('content')
<h1>Tags</h1>
<a href="{{ route('tags.create') }}" role="button">New Tag</a>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Slug</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($tags as $tag)
        <tr>
            <td>{{ $tag->name }}</td>
            <td>{{ $tag->slug }}</td>
            <td>
                <a href="{{ route('tags.edit', $tag) }}">Edit</a>
                <form action="{{ route('tags.destroy', $tag) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Delete?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $tags->links() }}
@endsection