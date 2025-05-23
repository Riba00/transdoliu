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

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<body class="font-sans antialiased">
    <!--
  This example requires updating your template:

  ```
  <html class="h-full bg-white">
  <body class="h-full">
  ```
-->
    <div x-data="{ isSidebarOpen: false, isProfileDropdownOpen: false }" class="h-full">
        <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
        <div class="relative z-50 lg:hidden" role="dialog" aria-modal="true" x-show="isSidebarOpen">
            <!--
      Off-canvas menu backdrop, show/hide based on off-canvas menu state.

      Entering: "transition-opacity ease-linear duration-300"
        From: "opacity-0"
        To: "opacity-100"
      Leaving: "transition-opacity ease-linear duration-300"
        From: "opacity-100"
        To: "opacity-0"
    -->
            <div class="fixed inset-0 bg-gray-900/80" aria-hidden="true"></div>

            <div class="fixed inset-0 flex">
                <!--
        Off-canvas menu, show/hide based on off-canvas menu state.

        Entering: "transition ease-in-out duration-300 transform"
          From: "-translate-x-full"
          To: "translate-x-0"
        Leaving: "transition ease-in-out duration-300 transform"
          From: "translate-x-0"
          To: "-translate-x-full"
      -->
                <div class="relative mr-16 flex w-full max-w-xs flex-1">
                    <!--
          Close button, show/hide based on off-canvas menu state.

          Entering: "ease-in-out duration-300"
            From: "opacity-0"
            To: "opacity-100"
          Leaving: "ease-in-out duration-300"
            From: "opacity-100"
            To: "opacity-0"
        -->
                    <div class="absolute left-full top-0 flex w-16 justify-center pt-5">
                        <button type="button" class="-m-2.5 p-2.5" aria-label="Close menu"
                            @click="isSidebarOpen = !isSidebarOpen">
                            <span class="sr-only">Close sidebar</span>
                            <svg class="size-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true" data-slot="icon">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <!-- Sidebar component, swap this element with another sidebar if you like -->
                    <div class="flex grow flex-col gap-y-5 overflow-y-auto bg-indigo-600 px-6 pb-4" x-cloak>
                        <div class="flex h-16 shrink-0 my-7 items-center justify-center">
                            <a href="{{ route('dashboard') }}">

                                <img class="h-20 w-auto" src="{{ asset('img/logo.png') }}" alt="Transdoliu">
                            </a>
                        </div>
                        <nav class="flex flex-1 flex-col">
                            <ul role="list" class="flex flex-1 flex-col gap-y-7">
                                <li>
                                    <ul role="list" class="-mx-2 space-y-1">
                                        <li>
                                            <!-- Current: "bg-indigo-700 text-white", Default: "text-indigo-200 hover:text-white hover:bg-indigo-700" -->
                                            <a href="{{ route('dashboard') }}" wire:navigate
                                                class="group flex gap-x-3 rounded-md {{ request()->routeIs('dashboard') ? 'bg-indigo-700 text-white' : 'text-indigo-200 hover:text-white hover:bg-indigo-700' }} p-2 text-sm/6 font-semibold">
                                                <svg class="size-6 shrink-0 text-white" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                                    data-slot="icon">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                                </svg>
                                                Dashboard
                                            </a>
                                        </li>
                                        
                                        <li>
                                            <a href="{{ route('customers.index') }}" wire:navigate
                                                class="group flex gap-x-3 rounded-md {{ request()->routeIs('customers.*') ? 'bg-indigo-700 text-white' : 'text-indigo-200 hover:text-white hover:bg-indigo-700' }} p-2 text-sm/6 font-semibold">
                                                <x-svg.building
                                                    class="size-6 shrink-0 text-indigo-200 group-hover:text-white" />
                                                Customers
                                            </a>
                                        </li>

                                        <li>
                                            <a href="{{ route('trucks.index') }}" wire:navigate
                                                class="group flex gap-x-3 rounded-md {{ request()->routeIs('trucks.*') ? 'bg-indigo-700 text-white' : 'text-indigo-200 hover:text-white hover:bg-indigo-700' }} p-2 text-sm/6 font-semibold">
                                                <x-svg.truck
                                                    class="size-6 shrink-0 text-indigo-200 group-hover:text-white" />
                                                Trucks
                                            </a>
                                        </li>

                                        <li>
                                            <a href="{{ route('users.index') }}" wire:navigate
                                                class="group flex gap-x-3 rounded-md {{ request()->routeIs('users.*') ? 'bg-indigo-700 text-white' : 'text-indigo-200 hover:text-white hover:bg-indigo-700' }} p-2 text-sm/6 font-semibold">
                                                <svg class="size-6 shrink-0 text-indigo-200 group-hover:text-white"
                                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="currentColor" aria-hidden="true" data-slot="icon">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                                </svg>
                                                Users
                                            </a>
                                        </li>

                                    </ul>
                                </li>

                                <li class="mt-auto">
                                    <a href="#"
                                        class="group -mx-2 flex gap-x-3 rounded-md p-2 text-sm/6 font-semibold text-indigo-200 hover:bg-indigo-700 hover:text-white">
                                        <svg class="size-6 shrink-0 text-indigo-200 group-hover:text-white" fill="none"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                            aria-hidden="true" data-slot="icon">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>
                                        Settings
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Static sidebar for desktop -->
        <div class="hidden lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-64 lg:flex-col">
            <!-- Sidebar component, swap this element with another sidebar if you like -->
            <div class="flex grow flex-col gap-y-5 overflow-y-auto bg-indigo-600 px-6 pb-4">
                <div class="flex h-16 shrink-0 mt-7 mb-4 items-center">
                    <a href="{{ route('dashboard') }}">
                        <img class="size-20 w-auto" src="{{ asset('img/logo.png') }}" alt="Transdoliu">
                    </a>
                </div>
                <nav class="flex flex-1 flex-col">
                    <ul role="list" class="flex flex-1 flex-col gap-y-7">
                        <li>
                            <ul role="list" class="-mx-2 space-y-1">
                                <li>
                                    <!-- Current: "bg-indigo-700 text-white", Default: "text-indigo-200 hover:text-white hover:bg-indigo-700" -->
                                    <a href="{{ route('dashboard') }}" wire:navigate
                                        class="group flex gap-x-3 rounded-md p-2 text-sm/6 font-semibold {{ request()->routeIs('dashboard') ? 'bg-indigo-700 text-white' : 'text-indigo-200 hover:text-white hover:bg-indigo-700' }}">
                                        <svg class="size-6 shrink-0 text-white" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                            data-slot="icon">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                        </svg>
                                        Dashboard
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('customers.index') }}" wire:navigate
                                        class="group flex gap-x-3 rounded-md p-2 text-sm/6 font-semibold {{ request()->routeIs('customers.*') ? 'bg-indigo-700 text-white' : 'text-indigo-200 hover:text-white hover:bg-indigo-700' }}">
                                        <x-svg.building class="size-6 shrink-0 text-indigo-200 group-hover:text-white" />
                                        Customers
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('trucks.index') }}" wire:navigate
                                        class="group flex gap-x-3 rounded-md p-2 text-sm/6 font-semibold {{ request()->routeIs('trucks.*') ? 'bg-indigo-700 text-white' : 'text-indigo-200 hover:text-white hover:bg-indigo-700' }}">
                                        <x-svg.truck class="size-6 shrink-0 text-indigo-200 group-hover:text-white" />
                                        Trucks
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('users.index') }}" wire:navigate
                                        class="group flex gap-x-3 rounded-md p-2 text-sm/6 font-semibold {{ request()->routeIs('users.*') ? 'bg-indigo-700 text-white' : 'text-indigo-200 hover:text-white hover:bg-indigo-700' }}">
                                        <svg class="size-6 shrink-0 text-indigo-200 group-hover:text-white" fill="none"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                            aria-hidden="true" data-slot="icon">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                        </svg>
                                        Users
                                    </a>
                                </li>
                            </ul>
                        </li>

                        @if (false)
                            <li class="mt-auto">
                                <a href="#"
                                    class="group -mx-2 flex gap-x-3 rounded-md p-2 text-sm/6 font-semibold text-indigo-200 hover:bg-indigo-700 hover:text-white">
                                    <svg class="size-6 shrink-0 text-indigo-200 group-hover:text-white" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                        data-slot="icon">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                    Settings
                                </a>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>

        <div class="lg:pl-64 bg-gray-100 h-screen">
            <div
                class="sticky top-0 z-40 flex h-16 shrink-0 items-center gap-x-4 border-b border-gray-200 bg-white px-4 shadow-sm sm:gap-x-6 sm:px-6 lg:px-8">
                <button type="button" class="-m-2.5 p-2.5 text-gray-700 lg:hidden" aria-controls="sidebar"
                    @click="isSidebarOpen = !isSidebarOpen">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>

                <!-- Separator -->
                <div class="h-6 w-px bg-gray-900/10 lg:hidden" aria-hidden="true"></div>

                <div class="flex justify-end flex-1 gap-x-4 self-stretch lg:gap-x-6">

                    <div class="flex items-center justify-end gap-x-4 lg:gap-x-6">
                        <!-- Profile dropdown -->
                        <div class="relative" @click.outside="isProfileDropdownOpen = false">
                            <button type="button" class="-m-1.5 flex items-center p-1.5" id="user-menu-button"
                                @click="isProfileDropdownOpen = !isProfileDropdownOpen" aria-expanded="false"
                                aria-haspopup="true">
                                <span class="sr-only">Open user menu</span>
                                <span class="inline-block size-8 overflow-hidden rounded-full bg-gray-100">
                                    <svg class="size-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                </span>
                                <span class="hidden lg:flex lg:items-center">
                                    <span class="ml-4 text-sm/6 font-semibold text-gray-900"
                                        aria-hidden="true">{{ auth()->user()->name }}</span>
                                    <svg class="ml-2 size-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true" data-slot="icon">
                                        <path fill-rule="evenodd"
                                            d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </span>
                            </button>

                            <!--
                                Dropdown menu, show/hide based on menu state.

                                Entering: "transition ease-out duration-100"
                                    From: "transform opacity-0 scale-95"
                                    To: "transform opacity-100 scale-100"
                                Leaving: "transition ease-in duration-75"
                                    From: "transform opacity-100 scale-100"
                                    To: "transform opacity-0 scale-95"
                                -->
                            <div class="absolute right-0 z-10 mt-2.5 w-32 origin-top-right rounded-md bg-white pb-2 sm:py-2 shadow-lg ring-1 ring-gray-900/5 focus:outline-none"
                                x-cloak x-show="isProfileDropdownOpen"
                                x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="transform opacity-0 scale-95"
                                x-transition:enter-end="transform opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="transform opacity-100 scale-100"
                                x-transition:leave-end="transform opacity-0 scale-95" role="menu"
                                aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                                <div class="border-b border-gray-200 bg-gray-200 sm:hidden">
                                    <span
                                        class="block px-3 py-1 font-bold text-sm/6 text-gray-900">{{ auth()->user()->name }}</span>
                                </div>


                                <!-- Active: "bg-gray-50 outline-none", Not Active: "" -->
                                <a href="{{ route('profile.edit') }}" class="block px-3 py-1 text-sm/6 text-gray-900"
                                    role="menuitem" tabindex="-1" id="user-menu-item-0">Your profile</a>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}" class="block px-3 py-1 text-sm/6 text-gray-900"
                                        role="menuitem" tabindex="-1" id="user-menu-item-0"
                                        onclick="event.preventDefault(); this.closest('form').submit();">Sign out</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <main class="py-10">
                <div class="px-4 sm:px-6 lg:px-8">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>
    @livewireScripts

    <script>
        window.addEventListener('DOMContentLoaded', function () {
            window.addEventListener('show-toast', ($data) => {
                const {
                    message,
                    type,
                } = $data.detail[0];

                Swal.fire({
                    position: "top-end",
                    icon: type,
                    title: message,
                    showConfirmButton: false,
                    timer: 2500,
                    toast: true,
                    timerProgressBar: true,
                });

            });
        });
    </script>
</body>

</html>