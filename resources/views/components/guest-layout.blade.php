<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Gudang App') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- Tailwind CSS via CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Konfigurasi Dark Mode untuk Tailwind v4 --}}
    <script>
        tailwind.config = {
            darkMode: 'class'
        }
    </script>
    
    {{-- Script inisialisasi tema di awal untuk menghindari kedipan --}}
    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
    
    {{-- Alpine.js untuk interaktivitas (DENGAN DEFER) --}}
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

</head>
<body class="font-sans antialiased bg-white dark:bg-slate-900 text-slate-800 dark:text-slate-200 overflow-x-hidden">
    <div class="min-h-screen flex flex-col">
        
        <header x-data="{ open: false }" class="bg-white/80 dark:bg-slate-900/80 backdrop-blur-sm sticky top-0 z-40 w-full border-b border-slate-200 dark:border-slate-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <!-- Logo -->
                    <div class="flex-shrink-0 flex items-center">
                        <a href="{{ route('home') }}" class="flex items-center space-x-2">
                             <svg class="h-8 w-8 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
                            </svg>
                            <span class="text-xl font-bold text-slate-800 dark:text-white">PT. SUNROSE INDONESIA</span>
                        </a>
                    </div>

                    <!-- Tombol Navigasi Desktop & Aksi -->
                    <div class="hidden sm:flex sm:items-center sm:ml-6 space-x-4">
                        <button id="theme-toggle-desktop" type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
                            <svg id="theme-toggle-dark-icon-desktop" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                            <svg id="theme-toggle-light-icon-desktop" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm-.707 10.607a1 1 0 010-1.414l.707-.707a1 1 0 111.414 1.414l-.707.707a1 1 0 01-1.414 0zM17 17a1 1 0 11-2 0v-1a1 1 0 112 0v1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                        </button>
                        <a href="{{ route('dashboard') }}" class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200">
                            Masuk ke Dashboard
                        </a>
                    </div>

                    <!-- Hamburger -->
                    <div class="-mr-2 flex items-center sm:hidden">
                        <button id="theme-toggle-mobile" type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5 mr-2">
                            <svg id="theme-toggle-dark-icon-mobile" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                            <svg id="theme-toggle-light-icon-mobile" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm-.707 10.607a1 1 0 010-1.414l.707-.707a1 1 0 111.414 1.414l-.707.707a1 1 0 01-1.414 0zM17 17a1 1 0 11-2 0v-1a1 1 0 112 0v1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                        </button>
                        <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Menu Mobile Dropdown -->
            <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-white dark:bg-slate-900 border-b border-slate-200 dark:border-slate-800">
                <div class="pt-4 pb-3 border-t border-gray-200 dark:border-gray-700">
                    <div class="px-4">
                         <a href="{{ route('dashboard') }}" class="block w-full text-left rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200">
                            Masuk ke Dashboard
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <main class="flex-grow">
            {{ $slot }}
        </main>
        
        <footer class="bg-white dark:bg-slate-900 border-t border-slate-200 dark:border-slate-800">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 text-center text-sm text-gray-500 dark:text-gray-400">
                &copy; {{ date('Y') }} PT. Sunrose Indonesia & Afif Syam Fauzi. All Rights Reserved.
            </div>
        </footer>
    </div>
    
    <script>
        // Logika untuk toggle Dark Mode
        const themeToggleBtns = document.querySelectorAll('[id^="theme-toggle"]');
        const themeToggleDarkIcons = document.querySelectorAll('[id^="theme-toggle-dark-icon"]');
        const themeToggleLightIcons = document.querySelectorAll('[id^="theme-toggle-light-icon"]');

        // Fungsi untuk mengupdate ikon
        function updateIcons() {
            if (document.documentElement.classList.contains('dark')) {
                themeToggleLightIcons.forEach(icon => icon.classList.remove('hidden'));
                themeToggleDarkIcons.forEach(icon => icon.classList.add('hidden'));
            } else {
                themeToggleLightIcons.forEach(icon => icon.classList.add('hidden'));
                themeToggleDarkIcons.forEach(icon => icon.classList.remove('hidden'));
            }
        }

        // Jalankan saat halaman dimuat
        updateIcons();

        // Tambahkan event listener ke semua tombol
        themeToggleBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                // toggle class
                document.documentElement.classList.toggle('dark');
                
                // simpan preferensi
                const theme = document.documentElement.classList.contains('dark') ? 'dark' : 'light';
                localStorage.setItem('color-theme', theme);
                
                // update ikon
                updateIcons();
            });
        });
    </script>
</body>
</html>

