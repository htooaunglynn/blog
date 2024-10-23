@props(['randomBlogs'])

<div class="random-blog">
    <h1 class="text-3xl">You may also like.</h1>
    <article class="blog-container">
        {{-- :blogs => This is called prop --}}
        @foreach ($randomBlogs as $blog)
            <x-blog-card :blog="$blog" />
        @endforeach
    </article>
</div>
