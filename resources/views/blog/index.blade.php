@extends('layout.layout')

@section('title')
    <title>Blog</title>
@endsection

@section('main')
    <article class="blog-container">
        {{-- :blogs => This is called prop --}}
        @forelse ($blogs as $blog)
            <x-blog-card :blog="$blog" />
        @empty
            <p>No Blogs Found</p>
        @endforelse
        {{-- <div class="blog-paginate">
        </div> --}}
    </article>
    <div class="my-10">
        {!! $blogs->links() !!}
    </div>
@endsection
