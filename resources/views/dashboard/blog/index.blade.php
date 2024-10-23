@extends('dashboard.layout.index')

@section('title')
    <title>Blog</title>
@endsection

@section('main')
    <x-dashboard.container>
        <x-dashboard.menu>
            <div class="basis-2/12">

                <a href="/dashboard/blog/create" class="rounded-lg border-2 px-2 py-1">Create</a>
            </div>

            <div class="basis-10/12">
                <x-success />
            </div>
        </x-dashboard.menu>

        <x-dashboard.tablecontainer>
            <thead class="bg-gray-50 text-xs uppercase text-gray-700">
                <tr>
                    <x-table.th name="id" />
                    <x-table.th name="title" />
                    <x-table.th name="slug" />
                    <x-table.th name="intro" />
                    <x-table.th name="body" />
                    <x-table.th name="category" />
                    <x-table.th name="author" />
                    <x-table.th name="published at" />
                    <x-table.th name="action" />

                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $index => $blog)
                    <tr class="border-b odd:bg-white even:bg-gray-50">
                        <x-table.td
                            name="{{ $blogs->currentPage() * $blogs->perPage() - $blogs->perPage() + $index + 1 }}" />
                        <x-table.td name="{{ Str::limit($blog->title, 15, '...') }}" />
                        <x-table.td name="{{ Str::limit($blog->slug, 15, '...') }}" />
                        <x-table.td name="{{ Str::limit($blog->intro, 15, '...') }}" />
                        <x-table.td name="{{ \Illuminate\Support\Str::limit($blog->body, 20, $end = '...') }}" />
                        <x-table.td name="{{ $blog->category->name }}" />
                        <x-table.td name="{{ $blog->author->name }}" />
                        <x-table.td name="{{ $blog->created_at }}" />
                        <td class="flex justify-evenly px-6 py-4">
                            <a href="/dashboard/blog/{{ $blog->id }}/edit"
                                class="font-medium text-blue-600 hover:underline">Edit</a>
                            <div class="inline">
                                <form action="/dashboard/blog/{{ $blog->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-medium text-red-600 hover:underline">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </x-dashboard.tablecontainer>
        <x-dashboard.paginate>
            {{ $blogs->links() }}
        </x-dashboard.paginate>
    </x-dashboard.container>
@endsection
