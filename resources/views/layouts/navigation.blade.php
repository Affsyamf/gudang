<nav class="bg-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    {{-- Logo atau Nama Aplikasi --}}
                    <a href="{{ route('barangs.index') }}" class="text-white font-bold text-xl">
                        Aplikasi Gudang
                    </a>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        {{-- Link-link menu --}}
                        {{-- Class 'bg-gray-900' menandakan halaman aktif --}}
                        <a href="{{ route('barangs.index') }}" 
                           class="{{ request()->routeIs('barangs.*') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium" 
                           aria-current="page">Manajemen Barang</a>

                        <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Manajemen Supplier</a>
                        
                        <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Transaksi</a>
                        
                        <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Laporan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

