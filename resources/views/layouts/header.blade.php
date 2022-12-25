<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('img/pcpp_logo.png') }}">

    <!-- Flowbite JS -->
    <script src="../path/to/flowbite/dist/flowbite.js"></script>

    <title>PCPartPicker</title>
</head>
<body>
    {{-- Header --}}
    <header>
        <nav class="border-gray-200 px-4 lg:px-6 py-2.5 bg-gray-800">
            <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
                {{-- Logo --}}
                <a href="#" class="flex items-center">
                    <img src="{{ asset('img/pcpp_logo.png') }}" class="mr-3 h-6 sm:h-9" alt="PCPP Logo" />
                    <span class="self-center text-xl font-semibold whitespace-nowrap text-white">PCPartPicker</span>
                </a>

                {{-- Pages --}}
                <div class="justify-between items-center">
                    <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                        <li>
                            <a href="#" class="block py-2 pr-4 pl-3 text-white rounded font-bold bg-primary-700 border-b-2 border-white" aria-current="page">Home</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 pr-4 pl-3 text-gray-400 hover:text-white">Builder</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 pr-4 pl-3 text-gray-400 hover:text-white">Completed Builds</a>
                        </li>
                    </ul>
                </div>

                @guest
                {{-- Login & Register --}}
                    <div class="flex items-center">
                        <a href="{{ route('login') }}" class="text-white hover:bg-gray-700 focus:ring-4 focus:ring-gray-800 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 focus:outline-none">Log in</a>
                        <a href="{{ route('register') }}" class="text-white hover:bg-gray-700 focus:ring-4 focus:ring-gray-800 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 focus:outline-none">Register</a>
                    </div>
                @endguest

                @auth      
                    {{-- User Dropdown --}}
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <x-dropdown align="right" width="100">
                            {{-- User --}}
                            <x-slot name="trigger">
                                <button class="inline-flex items-center px-3 py-2 border border-transparent text-md leading-4 font-medium rounded-md text-white hover:bg-gray-700 focus:outline-none transition ease-in-out duration-150">
                                    <x-dynamic-component component="flag-country-{{ strtolower(Auth::user()->country_code) }}" class="w-8 inline mr-2"/>{{ Auth::user()->name }}
        
                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>
                            
                            {{-- Dropdown --}}
                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')" class="text-white bg-gray-800 hover:bg-gray-700">
                                    My Lists
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('profile.edit')" class="text-white bg-gray-800 hover:bg-gray-700">
                                    Profile
                                </x-dropdown-link>
        
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
        
                                    <x-dropdown-link :href="route('logout')"
                                            class="border-t border-gray-700 text-red-500 bg-gray-800 hover:bg-gray-700"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        Log Out
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @endauth
            </div>
        </nav>
    </header>