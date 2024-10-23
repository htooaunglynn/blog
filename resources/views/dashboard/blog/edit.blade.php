@props(['categories'])

@extends('dashboard.layout.index')

@section('title')
    <title>Blog</title>
@endsection

@section('main')
    <div class="flex h-full flex-col content-center items-center justify-evenly">
        <form enctype="multipart/form-data" action="/dashboard/blog/{{ $blog->id }}"
            class="w-10/12 shrink basis-full rounded-lg border border-solid border-slate-500 p-5 shadow-lg overflow-y-auto" method="POST">
            @csrf
            @method('PUT')
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <x-form.input name="title" type="text" value="{{ $blog->title }}" />
                        </div>

                        <div class="sm:col-span-3">
                            <x-form.input name="slug" type="text" value="{{ $blog->slug }}" />
                        </div>
                    </div>
                    {{--  --}}
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <x-form.input name="intro" type="text" value="{{ $blog->intro }}" />
                        </div>

                        <div class="sm:col-span-3">
                            <label for="categories" class="mb-2 block text-sm font-medium text-gray-900">Select an
                                option</label>
                            <select id="categories" name="category_id"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500">
                                @foreach ($categories as $category)
                                    <option {{ $category->id == old('category_id', $blog->category->id) ? 'selected' : '' }}
                                        value="{{ $category->id }}">
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                            <x-error name="category_id" />
                        </div>
                    </div>

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-6">
                            <x-form.file />
                            @if ($blog->img != null)
                                <img src="/storage/{{ $blog->img }}" width="90px" height="150px" alt="img">
                            @endif
                        </div>
                    </div>

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-6">
                            <x-form.textarea name="body" value="{{ $blog->body }}" />
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <div class="mt-6 flex items-center justify-end gap-x-6">
        <a href="/dashboard/blog" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
        <button type="submit"
            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
    </div>
    </form>
    </div>
@endsection
