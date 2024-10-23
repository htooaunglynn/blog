@props(['categories', 'currentCategory'])

<div class="relative">
    <div class="flex cursor-pointer select-none items-center justify-center hover:text-[#8bc34a]" id="navCategory">
        {{ isset($currentCategory) ? $currentCategory->name : 'CATEGORY' }}
        <i class="material-icons">
            keyboard_arrow_down
        </i>
    </div>
    <ul class="absolute top-[30px] hidden w-full bg-[#f8f9fa]" id="navList">
        @foreach ($categories as $category)
            <li
                class="my-2 w-full rounded-lg border-[1px] border-solid border-[#6c757d] text-center text-[#6c757d] hover:border-[#8bc34a] hover:text-[#8bc34a]">
                <a class="block"
                    href="/blogs?category={{ $category->slug }}{{ request('search') ? '&search=' . request('search') : '' }}{{ request('author') ? '&author=' . request('author') : '' }}">{{ $category->name }}</a>
            </li>
        @endforeach
    </ul>
</div>
