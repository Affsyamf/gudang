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

                    {{-- Tabel Data --}}
                    <div class="overflow-x-auto border border-gray-200 dark:border-gray-700 rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-slate-800">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Tanggal</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Jenis</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Nama Barang</th>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Jumlah</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Supplier / Tujuan</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-slate-900 divide-y divide-gray-200 dark:divide-gray-700">
                                @forelse ($transaksis as $transaksi)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-slate-800 transition-colors duration-150">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                            {{ \Carbon\Carbon::parse($transaksi->tanggal_transaksi)->format('d M Y, H:i') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
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
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">{{ $transaksi->barang->nama_barang ?? 'N/A' }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300 text-center font-semibold">{{ $transaksi->jumlah }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
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
</x-app-layout>

