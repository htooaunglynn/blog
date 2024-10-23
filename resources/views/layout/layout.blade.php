<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        @yield('title')

        <x-link />
        @vite('resources/css/app.css')
    </head>

    <body class="body">
        <x-nav />
        {{-- Body --}}
        <main class="body-main">
            <section></section>
            <section class="main">
                @yield('main')
            </section>
            <section></section>
        </main>
        <x-footer />

        {{-- js --}}
        <x-script />
    </body>

</html>
