<x-app-layout>
    <div class="py-12 bg-slate-100 dark:bg-slate-800">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-xl overflow-hidden">
                
                {{-- Card Header --}}
                <div class="px-6 py-4 bg-gradient-to-r from-slate-700 to-slate-900 text-white flex items-center space-x-3">
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    <h1 class="text-xl font-bold">Form Edit Data Supplier</h1>
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

                    <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="space-y-6">
                            {{-- Nama Supplier --}}
                            <div>
                                <label for="nama_supplier" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nama Supplier</label>
                                <div class="relative rounded-md shadow-sm">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                                    </div>
                                    <input type="text" name="nama_supplier" id="nama_supplier" value="{{ old('nama_supplier', $supplier->nama_supplier) }}" class="block w-full rounded-lg border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-slate-800 text-gray-900 dark:text-gray-200 pl-10 focus:border-blue-500 focus:ring-blue-500 sm:text-sm transition duration-150" required>
                                </div>
                            </div>

                            {{-- Email --}}
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email</label>
                                <div class="relative rounded-md shadow-sm">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                       <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                                    </div>
                                    <input type="email" name="email" id="email" value="{{ old('email', $supplier->email) }}" class="block w-full rounded-lg border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-slate-800 text-gray-900 dark:text-gray-200 pl-10 focus:border-blue-500 focus:ring-blue-500 sm:text-sm transition duration-150" required>
                                </div>
                            </div>
                            
                            {{-- Telepon --}}
                            <div>
                                <label for="telepon" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nomor Telepon</label>
                                <div class="relative rounded-md shadow-sm">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                       <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                                    </div>
                                    <input type="text" name="telepon" id="telepon" value="{{ old('telepon', $supplier->telepon) }}" class="block w-full rounded-lg border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-slate-800 text-gray-900 dark:text-gray-200 pl-10 focus:border-blue-500 focus:ring-blue-500 sm:text-sm transition duration-150" required>
                                </div>
                            </div>

                            {{-- Alamat --}}
                            <div>
                                <label for="alamat" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Alamat</label>
                                <textarea name="alamat" id="alamat" rows="4" class="block w-full rounded-lg border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-slate-800 text-gray-900 dark:text-gray-200 focus:border-blue-500 focus:ring-blue-500 sm:text-sm transition duration-150" required>{{ old('alamat', $supplier->alamat) }}</textarea>
                            </div>

                            {{-- Tombol Aksi --}}
                            <div class="flex items-center justify-end pt-4 space-x-4">
                                <a href="{{ route('suppliers.index') }}" class="inline-flex items-center justify-center rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-slate-700 px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 shadow-sm hover:bg-gray-50 dark:hover:bg-slate-600 focus:outline-none focus:ring-2 focus:ring-slate-500 focus:ring-offset-2 transition-all duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                                    Batal
                                </a>
                                <button type="submit" class="inline-flex items-center justify-center rounded-lg border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                    Update Supplier
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

