<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Gudang App') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    {{-- Kembali menggunakan Tailwind CSS v4 --}}
    <script src="https://cdn.tailwindcss.com"></script>


    {{-- PERBAIKAN: Konfigurasi Tailwind untuk mem-force dark mode via class --}}
    <script>
      tailwind.config = {
        darkMode: 'class',
      }
    </script>

    

    {{-- PENTING: Script untuk inisialisasi tema di awal (sudah benar) --}}
    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>

</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-slate-100 dark:bg-slate-900 transition-colors duration-300">
        @include('layouts.navigation')

        <main>
            {{ $slot }}
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
     @stack('scripts')
</body>
</html>

