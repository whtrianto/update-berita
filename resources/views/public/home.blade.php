@extends('layouts.public')

@section('title','Beranda')

@section('hero')
<header class="hero" style="margin-bottom:1rem;">
    <div class="container">
        <h1 style="margin-left:1rem;">Berita Terbaru</h1>
        <p style="margin-left:1rem;">Update informasi terkini dari berbagai kategori.</p>
    </div>
</header>
@endsection

@section('content')
<section>
    <div class="grid">
        @foreach($posts as $post)
        <article class="card">
            <a href="{{ route('public.post', $post->slug) }}" class="card-media">
                <img src="{{ $post->thumbnail_path ?: 'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?q=80&w=1600&auto=format&fit=crop' }}" alt="{{ $post->title }}">
            </a>
            <div class="content">
                <a class="badge" href="{{ route('public.category', optional($post->category)->slug) }}">{{ optional($post->category)->name ?: 'Umum' }}</a>
                <div class="meta">Dipublikasikan {{ optional($post->published_at)->format('d M Y') }}</div>
                <h3 class="title"><a href="{{ route('public.post', $post->slug) }}">{{ $post->title }}</a></h3>
                <p class="excerpt">{{ $post->excerpt ?: Str::limit(strip_tags($post->content), 140) }}</p>
                <div class="actions">
                    <span></span>
                    <a class="readmore" href="{{ route('public.post', $post->slug) }}">Baca selengkapnya →</a>
                </div>
            </div>
        </article>
        @endforeach
    </div>
    <div style="margin-top:1rem">{{ $posts->links() }}</div>
</section>
@endsection