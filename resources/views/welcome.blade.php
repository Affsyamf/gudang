<x-guest-layout>
    <div class="bg-slate-50 dark:bg-slate-900">
        {{-- Header & Navigasi --}}
        <header class="absolute inset-x-0 top-0 z-50">
            <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
                <div class="flex lg:flex-1">
                    <a href="/" class="-m-1.5 p-1.5 flex items-center space-x-2">
                        <svg class="h-8 w-auto text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
                        </svg>
                        <span class="font-bold text-xl text-slate-800 dark:text-white">PT. SUNROSE INDONESIA | Afif</span>
                    </a>
                </div>
                <div class="flex lg:flex-1 lg:justify-end">
                    <a href="{{ route('dashboard') }}" class="text-sm font-semibold leading-6 text-gray-900 dark:text-white bg-white/50 dark:bg-slate-800/50 backdrop-blur-sm rounded-lg px-4 py-2 hover:bg-white/70 dark:hover:bg-slate-700/50 transition-colors duration-300">Masuk ke Dashboard <span aria-hidden="true">&rarr;</span></a>
                </div>
            </nav>
        </header>

        {{-- Hero Section --}}
        <div class="relative isolate px-6 pt-14 lg:px-8">
            <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
                <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#80ff89] to-[#0077ff] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
            </div>
            <div class="mx-auto max-w-2xl py-32 sm:py-48 lg:py-56">
                <div class="text-center">
                    <h1 class="text-4xl font-bold tracking-tight text-gray-900 dark:text-white sm:text-6xl">Sistem Manajemen Gudang Modern</h1>
                    <p class="mt-6 text-lg leading-8 text-gray-600 dark:text-gray-300">Solusi terintegrasi untuk memonitoring stok barang masuk dan keluar dengan efisien dan akurat.</p>
                    <div class="mt-10 flex items-center justify-center gap-x-6">
                        <a href="{{ route('dashboard') }}" class="rounded-md bg-blue-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Mulai Kelola</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Product Gallery Section --}}
        <div class="bg-white dark:bg-slate-800/50 py-24 sm:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl lg:mx-0">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white sm:text-4xl">Contoh Produk Kami</h2>
                    <p class="mt-6 text-lg leading-8 text-gray-600 dark:text-gray-300">Berikut adalah beberapa contoh barang yang dapat dikelola dalam sistem kami.</p>
                </div>
                <div class="mx-auto mt-16 grid max-w-2xl grid-cols-2 gap-x-8 gap-y-20 sm:grid-cols-3 lg:mx-0 lg:max-w-none lg:grid-cols-4">
                    @forelse ($barangs as $barang)
                        <article class="flex flex-col items-start justify-between">
                            <div class="relative w-full">
                                <img src="https://placehold.co/600x400/e2e8f0/475569?text={{ urlencode($barang->nama_barang) }}" alt="" class="aspect-[16/9] w-full rounded-2xl bg-gray-100 object-cover sm:aspect-[2/1] lg:aspect-[3/2]">
                                <div class="absolute inset-0 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>
                            </div>
                            <div class="max-w-xl">
                                <div class="group relative">
                                    <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 dark:text-white group-hover:text-gray-600 dark:group-hover:text-gray-300">
                                        {{ $barang->nama_barang }}
                                    </h3>
                                    <p class="mt-2 line-clamp-3 text-sm leading-6 text-gray-600 dark:text-gray-400">{{ $barang->deskripsi ?: 'Tidak ada deskripsi.' }}</p>
                                </div>
                            </div>
                        </article>
                    @empty
                        <p class="col-span-full text-center text-gray-500 dark:text-gray-400">Belum ada data barang untuk ditampilkan.</p>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- Footer --}}
        <footer class="bg-slate-100 dark:bg-slate-900 border-t border-slate-200 dark:border-slate-800">
            <div class="mx-auto max-w-7xl overflow-hidden px-6 py-12 lg:px-8">
                <p class="text-center text-xs leading-5 text-gray-500 dark:text-gray-400">&copy; {{ date('Y') }} Afif Syam Fauzi, Inc. All rights reserved.</p>
            </div>
        </footer>
    </div>
</x-guest-layout>
