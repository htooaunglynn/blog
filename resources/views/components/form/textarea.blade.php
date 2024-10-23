@props(['name', 'value' => ''])
<label for="{{ $name }}" class="mb-2 block text-sm font-medium text-gray-900">{{ ucwords($name) }}</label>
<div class="mt-2">
    <textarea rows="5" id="editor"
        class="block w-full rounded-lg border border-gray-100 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-200"
        placeholder="Write your thoughts here..." name="{{ $name }}">{!! old($name, $value) !!}</textarea>
    <x-error name="{{ $name }}" />
