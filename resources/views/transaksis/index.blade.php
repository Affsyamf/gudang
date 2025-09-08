<x-app-layout>
    <div class="py-12 bg-slate-100 dark:bg-slate-800">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-xl overflow-hidden">
                <div class="p-6 bg-white dark:bg-slate-900 border-b border-gray-200 dark:border-gray-700">
                    
                    {{-- Header --}}
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
                        <div>
                            <h1 class="text-3xl font-bold text-slate-800 dark:text-slate-100">Riwayat Transaksi</h1>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Semua catatan pergerakan barang masuk dan keluar.</p>
                        </div>
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
                            <input type="text" name="search" id="search-input" class="block w-full rounded-lg border-gray-300 dark:border-gray-600 bg-gray-100 dark:bg-slate-800 text-gray-900 dark:text-gray-200 py-2 pl-10 pr-3 focus:border-blue-500 focus:ring-blue-500 sm:text-sm transition duration-150" placeholder="Cari berdasarkan nama Barang atau nama Supplier...">
                        </div>
                    </div>


                    {{-- Tabel Data --}}
                    <div class="overflow-x-auto border border-gray-200 dark:border-gray-700 rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-200 dark:bg-slate-800">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-slate-900 dark:text-white uppercase tracking-wider">Tanggal</th>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-slate-900 dark:text-white uppercase tracking-wider">Jenis</th>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-slate-900 dark:text-white uppercase tracking-wider">Nama Barang</th>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-slate-900 dark:text-white uppercase tracking-wider">Jumlah</th>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-slate-900 dark:text-white uppercase tracking-wider">Supplier / Tujuan</th>
                                </tr>
                            </thead>
                            <tbody id="transaksi-table-body" class="bg-white dark:bg-slate-900 divide-y divide-gray-200 dark:divide-gray-700">
                                @forelse ($transaksis as $transaksi)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-slate-800 transition-colors duration-150">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-900 dark:text-white text-center">
                                            {{ \Carbon\Carbon::parse($transaksi->tanggal_transaksi)->format('d M Y, H:i') }}
                                        </td>
                                        <td class="px-6 py-4 text-center whitespace-nowrap text-sm font-medium">
                                            @if ($transaksi->jenis == 'masuk')
                                                <span class="inline-flex items-center rounded-full bg-green-100 dark:bg-green-900/50 px-2.5 py-0.5 text-xs font-medium text-green-800 dark:text-green-300">
                                                    <svg class="-ml-0.5 mr-1.5 h-2 w-2 text-green-400" fill="currentColor" viewBox="0 0 8 8"><circle cx="4" cy="4" r="3" /></svg>
                                                    Masuk
                                                </span>
                                            @else
                                                <span class="inline-flex items-center rounded-full bg-red-100 dark:bg-red-900/50 px-2.5 py-0.5 text-xs font-medium text-red-800 dark:text-red-300">
                                                    <svg class="-ml-0.5 mr-1.5 h-2 w-2 text-red-400" fill="currentColor" viewBox="0 0 8 8"><circle cx="4" cy="4" r="3" /></svg>
                                                    Keluar
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-900 dark:text-white font-semibold">{{ $transaksi->barang->nama_barang ?? 'N/A' }}</td>
                                        <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-500 dark:text-gray-300 font-semibold">{{ $transaksi->jumlah }}</td>
                                        <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-slate-900 dark:text-white font-semibold">
                                            {{ $transaksi->supplier->nama_supplier ?? 'Internal/Tujuan Lain' }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-12 text-center">
                                            <div class="text-center">
                                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                </svg>
                                                <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-gray-200">Belum ada riwayat transaksi</h3>
                                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Silakan catat barang masuk atau keluar terlebih dahulu.</p>
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
                        {{ $transaksis->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>


    @push('scripts')
    <script>
              // Live Search Script
        document.getElementById('search-input').addEventListener('keyup', function() {
            let filter = this.value.toLowerCase();
            let tableBody = document.getElementById('transaksi-table-body');
            let rows = tableBody.getElementsByTagName('tr');
            let noResultsRow = document.getElementById('no-results-row');
            let resultsFound = false;

            for (let i = 0; i < rows.length; i++) {
                // Jangan filter baris 'no-results-row' itu sendiri
                if (rows[i].id === 'no-results-row') continue;

                // Kolom ke-2 (index 1) adalah Kode Barang, Kolom ke-3 (index 2) adalah Nama Barang
                let namabarangCell = rows[i].getElementsByTagName('td')[2];
                let namasupplierCell = rows[i].getElementsByTagName('td')[4];

                if (namabarangCell && namasupplierCell) {
                    let namabarangText = namabarangCell.textContent || namabarangCell.innerText;
                    let namasupplierText = namasupplierCell.textContent || namasupplierCell.innerText;
                    
                    if (namabarangText.toLowerCase().indexOf(filter) > -1 || namasupplierText.toLowerCase().indexOf(filter) > -1) {
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

