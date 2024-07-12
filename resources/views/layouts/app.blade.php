<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EmbajadoresEsperanza Blog</title>
    <meta name="author" content="TheCodeholic">
    <meta name="description" content="{{ $metaDescription }}">

    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
    </style>

    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
        integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>

    @livewireStyles
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 font-family-karla">


    <!-- Text Header -->
    <header class="container w-full mx-auto">
        <div class="flex flex-col items-center py-12">
            <a class="text-5xl font-bold text-gray-800 uppercase hover:text-gray-700" href="{{ route('home') }}">
                <img src="{{ asset('/images/logo.png') }}" style="height: 200px !important; width:400px !important;">
                Emabajdores Blog
            </a>
            <p class="text-lg text-gray-600">
                {{ \App\Models\TextWidget::getTitle('header') }}
            </p>
        </div>
    </header>

    <!-- Topic Nav -->
    <nav class="w-full py-4 bg-gray-100 border-t border-b" x-data="{ open: false }">
        <div class="block sm:hidden">
            <a href="#"
                class="flex items-center justify-center block text-base font-bold text-center uppercase md:hidden"
                @click="open = !open">
                Topics <i :class="open ? 'fa-chevron-down' : 'fa-chevron-up'" class="ml-2 fas"></i>
            </a>
        </div>
        <div :class="open ? 'block' : 'hidden'" class="flex-grow w-full sm:flex sm:items-center sm:w-auto">
            <div
                class="container flex flex-col items-center justify-between w-full px-6 py-2 mx-auto mt-0 text-sm font-bold uppercase sm:flex-row">
                <div>
                    <a href="{{ route('home') }}" class="px-4 py-2 mx-2 rounded hover:text-white"
                        onmouseover="this.style.backgroundColor='orange';"
                        onmouseout="this.style.backgroundColor='white';">Inicio</a>
                    @foreach ($categories as $category)
                        <a href="{{ route('by-category', $category) }}" class="px-4 py-2 mx-2 rounded hover:text-black"
                            onmouseover="this.style.backgroundColor='orange';"
                            onmouseout="this.style.backgroundColor='transparentwhite';">{{ $category->title }}</a>
                    @endforeach
                    <a href="{{ route('about-us') }}" class="px-4 py-2 mx-2 rounded hover:text-white"
                        onmouseover="this.style.backgroundColor='orange';"
                        onmouseout="this.style.backgroundColor='transparent';">Sobre nosotros
                    </a>
                </div>

                <div class="flex items-center">
                    <form method="get" action="{{ route('search') }}">
                        <input name="q" value="{{ request()->get('q') }}"
                            class="block w-full rounded-md border-0 px-3.5 py-2 t0ext-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6 font-medium"
                            placeholder="Type an hit enter to search anything" />
                    </form>
                    @auth
                        <div class="flex sm:items-center sm:ml-6">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button
                                        class="flex items-center px-4 py-2 mx-2 rounded hover:bg-orange-600 hover:text-white">
                                        <div>{{ Auth::user()->name }}</div>

                                        <div class="ml-1">
                                            <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <x-dropdown-link :href="route('profile.edit')">
                                        {{ __('Perfil') }}
                                    </x-dropdown-link>

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                            {{ __('Cerrar sesión') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="px-4 py-2 mx-2 rounded hover:text-black"
                            onmouseover="this.style.backgroundColor='orange';"
                            onmouseout="this.style.backgroundColor='white';">Login</a>
                        <a href="{{ route('register') }}" class="px-4 py-2 mx-2 text-black rounded"
                            style="background-color:orange !important;">Register</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>


    <div class="container py-6 mx-auto">

        {{ $slot }}

    </div>

    <footer class="w-full pb-12 bg-white border-t">
        <div class="container flex flex-col items-center w-full mx-auto">
            <div class="py-6 uppercase">&copy; eeici.com</div>
        </div>
    </footer>

    @livewireScripts
</body>

</html>
