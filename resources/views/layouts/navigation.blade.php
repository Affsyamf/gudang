<nav x-data="{ open: false }" class="bg-white dark:bg-slate-900 border-b border-gray-100 dark:border-gray-800 shadow-sm sticky top-0 z-50">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center space-x-2">
                         <svg class="h-8 w-8 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
                        </svg>
                        <span class="font-bold text-lg text-slate-800 dark:text-slate-200">PT. SUNROSE INDONESIA</span>
                    </a>
                </div>

                <!-- Navigation Links (Desktop) -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'border-blue-500 text-slate-900 dark:text-white' : 'border-transparent text-gray-500 dark:text-gray-400 hover:border-gray-300 dark:hover:text-gray-200' }} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium transition-colors duration-200">
                        Dashboard
                    </a>
                    <a href="{{ route('barangs.index') }}" class="{{ request()->routeIs('barangs.*') ? 'border-blue-500 text-slate-900 dark:text-white' : 'border-transparent text-gray-500 dark:text-gray-400 hover:border-gray-300 dark:hover:text-gray-200' }} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium transition-colors duration-200">
                        Manajemen Barang
                    </a>
                    <a href="{{ route('suppliers.index') }}" class="{{ request()->routeIs('suppliers.*') ? 'border-blue-500 text-slate-900 dark:text-white' : 'border-transparent text-gray-500 dark:text-gray-400 hover:border-gray-300 dark:hover:text-gray-200' }} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium transition-colors duration-200">
                        Manajemen Supplier
                    </a>
                     <!-- Dropdown Transaksi (Desktop) -->
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <div x-data="{ open: false }" @click.away="open = false" class="relative">
                            <button @click="open = ! open" class="inline-flex items-center px-1 pt-1 border-b-2 {{ (request()->routeIs('transaksis.*') || request()->routeIs('transaksi.*')) ? 'border-blue-500 text-slate-900 dark:text-white' : 'border-transparent text-gray-500 dark:text-gray-400' }} text-sm font-medium leading-5 hover:text-gray-700 dark:hover:text-gray-200 focus:outline-none transition duration-150 ease-in-out">
                                <div>Transaksi</div>
                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                                </div>
                            </button>
                            <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute z-50 mt-2 w-48 rounded-md shadow-lg origin-top-right right-0" style="display: none;">
                                <div class="rounded-md ring-1 ring-black ring-opacity-5 py-1 bg-white dark:bg-slate-800">
                                    <a href="{{ route('transaksis.index') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-slate-700">Riwayat Transaksi</a>
                                    <a href="{{ route('transaksi.createMasuk') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-slate-700">Barang Masuk</a>
                                    <a href="{{ route('transaksi.createKeluar') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-slate-700">Barang Keluar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pengaturan Kanan (Dark Mode Toggle & Hamburger) -->
            <div class="flex items-center">
                 <!-- Dark Mode Toggle -->
                <div class="mr-4">
                    <button id="theme-toggle" type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
                        <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                        <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm-.707 10.607a1 1 0 011.414 0l.707-.707a1 1 0 111.414 1.414l-.707.707a1 1 0 01-1.414 0zM3 11a1 1 0 100 2h1a1 1 0 100-2H3z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
                
                <!-- Hamburger -->
                <div class="sm:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu (Mobile) -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-white dark:bg-slate-900 border-t border-gray-200 dark:border-gray-800">
        <div class="pt-2 pb-3 space-y-1">
            <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'bg-blue-50 dark:bg-blue-900/50 border-blue-500 text-blue-700 dark:text-blue-300' : 'border-transparent text-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-800 hover:border-gray-300 dark:hover:border-gray-600 hover:text-gray-800 dark:hover:text-gray-200' }} block pl-3 pr-4 py-2 border-l-4 text-base font-medium transition-all duration-200">
                Dashboard
            </a>
            <a href="{{ route('barangs.index') }}" class="{{ request()->routeIs('barangs.*') ? 'bg-blue-50 dark:bg-blue-900/50 border-blue-500 text-blue-700 dark:text-blue-300' : 'border-transparent text-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-800 hover:border-gray-300 dark:hover:border-gray-600 hover:text-gray-800 dark:hover:text-gray-200' }} block pl-3 pr-4 py-2 border-l-4 text-base font-medium transition-all duration-200">
                Manajemen Barang
            </a>
            <a href="{{ route('suppliers.index') }}" class="{{ request()->routeIs('suppliers.*') ? 'bg-blue-50 dark:bg-blue-900/50 border-blue-500 text-blue-700 dark:text-blue-300' : 'border-transparent text-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-800 hover:border-gray-300 dark:hover:border-gray-600 hover:text-gray-800 dark:hover:text-gray-200' }} block pl-3 pr-4 py-2 border-l-4 text-base font-medium transition-all duration-200">
                Manajemen Supplier
            </a>
            <div class="border-t border-gray-200 dark:border-gray-700 pt-3 mt-3">
                 <div class="px-4 text-base font-medium text-gray-600 dark:text-gray-400">Transaksi</div>
                 <a href="{{ route('transaksis.index') }}" class="{{ request()->routeIs('transaksis.index') ? 'bg-blue-50 dark:bg-blue-900/50 border-blue-500 text-blue-700 dark:text-blue-300' : 'border-transparent text-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-800' }} mt-1 block pl-7 pr-4 py-2 border-l-4 text-base font-medium transition-all duration-200">
                     Riwayat Transaksi
                 </a>
                 <a href="{{ route('transaksi.createMasuk') }}" class="{{ request()->routeIs('transaksi.createMasuk') ? 'bg-blue-50 dark:bg-blue-900/50 border-blue-500 text-blue-700 dark:text-blue-300' : 'border-transparent text-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-800' }} mt-1 block pl-7 pr-4 py-2 border-l-4 text-base font-medium transition-all duration-200">
                     Barang Masuk
                 </a>
                 <a href="{{ route('transaksi.createKeluar') }}" class="{{ request()->routeIs('transaksi.createKeluar') ? 'bg-blue-50 dark:bg-blue-900/50 border-blue-500 text-blue-700 dark:text-blue-300' : 'border-transparent text-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-800' }} mt-1 block pl-7 pr-4 py-2 border-l-4 text-base font-medium transition-all duration-200">
                     Barang Keluar
                 </a>
            </div>
        </div>
    </div>
</nav>

{{-- Script untuk Toggle Dark Mode --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

        // Change the icons inside the button based on previous settings
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            themeToggleLightIcon.classList.remove('hidden');
        } else {
            themeToggleDarkIcon.classList.remove('hidden');
        }

        var themeToggleBtn = document.getElementById('theme-toggle');

        themeToggleBtn.addEventListener('click', function() {
            // toggle icons inside button
            themeToggleDarkIcon.classList.toggle('hidden');
            themeToggleLightIcon.classList.toggle('hidden');

            // if set via local storage previously
            if (localStorage.getItem('color-theme')) {
                if (localStorage.getItem('color-theme') === 'light') {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                }
            // if NOT set via local storage previously
            } else {
                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                }
            }
        });
    });
</script>

