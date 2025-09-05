<x-app-layout>
    <div class="py-12 bg-slate-100 dark:bg-slate-800">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-xl overflow-hidden">
                
                {{-- Card Header --}}
                <div class="px-6 py-4 bg-gradient-to-r from-slate-700 to-slate-900 text-white flex items-center space-x-3">
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    <h1 class="text-xl font-bold">Form Edit Barang</h1>
                </div>

                <div class="p-6">
                    {{-- Menampilkan error validasi --}}
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

                    <form action="{{ route('barangs.update', $barang->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="space-y-6">
                            {{-- Kode Barang --}}
                            <div>
                                <label for="kode_barang" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Kode Barang</label>
                                <div class="relative rounded-md shadow-sm">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" /></svg>
                                    </div>
                                    <input type="text" name="kode_barang" id="kode_barang" value="{{ old('kode_barang', $barang->kode_barang) }}" class="block w-full rounded-lg border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-slate-800 text-gray-900 dark:text-gray-200 pl-10 focus:border-blue-500 focus:ring-blue-500 sm:text-sm transition duration-150" placeholder="Contoh: BRG-001" required>
                                </div>
                            </div>

                            {{-- Nama Barang --}}
                            <div>
                                <label for="nama_barang" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nama Barang</label>
                                <div class="relative rounded-md shadow-sm">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                       <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0 0L4 11m8 4v10M4 7v10l8 4" /></svg>
                                    </div>
                                    <input type="text" name="nama_barang" id="nama_barang" value="{{ old('nama_barang', $barang->nama_barang) }}" class="block w-full rounded-lg border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-slate-800 text-gray-900 dark:text-gray-200 pl-10 focus:border-blue-500 focus:ring-blue-500 sm:text-sm transition duration-150" placeholder="Contoh: Laptop" required>
                                </div>
                            </div>

                            {{-- Satuan --}}
                            <div>
                                <label for="satuan" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Satuan</label>
                                <div class="relative rounded-md shadow-sm">
                                     <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                       <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7l8-4 8 4" /></svg>
                                    </div>
                                    <input type="text" name="satuan" id="satuan" value="{{ old('satuan', $barang->satuan) }}" class="block w-full rounded-lg border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-slate-800 text-gray-900 dark:text-gray-200 pl-10 focus:border-blue-500 focus:ring-blue-500 sm:text-sm transition duration-150" placeholder="Contoh: pcs, box, kg" required>
                                </div>
                            </div>

                            {{-- Deskripsi --}}
                            <div>
                                <label for="deskripsi" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Deskripsi (Opsional)</label>
                                <textarea name="deskripsi" id="deskripsi" rows="4" class="block w-full rounded-lg border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-slate-800 text-gray-900 dark:text-gray-200 focus:border-blue-500 focus:ring-blue-500 sm:text-sm transition duration-150" placeholder="Masukkan deskripsi singkat barang...">{{ old('deskripsi', $barang->deskripsi) }}</textarea>
                            </div>

                            {{-- Tombol Aksi --}}
                            <div class="flex items-center justify-end pt-4 space-x-4">
                                <a href="{{ route('barangs.index') }}" class="inline-flex items-center justify-center rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-slate-700 px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 shadow-sm hover:bg-gray-50 dark:hover:bg-slate-600 focus:outline-none focus:ring-2 focus:ring-slate-500 focus:ring-offset-2 transition-all duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                                    Batal
                                </a>
                                <button type="submit" class="inline-flex items-center justify-center rounded-lg border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                    Update Barang
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

