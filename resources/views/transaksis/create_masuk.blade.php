<x-app-layout>
    <div class="py-12 bg-slate-100 dark:bg-slate-800">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-xl overflow-hidden">
                
                <div class="px-6 py-4 bg-gradient-to-r from-slate-700 to-slate-900 text-white flex items-center space-x-3">
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" /></svg>
                    <h1 class="text-xl font-bold">Form Transaksi Barang Masuk</h1>
                </div>

                <div class="p-6">
                    @if ($errors->any())
                        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-lg" role="alert">
                            <p class="font-bold">Terjadi Kesalahan</p>
                            <ul class="mt-2 list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('transaksi.storeMasuk') }}" method="POST">
                        @csrf
                        <div class="space-y-6">
                            
                            {{-- Pilih Barang --}}
                            <div>
                                <label for="barang_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Pilih Barang</label>
                                <select name="barang_id" id="barang_id" class="block w-full rounded-lg border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-slate-800 text-gray-900 dark:text-gray-200 focus:border-blue-500 focus:ring-blue-500 sm:text-sm transition duration-150" required>
                                    <option value="">-- Pilih Barang --</option>
                                    @foreach($barangs as $barang)
                                        <option value="{{ $barang->id }}" {{ old('barang_id') == $barang->id ? 'selected' : '' }}>{{ $barang->nama_barang }} ({{ $barang->kode_barang }})</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Pilih Supplier --}}
                            <div>
                                <label for="supplier_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Pilih Supplier</label>
                                <select name="supplier_id" id="supplier_id" class="block w-full rounded-lg border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-slate-800 text-gray-900 dark:text-gray-200 focus:border-blue-500 focus:ring-blue-500 sm:text-sm transition duration-150" required>
                                     <option value="">-- Pilih Supplier --</option>
                                    @foreach($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}" {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>{{ $supplier->nama_supplier }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            {{-- Jumlah --}}
                            <div>
                                <label for="jumlah" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Jumlah Masuk</label>
                                <input type="number" name="jumlah" id="jumlah" value="{{ old('jumlah') }}" class="block w-full rounded-lg border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-slate-800 text-gray-900 dark:text-gray-200 focus:border-blue-500 focus:ring-blue-500 sm:text-sm transition duration-150" placeholder="Masukkan jumlah barang" required min="1">
                            </div>

                            {{-- Tanggal Transaksi --}}
                            <div>
                                <label for="tanggal_transaksi" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Tanggal Transaksi</label>
                             <input type="datetime-local" name="tanggal_transaksi" id="tanggal_transaksi" value="{{ old('tanggal_transaksi', now()->format('Y-m-d\TH:i')) }}" class="block w-full rounded-lg border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-slate-800 text-gray-900 dark:text-gray-200 focus:border-blue-500 focus:ring-blue-500 sm:text-sm transition duration-150" required>
                            </div>

                            {{-- Tombol Aksi --}}
                            <div class="flex items-center justify-end pt-4 space-x-4">
                                <a href="{{ route('dashboard') }}" class="inline-flex items-center justify-center rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-slate-700 px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 shadow-sm hover:bg-gray-50 dark:hover:bg-slate-600 focus:outline-none focus:ring-2 focus:ring-slate-500 focus:ring-offset-2 transition-all duration-200">
                                    Batal
                                </a>
                                <button type="submit" class="inline-flex items-center justify-center rounded-lg border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200">
                                    Simpan Transaksi
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
     @push('scripts')
    <script>
        // PERBAIKAN: Script untuk mengatur waktu default ke waktu saat ini
        document.addEventListener('DOMContentLoaded', function() {
            const now = new Date();
            now.setMinutes(now.getMinutes() - now.getTimezoneOffset());
            const yyyy = now.getFullYear();
            const mm = String(now.getMonth() + 1).padStart(2, '0');
            const dd = String(now.getDate()).padStart(2, '0');
            const hh = String(now.getHours()).padStart(2, '0');
            const min = String(now.getMinutes()).padStart(2, '0');
            
            const localDateTime = `${yyyy}-${mm}-${dd}T${hh}:${min}`;
            
            const dateInput = document.getElementById('tanggal_transaksi');
            if (!dateInput.value) {
                dateInput.value = localDateTime;
            }
        });
    </script>
    @endpush
</x-app-layout>
