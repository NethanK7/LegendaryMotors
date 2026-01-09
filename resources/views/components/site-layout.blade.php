<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Legendary Motors | The Collection</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="font-sans antialiased text-black dark:text-white bg-white dark:bg-black transition-colors duration-300">
    <!-- Navbar -->
    <nav class="fixed top-0 w-full z-50 bg-white/90 dark:bg-black/90 backdrop-blur-md border-b border-gray-100 dark:border-white/10 transition-colors duration-300">
        <div class="container mx-auto px-6 h-20 flex items-center justify-between">
            <a href="{{ route('home') }}" class="text-2xl font-black uppercase tracking-tighter">
                Legendary<span class="text-[var(--color-accent)]">Motors</span>
            </a>
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('inventory') }}" class="text-sm font-bold uppercase tracking-widest hover:text-[var(--color-accent)] transition-colors">Supercars</a>
                <a href="{{ route('about') }}" class="text-sm font-bold uppercase tracking-widest hover:text-[var(--color-accent)] transition-colors">About Us</a>
                <a href="{{ route('contact') }}" class="text-sm font-bold uppercase tracking-widest hover:text-[var(--color-accent)] transition-colors">Contact</a>
            </div>
            <div class="flex items-center space-x-6">
                <button onclick="window.toggleTheme()" class="text-xl hover:text-[var(--color-accent)] transition-colors">
                    <svg class="w-5 h-5 block dark:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
                    <svg class="w-5 h-5 hidden dark:block" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </button>
                
                @auth
                    <!-- User Dropdown -->
                    <div class="relative group">
                        <button class="flex items-center gap-2 text-sm font-bold uppercase tracking-widest hover:text-[var(--color-accent)] transition-colors">
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div class="absolute right-0 mt-2 w-48 bg-white dark:bg-[#111] border border-gray-100 dark:border-white/10 shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform group-hover:translate-y-0 translate-y-2 z-50">
                            @if(Auth::user()->is_admin)
                                <a href="{{ route('admin.dashboard') }}" class="block px-6 py-4 text-xs font-bold uppercase tracking-widest transition-colors border-b border-gray-100 dark:border-white/5 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-50 dark:bg-white/10 text-[var(--color-accent)]' : 'bg-transparent text-black dark:text-white hover:bg-gray-50 dark:hover:bg-white/5 hover:text-[var(--color-accent)]' }}">
                                    Admin Dashboard
                                </a>
                            @endif
                            <a href="{{ route('dashboard') }}" class="block px-6 py-4 text-xs font-bold uppercase tracking-widest transition-colors border-b border-gray-100 dark:border-white/5 {{ request()->routeIs('dashboard') ? 'bg-gray-50 dark:bg-white/10 text-[var(--color-accent)]' : 'bg-transparent text-black dark:text-white hover:bg-gray-50 dark:hover:bg-white/5 hover:text-[var(--color-accent)]' }}">
                                My Garage
                            </a>
                            <a href="{{ route('favorites.index') }}" class="block px-6 py-4 text-xs font-bold uppercase tracking-widest transition-colors border-b border-gray-100 dark:border-white/5 {{ request()->routeIs('favorites.index') ? 'bg-gray-50 dark:bg-white/10 text-[var(--color-accent)]' : 'bg-transparent text-black dark:text-white hover:bg-gray-50 dark:hover:bg-white/5 hover:text-[var(--color-accent)]' }}">
                                Saved Collection
                            </a>
                            <a href="{{ route('profile.show') }}" class="block px-6 py-4 text-xs font-bold uppercase tracking-widest transition-colors border-b border-gray-100 dark:border-white/5 {{ request()->routeIs('profile.show') ? 'bg-gray-50 dark:bg-white/10 text-[var(--color-accent)]' : 'bg-transparent text-black dark:text-white hover:bg-gray-50 dark:hover:bg-white/5 hover:text-[var(--color-accent)]' }}">
                                Account Settings
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-6 py-4 text-xs font-bold uppercase tracking-widest transition-colors bg-transparent text-gray-500 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-white/5 hover:text-red-500">
                                    Log Out
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="text-sm font-bold uppercase tracking-widest hover:text-[var(--color-accent)] transition-colors">Login</a>
                @endauth
                
                <a href="{{ route('checkout') }}" class="text-sm font-bold uppercase tracking-widest hover:text-[var(--color-accent)] transition-colors">Cart (0)</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-gray-50 dark:bg-[#050505] border-t border-gray-200 dark:border-white/10 pt-24 pb-12 transition-colors duration-300">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-16">
                 <div>
                    <h4 class="text-lg font-black uppercase mb-6">Legendary Motors</h4>
                    <p class="text-gray-500 text-sm font-medium leading-relaxed mb-6">Redefining luxury and performance since 2026. The world's finest collection of modified supercars.</p>
                     <div class="flex space-x-4">
                        <!-- Social Icons Placeholders -->
                        <div class="w-8 h-8 bg-gray-200 dark:bg-[#222]"></div>
                        <div class="w-8 h-8 bg-gray-200 dark:bg-[#222]"></div>
                        <div class="w-8 h-8 bg-gray-200 dark:bg-[#222]"></div>
                    </div>
                </div>
                <div>
                    <h4 class="text-sm font-bold uppercase tracking-widest mb-6">Supercars</h4>
                    <ul class="space-y-4 text-sm font-medium text-gray-500">
                        <li><a href="#" class="hover:text-[var(--color-accent)] transition-colors">Rocket 900</a></li>
                        <li><a href="#" class="hover:text-[var(--color-accent)] transition-colors">800 Adventure</a></li>
                        <li><a href="#" class="hover:text-[var(--color-accent)] transition-colors">900 Deep Blue</a></li>
                        <li><a href="#" class="hover:text-[var(--color-accent)] transition-colors">Crawler</a></li>
                    </ul>
                </div>
                 <div>
                    <h4 class="text-sm font-bold uppercase tracking-widest mb-6">Company</h4>
                    <ul class="space-y-4 text-sm font-medium text-gray-500">
                        <li><a href="#" class="hover:text-[var(--color-accent)] transition-colors">About Us</a></li>
                        <li><a href="#" class="hover:text-[var(--color-accent)] transition-colors">Career</a></li>
                        <li><a href="#" class="hover:text-[var(--color-accent)] transition-colors">Press</a></li>
                        <li><a href="#" class="hover:text-[var(--color-accent)] transition-colors">Contact</a></li>
                    </ul>
                </div>
                 <div>
                    <h4 class="text-sm font-bold uppercase tracking-widest mb-6">Newsletter</h4>
                    <form class="flex border-b border-gray-300 dark:border-gray-700">
                        <input type="email" placeholder="ENTER EMAIL" class="bg-transparent w-full py-2 text-sm font-bold uppercase focus:outline-none text-black dark:text-white placeholder-gray-400">
                        <button class="text-[var(--color-accent)] font-bold uppercase text-xs hover:text-black dark:hover:text-white transition-colors">Subscribe</button>
                    </form>
                </div>
            </div>
            
            <div class="border-t border-gray-200 dark:border-white/5 pt-8 flex flex-col md:flex-row justify-between items-center text-xs font-bold text-gray-400 uppercase tracking-widest">
                <p>&copy; 2026 Legendary Motors. All rights reserved.</p>
                <div class="flex space-x-8 mt-4 md:mt-0">
                    <a href="#" class="hover:text-black dark:hover:text-white">Imprint</a>
                    <a href="#" class="hover:text-black dark:hover:text-white">Privacy Policy</a>
                    <a href="#" class="hover:text-black dark:hover:text-white">Cookies</a>
                </div>
            </div>
        </div>
    </footer>
    <script>
        // Check for saved theme preference or system preference
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }

        // Toggle theme function
        window.toggleTheme = function() {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.theme = 'light';
            } else {
                document.documentElement.classList.add('dark');
                localStorage.theme = 'dark';
            }
        }
    </script>
    @livewireScripts
</body>
</html>
