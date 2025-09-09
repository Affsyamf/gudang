<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <title>{{ config('app.name', 'Gudang App') }}</title>

    {{-- tomjs --}}
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">
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

      {{-- PERBAIKAN: Menambahkan styling kustom untuk TomSelect dalam dark mode --}}
    <style>
        .dark .ts-control {
    background-color: #1e293b !important; /* slate-800 */
    border-color: #475569 !important;     /* slate-600 */
    color: #e2e8f0 !important;            /* slate-200 */
}

/* Placeholder di input */
.dark .ts-control input::placeholder {
    color: #94a3b8 !important; /* slate-400 */
}

/* Item yang sudah dipilih (dalam box input) */
.dark .ts-control .item {
    color: #f1f5f9 !important; /* slate-100 biar lebih terang */
    background-color: transparent !important;
    opacity: 1 !important; /* override default TomSelect yang bikin pudar */
}

/* Dropdown list container */
html.dark .ts-dropdown {
    background-color: #0f172a !important; /* slate-900 */
    border-color: #475569 !important; 
     color: #e2e8f0 !important;    /* slate-600 */
}

/* Semua opsi di dropdown */
.dark .ts-dropdown .ts-option {
    color: #e2e8f0 !important; /* slate-200 */
}

.dark .ts-control input {
    color: #f1f5f9 !important;   /* slate-100 → putih terang */
    background-color: transparent !important;
}

/* Opsi yang aktif/terpilih saat hover */
.dark .ts-dropdown .ts-option.active {
    background-color: #334155 !important; /* slate-700 */
    color: #ffffff !important;
}

/* Opsi yang disabled */
.dark .ts-dropdown .ts-option[aria-disabled="true"] {
    color: #94a3b8 !important; /* slate-400 */
    opacity: 1 !important;     /* jangan bikin pudar */
}

/* Create option (jika pakai create feature TomSelect) */
.dark .ts-dropdown .create {
    color: #e2e8f0 !important; /* slate-200 */
}

/* Search input di dalam dropdown */
.dark .ts-dropdown .ts-control input {
    background-color: transparent !important;
    color: #e2e8f0 !important; /* slate-200 */
}

    </style>
    
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
<body class="font-sans antialiased bg-slate-100 dark:bg-slate-900 overflow-x-hidden">
    <div class="min-h-screen">
        {{-- Memanggil menu navigasi --}}
        @include('layouts.navigation')

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    {{-- SweetAlert2 & ApexCharts via CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
    @stack('scripts')
    
</body>
</html>