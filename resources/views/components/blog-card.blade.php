@props(['blog'])

<div class="card">
    <article>
        @if ($blog->img != null)
            <img src='{{ asset("storage/$blog->img") }}' alt="{{ $blog->title }}">
        @else
            <img src="/img/blog.jpg" alt="{{ $blog->title }}">
        @endif
    </article>
    <article>
        <a href="/blog/{{ $blog->slug }}" class="card-title">{{ $blog->title }}</a>
        <p class="card-intro">
            {{ $blog->intro }}
        </p>
        <a href="/blogs?author={{ $blog->author->username }}{{ request('search') ? '&search=' . request('search') : '' }}{{ request('category') ? '&category=' . request('category') : '' }}"
            class="card-author">
            Author - {{ $blog->author->name }}
        </a>
        <a href="/blogs?category={{ $blog->category->slug }}{{ request('search') ? '&search=' . request('search') : '' }}{{ request('author') ? '&author=' . request('author') : '' }}"
            class="card-category">
            {{ $blog->category->name }}
        </a>
        <p class="card-created">
            Published at - {{ $blog->created_at }}
        </p>
    </article>
</div>
