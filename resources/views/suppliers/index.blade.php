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
                            <h1 class="text-3xl font-bold text-slate-800 dark:text-slate-100">Manajemen Data Supplier</h1>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Kelola semua data supplier yang bekerja sama.</p>
                        </div>
                        <a href="{{ route('suppliers.create') }}" class="mt-4 sm:mt-0 inline-flex items-center justify-center rounded-lg border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Tambah Supplier
                        </a>
                    </div>

                    {{-- seacrh --}}

                    <div class="mb-4">
                        <div class="relative">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            {{-- PERBAIKAN: Menambahkan ID untuk JavaScript --}}
                            <input type="text" name="search" id="search-input" class="block w-full rounded-lg border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-slate-800 text-gray-900 dark:text-gray-200 py-2 pl-10 pr-3 focus:border-blue-500 focus:ring-blue-500 sm:text-sm transition duration-150" placeholder="Cari berdasarkan nama atau email Supplier...">
                        </div>
                    </div>

                    {{-- Tabel Data --}}
                    <div class="overflow-x-auto border border-gray-200 dark:border-gray-700 rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-slate-800">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-slate-900 dark:text-gray-300 uppercase tracking-wider">Nama Supplier</th>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-slate-900 dark:text-gray-300 uppercase tracking-wider">Email</th>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-slate-900 dark:text-gray-300 uppercase tracking-wider">Telepon</th>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-slate-900 dark:text-gray-300 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="supplier-table-body" class="bg-white dark:bg-slate-900 divide-y divide-gray-200 dark:divide-gray-700">
                                @forelse ($suppliers as $supplier)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-slate-800 transition-colors duration-150">
                                        <td class="px-6 py-4 text-center whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">{{ $supplier->nama_supplier }}</td>
                                        <td class="px-6 py-4 text-center whitespace-nowrap text-sm font-bold text-slate-900 dark:text-gray-300">{{ $supplier->email }}</td>
                                        <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-slate-900 font-bold dark:text-gray-300">{{ $supplier->kontak }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-center">
                                            <div class="flex items-center justify-center space-x-4">
                                                <a href="{{ route('suppliers.edit', $supplier->id) }}" class="text-yellow-500 hover:text-yellow-700 dark:text-yellow-400 dark:hover:text-yellow-300" title="Edit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" /><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" /></svg>
                                                </a>
                                                <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" class="delete-form">
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
                                        <td colspan="4" class="px-6 py-12 text-center">
                                            <div class="text-center">
                                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                     <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M15 21v-1a6 6 0 00-1-3.72a4 4 0 00-3-3.26C8.89 12.02 7.5 10.635 7.5 9c0-1.38 1.12-2.5 2.5-2.5S12.5 7.62 12.5 9" />
                                                </svg>
                                                <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-gray-200">Belum ada data supplier</h3>
                                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Silakan mulai dengan menambahkan supplier baru.</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse

                                {{-- Barus pesan tidak ditemukan --}}

                                <tr id="no-results-row" class="hidden">
                                    <td colspan="5" class="px-6 py-12 text-center">
                                        <p class="text-gray-500 dark:text-gray-400">Tidak ada Supplier yang cocok dengan pencarian Anda.</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination Links --}}
                    <div class="mt-6">
                        {{ $suppliers->links() }}
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
                    text: "Data Supplier akan dihapus secara permanen!",
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
            let tableBody = document.getElementById('supplier-table-body');
            let rows = tableBody.getElementsByTagName('tr');
            let noResultsRow = document.getElementById('no-results-row');
            let resultsFound = false;

            for (let i = 0; i < rows.length; i++) {
                // Jangan filter baris 'no-results-row' itu sendiri
                if (rows[i].id === 'no-results-row') continue;

                // Kolom ke-2 (index 1) adalah Kode Barang, Kolom ke-3 (index 2) adalah Nama Barang
                let namasupplierCell = rows[i].getElementsByTagName('td')[0];
                let emailCell = rows[i].getElementsByTagName('td')[1];

                if (namasupplierCell && emailCell) {
                    let namasupplierText = namasupplierCell.textContent || namasupplierCell.innerText;
                    let emailText = emailCell.textContent || emailCell.innerText;
                    
                    if (namasupplierText.toLowerCase().indexOf(filter) > -1 || emailText.toLowerCase().indexOf(filter) > -1) {
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

