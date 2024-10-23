@props(['blog'])

<div>
    <form action="/blog/{{ $blog->slug }}/subscribe" method="post">
        @csrf
        @if (auth()->user()->isSubscribed($blog))
            <button type="submit"
                class="rounded-lg bg-green-500 px-3 py-2 text-white hover:bg-red-500">Subscribed</button>
        @else
            <button type="submit"
                class="rounded-lg bg-red-500 px-3 py-2 text-white hover:bg-green-500">Unsubscribed</button>
        @endif
    </form>
</div>
