@props(['categories', 'currentCategory'])

{{-- Nav --}}
<nav class="nav-container">
    <section></section>
    <section class="nav">
        <article>
            <div>
                <a href="/" class="nav-heading">Blog</a>
            </div>
            <div class="flex items-center justify-end">
                <form action="/blogs" method="GET" class="flex items-center justify-center gap-x-3">
                    <input class="rounded-lg border-2 px-2 py-1 shadow-lg" type="text" name="search" id="search"
                        placeholder="Search" value="{{ request('search') }}">
                    <button type="submit" class="flex rounded-full bg-slate-800 p-1.5 text-white">
                        <i class="material-icons">search</i>
                    </button>
                </form>
            </div>
        </article>
        <article class="nav-link-container text-xs text-[#6c757d] md:text-sm lg:text-base">
            <ul class="my-3 flex items-center justify-between">
                <li class="hover:text-[#8bc34a]">
                    <a href="/">HOME</a>
                </li>
                <li class="hover:text-[#8bc34a]">
                    <a href="/blogs">BLOG</a>
                </li>
                <li>
                    <x-nav-category-dropdown />
                </li>
                @auth
                    <li class="flex items-center justify-center hover:text-[#8bc34a]">
                        <img src="{{ auth()->user()->avatar }}" alt="{{ auth()->user()->name }}"
                            class="mr-2 hidden h-10 w-10 rounded-full lg:block">
                        <a href="#" class="uppercase">{{ auth()->user()->name }}</a>
                    </li>
                    <li class="hover:text-[#8bc34a]">
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="uppercase">Logout</button>
                        </form>
                    </li>
                    @if (auth()->user()->can('admin'))
                        <li class="hover:text-[#8bc34a]">
                            <a href="/dashboard">DASHBOARD</a>
                        </li>
                    @endif
                @endauth
                @guest
                    <li class="hover:text-[#8bc34a]">
                        <a href="/register">REGISTER</a>
                    </li>
                    <li class="hover:text-[#8bc34a]">
                        <a href="/login" class="uppercase">Login</a>
                    </li>
                @endguest
            </ul>
        </article>
    </section>
    <section></section>
</nav>
