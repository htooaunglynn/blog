@props(['slug'])

<form class="mb-6" method="POST" action="/blog/{{ $slug }}/comment">
    @csrf
    <div class="mb-4 rounded-lg rounded-t-lg border border-gray-200 bg-white px-4 py-2">
        <label for="body" class="sr-only">Your comment</label>
        <textarea id="body" name="body" rows="6"
            class="w-full border-0 px-0 text-sm text-gray-900 focus:outline-none focus:ring-0" placeholder="Write a comment..."
            required></textarea>
        <x-error name="body" />
    </div>
    <button type="submit"
        class="bg-primary-700 focus:ring-primary-200 hover:bg-primary-800 inline-flex items-center rounded-lg bg-blue-600 px-4 py-2.5 text-center text-xs font-medium text-white focus:ring-4">
        Post comment
    </button>
</form>
