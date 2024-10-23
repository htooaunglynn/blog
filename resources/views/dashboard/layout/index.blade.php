<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        @yield('title')
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
        @vite('resources/css/app.css')
    </head>

    <body class="flex h-screen">
        <x-dashboard-side-bar />
        <section class="lg:basis-1-/12 flex basis-full flex-col md:basis-full">
            <nav class="flex basis-1/12 justify-end border-b border-slate-200">
                <div
                    class="flex basis-5/12 items-center justify-evenly border-l border-slate-200 md:basis-[28%] lg:basis-[18%]">
                    @if (auth()->user()->avatar != null)
                        <article
                            class="mr-1 h-10 w-10 rounded-full bg-cover bg-center bg-no-repeat md:h-12 md:w-12 lg:h-14 lg:w-14 xl:mr-0"
                            style='background-image: url("{{ auth()->user()->avatar }}");'></article>
                    @else
                        <article
                            class="mr-1 h-10 w-10 rounded-full bg-cover bg-center bg-no-repeat md:h-12 md:w-12 lg:h-14 lg:w-14 xl:mr-0"
                            style='background-image: url("/img/author.jpg");'></article>
                    @endif

                    <h1 class="text-sm md:text-base lg:text-lg">Lorem ipsum dolor</h1>
                </div>
            </nav>
            <main class="basis-11/12 overflow-hidden">
                @yield('main')
            </main>
        </section>

        <script>
            // Initialize CKEditor
            ClassicEditor
                .create(document.querySelector('#editor'))
                .then(editor => {
                    console.log('Editor was initialized', editor);
                })
                .catch(error => {
                    console.error(error);
                });
        </script>
    </body>

</html>
