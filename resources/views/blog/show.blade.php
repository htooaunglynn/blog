@props(['comments'])

@extends('layout.layout')

@section('title')
    <title>{{ $blog->title }}</title>
@endsection

@section('main')
    <div class="blog-detail">

        <div class="blog-detail-container">
            @if ($blog->img != null)
                <article style='background-image: url({{ asset("storage/$blog->img") }});'>
                </article>
            @else
                <article style='background-image: url("/img/blog.jpg");'>
                </article>
            @endif

            <article>
                <div>
                    <h1 class="text-3xl font-bold">{{ $blog->title }}</h1>
                    <a href="/blogs?category={{ $blog->category->slug }}{{ request('search') ? '&search=' . request('search') : '' }}{{ request('author') ? '&author=' . request('author') : '' }}"
                        class="card-category" class="card-category">{{ $blog->category->name }}</a>
                </div>
                <div class="detail-author-container">
                    <img src="{{ $blog->author->avatar }}" alt="{{ $blog->author->name }}"
                        class="mr-5 h-[4.5rem] w-[4.5rem] rounded-full">
                    <article class="flex h-full basis-full items-center justify-between">
                        <div class="flex h-3/4 flex-col items-start justify-around">
                            <a href="/blogs?author={{ $blog->author->username }}{{ request('search') ? '&search=' . request('search') : '' }}{{ request('category') ? '&category=' . request('category') : '' }}"
                                class="card-author">Author -
                                {{ $blog->author->name }}</a>
                            <p class="card-created">Published at - {{ $blog->created_at }}</p>
                        </div>
                        @auth
                            <x-blog-subscribe-form :blog="$blog" />
                        @endauth
                    </article>
                </div>
            </article>
            <article>{!! $blog->body !!}</article>
        </div>
        @auth
            <x-comment :comments="$blog->comments()->latest()->paginate(4)->withQueryString()" :slug="$blog->slug" />
        @endauth
        <x-random-blog />
    </div>
@endsection
