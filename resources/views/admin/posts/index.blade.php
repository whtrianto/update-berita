@extends('layouts.admin')

@section('title','Posts')

@section('content')
<h1>Posts</h1>
<a href="{{ route('posts.create') }}" role="button">New Post</a>

<table>
    <thead>
        <tr>
            <th>Title</th>
            <th>Category</th>
            <th>Published</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
        <tr>
            <td>{{ $post->title }}</td>
            <td>{{ optional($post->category)->name }}</td>
            <td>{{ $post->is_published ? 'Yes' : 'No' }}</td>
            <td>
                <a href="{{ route('posts.edit', $post) }}">Edit</a>
                <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Delete?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $posts->links() }}
@endsection