@extends('layouts.public')

@section('title', $post->title)

@section('content')
<article class="article">
    <div class="card-media" style="border-radius:12px;">
        <img src="{{ $post->thumbnail_path ?: 'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?q=80&w=1600&auto=format&fit=crop' }}" alt="{{ $post->title }}">
    </div>
    <h1>{{ $post->title }}</h1>
    <div class="meta">
        Kategori: <a href="{{ route('public.category', optional($post->category)->slug) }}">{{ optional($post->category)->name ?: 'Umum' }}</a>
        &middot; Dipublikasikan: {{ optional($post->published_at)->format('d M Y') }}
    </div>
    <div class="content">{!! nl2br(e($post->content)) !!}</div>
    <div class="tags" style="margin-top:1rem">
        @foreach($post->tags as $tag)
        <a class="badge" href="{{ route('public.tag', $tag->slug) }}">#{{ $tag->name }}</a>
        @endforeach
    </div>
</article>

@if($related->count())
<h3 style="margin-top:2rem">Berita Terkait</h3>
<div class="grid">
    @foreach($related as $r)
    <article class="card">
        <a href="{{ route('public.post', $r->slug) }}" class="card-media">
            <img src="{{ $r->thumbnail_path ?: 'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?q=80&w=1600&auto=format&fit=crop' }}" alt="{{ $r->title }}">
        </a>
        <div class="content">
            <a class="badge" href="{{ route('public.category', optional($r->category)->slug) }}">{{ optional($r->category)->name ?: 'Umum' }}</a>
            <h3 class="title"><a href="{{ route('public.post', $r->slug) }}">{{ $r->title }}</a></h3>
            <div class="actions"><span></span><a class="readmore" href="{{ route('public.post', $r->slug) }}">Baca selengkapnya →</a></div>
        </div>
    </article>
    @endforeach
</div>
@endif
@endsection