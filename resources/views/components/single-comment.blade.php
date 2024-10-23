@props(['comment'])

<article class="rounded-lg border-b border-gray-200 bg-white p-6 text-base">
    <footer class="mb-2 flex items-center justify-between">
        <div class="flex items-center">
            <p class="mr-3 inline-flex items-center text-sm font-semibold text-gray-900"><img
                    class="mr-2 h-9 w-9 rounded-full" src="{{ $comment->author->avatar }}"
                    alt="Michael Gough">{{ $comment->author->name }}</p>
            <p class="text-sm text-gray-600">{{ $comment->created_at }}</p>
        </div>
    </footer>
    <p class="text-gray-500">{{ $comment->body }}</p>
</article>
