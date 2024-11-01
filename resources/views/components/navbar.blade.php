<nav class="bg-gray-800" x-data="{ isOpen: false }">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <!-- Logo dan Link Navigasi -->
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <img class="h-8 w-8" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                        <x-nav-link href="/posts" :active="request()->is('posts')">Blog</x-nav-link>
                        <x-nav-link href="/about" :active="request()->is('about')">About</x-nav-link>
                        <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>
                    </div>
                </div>
            </div>

            <!-- Profil Pengguna atau Tombol Login -->
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">
                    <div class="relative" x-data="{ isProfileOpen: false }">
                        @auth
                        <!-- Jika pengguna telah login -->
                        <button 
                            type="button" 
                            @click="isProfileOpen = !isProfileOpen" 
                            class="flex items-center space-x-2 rounded-md bg-indigo-800 px-4 py-2 text-sm font-semibold text-gray-50 hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                        >
                            <span class="sr-only">Open user menu</span>
                            <span>Welcome Back, {{ auth()->user()->name }}</span>
                            <i class="fa-solid fa-user text-lg"></i>
                        </button>

                        <!-- Dropdown Menu Profil Pengguna -->
                        <div 
                            x-show="isProfileOpen" 
                            @click.away="isProfileOpen = false"
                            x-transition
                            class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                        >
                            <a href="/dashboard" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">My Dashboard</a>
                            <form action="/logout" method="POST">
                                @csrf
                                <button href="/logout" type="submit" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Log out</button>
                            </form>
                        </div>
                        @endauth

                        <!-- Jika pengguna belum login -->
                        @guest
                        <a href="/login" class="px-4 py-2 text-sm text-gray-300 bg-gray-700 hover:bg-gray-600 rounded-md">
                            Log in
                        </a>
                        @endguest
                    </div>
                </div>
            </div>

            <!-- Tombol Menu Mobile -->
            <div class="-mr-2 flex md:hidden">
                <button 
                    type="button" 
                    @click="isOpen = !isOpen" 
                    class="inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                >
                    <span class="sr-only">Open main menu</span>
                    <svg :class="{ 'hidden': isOpen, 'block': !isOpen }" class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg :class="{ 'block': isOpen, 'hidden': !isOpen }" class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu, tampilkan saat isOpen = true -->
    <div x-show="isOpen" class="md:hidden">
        <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
            <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
            <x-nav-link href="/posts" :active="request()->is('posts')">Blog</x-nav-link>
            <x-nav-link href="/about" :active="request()->is('about')">About</x-nav-link>
            <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>
        </div>

        <!-- Profil Pengguna Mobile -->
        @auth
        <div class="border-t border-gray-700 px-4 pt-4 pb-3">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="User profile picture">
                </div>
                <div class="ml-3">
                    <div class="text-base font-medium text-white">{{ auth()->user()->name }}</div>
                    <div class="text-sm font-medium text-gray-400">{{ auth()->user()->email }}</div>
                </div>
            </div>
            <div class="mt-3 space-y-1">
                <a href="/dashboard" class="block px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">My Dashboard</a>
                <form action="/logout" method="POST">
                    @csrf
                    <button href="/logout" type="submit" class="block px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Log out</button>
                </form>
            </div>
        </div>
        @endauth

        <!-- Tombol Login untuk pengguna tamu pada tampilan mobile -->
        @guest
        <div class="border-t border-gray-700 px-4 py-3">
            <a href="/login" class="block w-full text-center rounded-md px-4 py-2 text-sm font-medium text-gray-300 bg-gray-700 hover:bg-gray-600">
                Log in
            </a>
        </div>
        @endguest
    </div>
</nav>
