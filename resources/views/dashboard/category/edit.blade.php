@props(['category'])

@extends('dashboard.layout.index')

@section('title')
    <title>Category</title>
@endsection

@section('main')
    <div class="flex h-full flex-col content-center items-center justify-evenly">
        <form class="w-10/12 shrink basis-2/5 rounded-lg border border-solid border-slate-500 p-5 shadow-lg" method="POST"
            action="/dashboard/category/{{ $category->id }}">
            @csrf
            @method('PUT')
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-6">
                            <x-form.input name="name" type="text" value="{{ $category->name }}" />
                        </div>

                    </div>

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-6">
                            <x-form.input name="slug" type="text" value="{{ $category->slug }}" />
                        </div>
                    </div>
                </div>
            </div>


            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="/dashboard/category" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                <button type="submit"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>
        </form>
    </div>
@endsection
