<nav class="bg-white dark:bg-slate-900 shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo and Main Links -->
            <div class="flex items-center space-x-8">
                <!-- Logo -->
                <a href="{{ route('dashboard') }}" class="flex-shrink-0 flex items-center space-x-2">
                    <svg class="h-8 w-8 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
                    </svg>
                    <span class="font-bold text-lg text-slate-800 dark:text-slate-200">GudangApp</span>
                </a>
                
                <!-- Navigation Links -->
                <div class="hidden sm:flex sm:space-x-6">
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium {{ request()->routeIs('dashboard') ? 'border-blue-500 text-slate-900 dark:text-white' : 'border-transparent text-gray-500 dark:text-gray-400 hover:border-gray-300 hover:text-gray-700 dark:hover:text-gray-200' }}">
                        Dashboard
                    </a>
                    <a href="{{ route('barangs.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium {{ request()->routeIs('barangs.*') ? 'border-blue-500 text-slate-900 dark:text-white' : 'border-transparent text-gray-500 dark:text-gray-400 hover:border-gray-300 hover:text-gray-700 dark:hover:text-gray-200' }}">
                        Manajemen Barang
                    </a>
                    <a href="{{ route('suppliers.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium {{ request()->routeIs('suppliers.*') ? 'border-blue-500 text-slate-900 dark:text-white' : 'border-transparent text-gray-500 dark:text-gray-400 hover:border-gray-300 hover:text-gray-700 dark:hover:text-gray-200' }}">
                        Manajemen Supplier
                    </a>
                </div>
            </div>

            <!-- Dark Mode Toggle -->
            <div class="flex items-center">
                <button id="theme-toggle" type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
                    <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                    <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Script untuk menangani logika Dark Mode --}}
    <script>
        const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');
        const themeToggleButton = document.getElementById('theme-toggle');

        // Fungsi untuk mengatur tema berdasarkan preferensi
        function applyTheme(isDark) {
            if (isDark) {
                document.documentElement.classList.add('dark');
                themeToggleLightIcon.classList.remove('hidden');
                themeToggleDarkIcon.classList.add('hidden');
            } else {
                document.documentElement.classList.remove('dark');
                themeToggleDarkIcon.classList.remove('hidden');
                themeToggleLightIcon.classList.add('hidden');
            }
        }

        // Terapkan tema saat halaman dimuat
        const isDarkMode = localStorage.getItem('color-theme') === 'dark' || 
                           (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches);
        applyTheme(isDarkMode);

        // Tambahkan event listener ke tombol
        themeToggleButton.addEventListener('click', function() {
            // Cek tema saat ini
            const isCurrentlyDark = document.documentElement.classList.contains('dark');
            
            // Simpan preferensi baru ke localStorage
            localStorage.setItem('color-theme', isCurrentlyDark ? 'light' : 'dark');

            // Terapkan tema baru
            applyTheme(!isCurrentlyDark);
        });
    </script>
</nav>

