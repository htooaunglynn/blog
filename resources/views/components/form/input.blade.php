@props(['name', 'type', 'value' => ''])

<label for="{{ $name }}" class="block text-sm font-medium leading-6 text-gray-900">{{ ucwords($name) }}</label>
<div class="mt-2">
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}"
        class="block w-full rounded-md border-0 p-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
        value="{{ old($name, $value) }}">
    <x-error name="{{ $name }}" />
</div>
