<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- FontAwesome Kit -->
    <script src="https://kit.fontawesome.com/0b9cec2f12.js" crossorigin="anonymous"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100 flex">
    <!-- Side Menu -->
    <nav class="w-64 bg-white border-r border-gray-200">
        <div class="p-4">
            <div class="mb-4">
                <img src="{{ asset('build/assets/prosuit.png') }}" alt="Dashboard Image" class="h-10 w-auto">
            </div>
            <ul class="mt-4 space-y-4">
                <li>
                    <a href="{{ route('risk-owners.index') }}" class="flex items-center hover:text-blue-600 focus:text-blue-600">
                        <i class="fa-solid fa-chart-pie text-primary mr-2"></i> <!-- Added mr-2 for margin -->
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center hover:text-blue-600 focus:text-blue-600">
                        <i class="fa-solid fa-file text-primary mr-2"></i> <!-- Added mr-2 for margin -->
                        Risk Register
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center hover:text-blue-600 focus:text-blue-600">
                        <i class="fa-solid fa-clipboard text-primary mr-2"></i> <!-- Added mr-2 for margin -->
                        My Risks
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center hover:text-blue-600 focus:text-blue-600">
                        <i class="fa-solid fa-clipboard-list text-primary mr-2"></i> <!-- Added mr-2 for margin -->
                        Controls
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center hover:text-blue-600 focus:text-blue-600">
                        <i class="fa-solid fa-clipboard-check text-primary mr-2"></i> <!-- Added mr-2 for margin -->
                        Assessments
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center hover:text-blue-600 focus:text-blue-600">
                        <i class="fa-solid fa-file-export text-primary mr-2"></i> <!-- Added mr-2 for margin -->
                        Reports
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center hover:text-blue-600 focus:text-blue-600">
                        <i class="fa-solid fa-inbox text-primary mr-2"></i> <!-- Added mr-2 for margin -->
                        Messages
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center hover:text-blue-600 focus:text-blue-600">
                        <i class="fa-solid fa-magnifying-glass text-primary mr-2"></i> <!-- Added mr-2 for margin -->
                        Audit Trail
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center hover:text-blue-600 focus:text-blue-600">
                        <i class="fa-solid fa-cog text-primary mr-2"></i> <!-- Added mr-2 for margin -->
                        Settings
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center hover:text-blue-600 focus:text-blue-600">
                        <i class="fa-solid fa-circle-question text-primary mr-2"></i> <!-- Added mr-2 for margin -->
                        Help and Resource
                    </a>
                </li>
            </ul>


        </div>
    </nav>

    <div class="flex-1">

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow flex justify-between items-center">
                <div class="max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>

                <!-- Settings Dropdown -->
                <div class="flex items-center mr-4">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Update Profile') }}
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                                         onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Logout') }}
                        </x-dropdown-link>
                    </form>
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
</div>
</body>
</html>
