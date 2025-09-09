<x-app-layout>
    <div class="py-12 bg-slate-100 dark:bg-slate-800">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-xl overflow-hidden">
                
                {{-- Header --}}
                <div class="p-6 bg-white dark:bg-slate-900 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex items-center">
                        <a href="{{ route('transaksis.index') }}" class="text-slate-500 dark:text-slate-400 hover:text-slate-800 dark:hover:text-slate-200 transition-colors duration-200 mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                        </a>
                        <div>
                            <h1 class="text-2xl font-bold text-slate-800 dark:text-slate-100">Form Transaksi Barang Keluar</h1>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Catat setiap barang yang keluar dari gudang.</p>
                        </div>
                    </div>
                </div>

                <div class="p-6">
                    @if ($errors->any())
                        <div class="mb-6 bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg" role="alert">
                            <p class="font-bold">Terjadi Kesalahan</p>
                            <ul class="mt-2 list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('transaksi.storeKeluar') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            
                            {{-- Pilih Barang --}}
                            <div>
                                <label for="select-barang-keluar" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Pilih Barang</label>
                                <input id="select-barang-keluar" name="barang_id" placeholder="Cari atau pilih barang..." autocomplete="off">
                            </div>
                            
                            {{-- Jumlah Keluar --}}
                            <div>
                                <label for="jumlah" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Jumlah Keluar</label>
                                <input type="number" name="jumlah" id="jumlah" min="1" value="{{ old('jumlah') }}" class="block w-full rounded-lg border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-slate-800 text-gray-900 dark:text-gray-200 focus:border-blue-500 focus:ring-blue-500 sm:text-sm transition duration-150" required>
                            </div>

                            {{-- Tujuan Keluar --}}
                            <div>
                                <label for="select-tujuan" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Tujuan Keluar</label>
                                <input id="select-tujuan" name="supplier_id" placeholder="Cari atau pilih tujuan..." autocomplete="off">
                            </div>
                            
                            {{-- Tanggal Transaksi --}}
                            <div>
                                <label for="tanggal_transaksi" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Tanggal & Waktu Transaksi</label>
                                <input type="datetime-local" name="tanggal_transaksi" id="tanggal_transaksi" value="" class="block w-full rounded-lg border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-slate-800 text-gray-900 dark:text-gray-200 focus:border-blue-500 focus:ring-blue-500 sm:text-sm transition duration-150" required>
                            </div>
                        </div>

                        <div class="mt-8 flex justify-end">
                            <a href="{{ route('transaksis.index') }}" class="py-2 px-4 text-sm font-medium text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white mr-4">Batal</a>
                            <button type="submit" class="inline-flex items-center justify-center rounded-lg border border-transparent bg-blue-600 px-6 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200">
                                Simpan Transaksi
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Inisialisasi TomSelect untuk Barang Keluar
            new TomSelect('#select-barang-keluar',{
                valueField: 'id',
                labelField: 'nama_barang',
                searchField: 'nama_barang',
                options: @json($barangs),
                create: false,
                maxItems: 1

            });

            // Inisialisasi TomSelect untuk Tujuan Keluar
            new TomSelect('#select-tujuan',{
                valueField: 'id',
                labelField: 'nama_supplier',
                searchField: 'nama_supplier',
                options: [
                    // Menambahkan opsi 'Tujuan Lain' secara manual
                    { id: '', nama_supplier: 'Tujuan Lain / Internal' }, 
                    ...@json($suppliers)
                ],
                create: false,
                 maxItems: 1
            });

            // Set waktu live
            const now = new Date();
            now.setMinutes(now.getMinutes() - now.getTimezoneOffset());
            document.getElementById('tanggal_transaksi').value = now.toISOString().slice(0,16);
        });
    </script>
    @endpush
</x-app-layout>

