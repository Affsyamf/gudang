<x-app-layout>
    <div class="py-12 bg-slate-100 dark:bg-slate-800">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            {{-- Notifikasi Sukses --}}
            @if (session('success'))
                <div id="success-notification" class="mb-6 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg shadow-md" role="alert">
                    <p class="font-bold">Sukses!</p>
                    <p>{{ session('success') }}</p>
                </div>
                 <script>
                     setTimeout(function() {
                         document.getElementById('success-notification').style.display = 'none';
                     }, 3000);
                 </script>
            @endif

            <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-xl overflow-hidden">
                <div class="p-6 bg-white dark:bg-slate-900 border-b border-gray-200 dark:border-gray-700">
                    
                    {{-- Header dan Tombol Tambah --}}
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
                        <div>
                            <h1 class="text-3xl font-bold text-slate-800 dark:text-slate-100">Manajemen Data Barang</h1>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Kelola semua data barang yang terdaftar di gudang.</p>
                        </div>
                        <a href="{{ route('barangs.create') }}" class="mt-4 sm:mt-0 inline-flex items-center justify-center rounded-lg border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Tambah Barang
                        </a>
                    </div>
                    
                    {{-- Search Bar --}}
                    <div class="mb-4">
                        <div class="relative">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            {{-- PERBAIKAN: Menambahkan ID untuk JavaScript --}}
                            <input type="text" name="search" id="search-input" class="block w-full rounded-lg border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-slate-800 text-gray-900 dark:text-gray-200 py-2 pl-10 pr-3 focus:border-blue-500 focus:ring-blue-500 sm:text-sm transition duration-150" placeholder="Cari berdasarkan kode atau nama barang...">
                        </div>
                    </div>

                    <div class="overflow-x-auto border border-gray-200 dark:border-gray-700 rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-slate-800">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Gambar</th>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Kode Barang</th>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Nama Barang</th>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Stok Tersedia</th>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            {{-- PERBAIKAN: Menambahkan ID untuk JavaScript --}}
                            <tbody id="barang-table-body" class="bg-white dark:bg-slate-900 divide-y divide-gray-200 dark:divide-gray-700">
                                @forelse ($barangs as $barang)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-slate-800 transition-colors duration-150">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                            @if($barang->image)
                                               <img src="{{ asset('storage/' . $barang->image) }}" alt="{{ $barang->nama_barang }}" class="h-10 w-10 rounded-full object-cover text-center mx-auto">
                                            @else
                                               <span class="flex items-center justify-center h-10 w-10 rounded-full bg-slate-200 dark:bg-slate-700 text-xs text-slate-500 dark:text-slate-400">No Img</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white text-center">{{ $barang->kode_barang }}</td>
                                        <td class="px-6 py-4 text-center font-bold whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">{{ $barang->nama_barang }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300 text-center">
                                            <span class="inline-flex items-center rounded-full bg-blue-100 dark:bg-blue-900/50 px-2.5 py-0.5 text-xs font-semibold text-blue-800 dark:text-blue-300">
                                                {{ $barang->stok() }} <span class="ml-1 text-xs text-blue-600 dark:text-blue-400">{{ $barang->satuan }}</span>
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-center">
                                            <div class="flex items-center justify-center space-x-4">
                                                <a href="{{ route('barangs.edit', $barang->id) }}" class="text-yellow-500 hover:text-yellow-700 dark:text-yellow-400 dark:hover:text-yellow-300" title="Edit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" /><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" /></svg>
                                                </a>
                                                <form action="{{ route('barangs.destroy', $barang->id) }}" method="POST" class="delete-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-500 hover:text-red-700 dark:text-red-400 dark:hover:text-red-300" title="Hapus">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" /></svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-12 text-center">
                                            <div class="text-center">
                                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                    <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                                                </svg>
                                                <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-gray-200">Belum ada data barang</h3>
                                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Silakan mulai dengan menambahkan barang baru.</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                                {{-- PERBAIKAN: Baris untuk pesan "tidak ditemukan" --}}
                                <tr id="no-results-row" class="hidden">
                                    <td colspan="5" class="px-6 py-12 text-center">
                                        <p class="text-gray-500 dark:text-gray-400">Tidak ada barang yang cocok dengan pencarian Anda.</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.querySelectorAll('.delete-form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data barang akan dihapus secara permanen!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal',
                    background: document.documentElement.classList.contains('dark') ? '#1f2937' : '#fff',
                    color: document.documentElement.classList.contains('dark') ? '#fff' : '#000'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });

        // Live Search Script
        document.getElementById('search-input').addEventListener('keyup', function() {
            let filter = this.value.toLowerCase();
            let tableBody = document.getElementById('barang-table-body');
            let rows = tableBody.getElementsByTagName('tr');
            let noResultsRow = document.getElementById('no-results-row');
            let resultsFound = false;

            for (let i = 0; i < rows.length; i++) {
                // Jangan filter baris 'no-results-row' itu sendiri
                if (rows[i].id === 'no-results-row') continue;

                // Kolom ke-2 (index 1) adalah Kode Barang, Kolom ke-3 (index 2) adalah Nama Barang
                let kodeBarangCell = rows[i].getElementsByTagName('td')[1];
                let namaBarangCell = rows[i].getElementsByTagName('td')[2];

                if (kodeBarangCell || namaBarangCell) {
                    let kodeBarangText = kodeBarangCell.textContent || kodeBarangCell.innerText;
                    let namaBarangText = namaBarangCell.textContent || namaBarangCell.innerText;
                    
                    if (kodeBarangText.toLowerCase().indexOf(filter) > -1 || namaBarangText.toLowerCase().indexOf(filter) > -1) {
                        rows[i].style.display = "";
                        resultsFound = true;
                    } else {
                        rows[i].style.display = "none";
                    }
                }
            }

            // Tampilkan atau sembunyikan pesan "tidak ditemukan"
            if (resultsFound) {
                noResultsRow.classList.add('hidden');
            } else {
                noResultsRow.classList.remove('hidden');
            }
        });
    </script>
    @endpush
</x-app-layout>

