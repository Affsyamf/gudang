<x-guest-layout>
    {{-- Hero Section --}}
    <div class="relative pt-16 pb-32 flex content-center items-center justify-center min-h-[75vh]">
        <div class="absolute top-0 w-full h-full bg-center bg-cover"
            style="background-image: url('https://images.unsplash.com/photo-1616401784845-180882ba9ba8?q=80&w=2070&auto=format&fit=crop');">
            <span id="blackOverlay" class="w-full h-full absolute opacity-75 bg-black"></span>
        </div>
        <div class="container relative mx-auto">
            <div class="items-center flex flex-wrap">
                <div class="w-full lg:w-8/12 px-4 ml-auto mr-auto text-center">
                    <div class="pr-12">
                        <h1 class="text-white font-semibold text-5xl">
                            Solusi Cerdas untuk Gudang Anda.
                        </h1>
                        <p class="mt-4 text-lg text-slate-200">
                            Optimalkan efisiensi, lacak setiap pergerakan barang, dan dapatkan data akurat secara real-time dengan sistem manajemen gudang kami yang modern dan intuitif.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Features Section --}}
    <section class="pb-20 bg-slate-50 dark:bg-slate-800 -mt-24">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap">
                <div class="lg:pt-12 pt-6 w-full md:w-4/12 px-4 text-center">
                    <div class="relative flex flex-col min-w-0 break-words bg-white dark:bg-slate-900 w-full mb-8 shadow-lg rounded-lg">
                        <div class="px-4 py-5 flex-auto">
                            <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-red-400">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 006 16.5h12M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-12a2.25 2.25 0 01-2.25-2.25V3m12.75 0v6.75a2.25 2.25 0 01-2.25 2.25H9.75a2.25 2.25 0 01-2.25-2.25V3" /></svg>
                            </div>
                            <h6 class="text-xl font-semibold dark:text-white">Stok Real-Time</h6>
                            <p class="mt-2 mb-4 text-slate-500 dark:text-slate-400">
                                Stok barang dihitung secara dinamis dari setiap transaksi, memberikan Anda data paling akurat setiap saat.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-4/12 px-4 text-center">
                    <div class="relative flex flex-col min-w-0 break-words bg-white dark:bg-slate-900 w-full mb-8 shadow-lg rounded-lg">
                        <div class="px-4 py-5 flex-auto">
                            <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-blue-400">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" /></svg>
                            </div>
                            <h6 class="text-xl font-semibold dark:text-white">Riwayat Transaksi</h6>
                            <p class="mt-2 mb-4 text-slate-500 dark:text-slate-400">
                                Lacak setiap barang yang masuk dan keluar dengan mudah melalui halaman riwayat yang terperinci.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="pt-6 w-full md:w-4/12 px-4 text-center">
                    <div class="relative flex flex-col min-w-0 break-words bg-white dark:bg-slate-900 w-full mb-8 shadow-lg rounded-lg">
                        <div class="px-4 py-5 flex-auto">
                            <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-emerald-400">
                               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941" /></svg>
                            </div>
                            <h6 class="text-xl font-semibold dark:text-white">Visualisasi Data</h6>
                            <p class="mt-2 mb-4 text-slate-500 dark:text-slate-400">
                                Pahami tren barang masuk dan keluar melalui grafik interaktif di halaman dashboard utama Anda.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Product Gallery Section --}}
    <section class="py-20 bg-slate-50 dark:bg-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white sm:text-4xl">
                    Galeri Produk
                </h2>
                <p class="mt-4 max-w-2xl mx-auto text-xl text-gray-500 dark:text-gray-300">
                    Beberapa contoh barang yang dikelola dalam sistem.
                </p>
            </div>

            <div class="mt-12 grid gap-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @forelse ($barangs as $barang)
                <div class="group relative bg-white dark:bg-slate-900 border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transition-shadow duration-300">
                    <div class="aspect-w-1 aspect-h-1 w-full bg-gray-100 dark:bg-gray-800">
                        @if($barang->image)
                            <img src="{{ asset('storage/' . $barang->image) }}" alt="[Gambar {{ $barang->nama_barang }}]" class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-300">
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                               <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                            </div>
                        @endif
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            {{ $barang->nama_barang }}
                        </h3>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400 truncate">
                            {{ $barang->deskripsi ?: 'Tidak ada deskripsi.' }}
                        </p>
                    </div>
                </div>
                @empty
                <p class="text-center text-gray-500 dark:text-gray-400 col-span-full">Belum ada data barang untuk ditampilkan.</p>
                @endforelse
            </div>
        </div>
    </section>
</x-guest-layout>

