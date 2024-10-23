@props(['comments', 'slug'])

<section class="bg-white py-8 antialiased lg:py-16">
    <div class="mx-auto max-w-2xl px-4">
        @auth
            <x-comment-form :slug="$slug" />
        @endauth
        @if ($comments->count())
            <div class="mb-6 flex items-center justify-between">
                <h2 class="text-lg font-bold text-gray-900 lg:text-2xl">Discussion ({{ $comments->count() }})</h2>
            </div>
        @endif
        @foreach ($comments as $comment)
            <x-single-comment :comment="$comment" />
        @endforeach

        <div class="mt-3">
            {{ $comments->links() }}
        </div>
    </div>
</section>
