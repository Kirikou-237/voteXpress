<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ Vite::asset('resources/images/logo.png') }}" type="image/x-icon">
    <title>@yield('title', 'titre')</title>
    @vite(['resources/css/app.css', 'resources/css/page.css'])
    @yield('style')
</head>

<body>

    <nav class="bg-green-700">
        <div class="flex flex-wrap items-center justify-between max-w-screen-xl p-4 mx-auto">
            <div class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ vite::asset('resources/images/logo.png') }}" class="h-8" alt=" Logo" />
                <div class="flex flex-col items-center">
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">VoteXpress</span>
                    <p class="text-white text-[10px]">for help you decide</p>
                </div>
            </div>

            <div class="flex items-center gap-3 space-x-3 md:order-2 md:space-x-0 rtl:space-x-reverse">
                @auth
                @isset(Auth::user()->user_information)
                 
                    <button type="button"
                        class="flex text-sm bg-green-800 rounded-full md:me-0 focus:ring-4 focus:ring-green-300 dark:focus:ring-green-600"
                        id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                        data-dropdown-placement="bottom">
                        <img class="w-8 h-8 rounded-full"
                            src="{{ asset('/images/' . Auth::user()->user_information->image) }}" alt="user photo">
                    </button>
                    <span class="block font-medium text-green-900 text-m dark:text-white">
                        {{ Auth::user()->name }}
                    </span>

                    <!-- Dropdown menu -->
                    <aside
                        class="hidden my-4 text-base list-none bg-green-700 divide-green-100 rounded-lg shadow-sm z-100 asideide-y dark:divide-green-600"
                        id="user-dropdown">
                        <div class="px-4 py-3">

                            <span class="block text-sm text-white truncate ">
                                {{ Auth::user()->user_information->bio }}
                            </span><br>
                            <span class="block text-sm text-white truncate ">
                                {{ Auth::user()->email }}
                            </span>
                            <span class="block text-sm text-white truncate ">
                                {{ Auth::user()->user_information->sexe }}
                            </span>
                            <span class="block text-sm text-white truncate ">
                                compte crée depuis:{{ Auth::user()->created_at->diffForHumans() }}
                            </span>
                            @else  

                            <button type="button"
                            class="flex text-sm bg-green-800 rounded-full md:me-0 focus:ring-4 focus:ring-green-300 dark:focus:ring-green-600"
                            id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                            data-dropdown-placement="bottom">
                            <img class="w-8 h-8 rounded-full"
                                src="" alt="user photo">
                        </button>
                        <span class="block font-medium text-green-900 text-m dark:text-white">
                            {{ Auth::user()->name }}
                        </span>
    
                        <!-- Dropdown menu -->
                        <aside
                            class="hidden my-4 text-base list-none bg-green-700 divide-green-100 rounded-lg shadow-sm z-100 asideide-y dark:divide-green-600"
                            id="user-dropdown">
                            <div class="px-4 py-3">
    
                                <span class="block text-sm text-white truncate ">
                                </span><br>
                                <span class="block text-sm text-white truncate ">
                                    {{ Auth::user()->email }}
                                </span>
                                <span class="block text-sm text-white truncate ">
                                   
                                </span>
                                <span class="block text-sm text-white truncate ">
                                    compte crée depuis:{{ Auth::user()->created_at->diffForHumans() }}
                                </span>

                            @endisset
                        </div>
                        <ul class="py-2" aria-labelledby="user-menu-button">
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-green-700 hover:bg-green-100 dark:hover:bg-green-600 dark:text-green-200 dark:hover:text-white">Tableau
                                    de bord</a>
                            </li>
                            <li>
                                <a href="{{ url('settings') }}"
                                    class="block px-4 py-2 text-sm text-green-700 hover:bg-green-100 dark:hover:bg-green-600 dark:text-green-200 dark:hover:text-white">gérer
                                    le compte</a>
                            </li>
                            <li>
                                <a href=""
                                    class="block px-4 py-2 text-sm text-green-700 hover:bg-green-100 dark:hover:bg-green-600 dark:text-green-200 dark:hover:text-white">paramètres</a>
                            </li>

                            <li>
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button type="submit"
                                        class="focus:outline-none w-full text-white bg-green-900 hover:bg-green-500 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">
                                        logout</button>
                                </form>
                            </li>

                        </ul>
                    </aside>
                @endauth
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
                <ul
                    class="flex flex-col p-4 mt-4 font-medium border border-green-100 menu md:p-0 bg-green-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-green-900 md:dark:bg-green-700 ">
                    <li>
                        <a href="{{ url('page') }}"
                            class="  opacity-[0.5] py-2 px-3  rounded-sm hover:bg-green-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 text-white md:dark:hover:text-blue-500 dark:hover:bg-green-700 hover:text-white md:dark:hover:bg-transparent  "
                            aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('create') }}"
                            class="block opacity-[0.5] py-2 px-3 rounded-sm hover:bg-green-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 text-white md:dark:hover:text-blue-500 dark:hover:bg-green-700 hover:text-white md:dark:hover:bg-transparent  ">creer
                            un sondage</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block opacity-[0.5] py-2 px-3 rounded-sm hover:bg-green-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 text-white md:dark:hover:text-blue-500  hover:text-white md:dark:hover:bg-transparent  ">Sondages
                            disponibles</a>
                    </li>

                    @guest
                        <li>
                            <a href="{{ route('login') }}"
                                class="block opacity-[0.5] py-2 px-3 rounded-sm hover:bg-green-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 text-white md:dark:hover:text-blue-500  hover:text-white md:dark:hover:bg-transparent ">se
                                connecter</a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    
