<x-print-layout>
    <div class="bg-white p-8 rounded-lg shadow-lg">
        {{-- Header Laporan --}}
        <header class="flex justify-between items-center border-b pb-4 mb-8">
            <div>
                <img src="{{ asset('images/logo.png') }}" alt="Logo Perusahaan" class="h-12 mb-2">
                <h1 class="text-3xl font-bold text-slate-800">Laporan Transaksi Gudang</h1>
                <p class="text-slate-500">Periode: <span class="font-semibold">{{ \Carbon\Carbon::parse($startDate)->isoFormat('D MMMM Y') }}</span> - <span class="font-semibold">{{ \Carbon\Carbon::parse($endDate)->isoFormat('D MMMM Y') }}</span></p>
            </div>
            <div class="text-right">
                <h2 class="text-2xl font-bold text-blue-600">GudangApp</h2>
                <p class="text-sm text-gray-500">PT. Sunrose Indonesia</p>
            </div>
        </header>

        {{-- Tabel Data Transaksi --}}
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-center text-xs text-slate-900 font-semibold uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-3 text-center text-xs text-slate-900 font-semibold uppercase tracking-wider">Jenis</th>
                        <th class="px-6 py-3 text-center text-xs text-slate-900 font-semibold uppercase tracking-wider">Nama Barang</th>
                        <th class="px-6 py-3 text-center text-xs text-slate-900 font-semibold uppercase tracking-wider">Jumlah</th>
                        <th class="px-6 py-3 text-center text-xs text-slate-900 font-semibold uppercase tracking-wider">Supplier / Tujuan</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                     @forelse ($transaksis as $transaksi)
                        <tr class="text-sm">
                            <td class="px-6 py-4 whitespace-nowrap text-center font-semibold text-slate-900">{{ \Carbon\Carbon::parse($transaksi->tanggal_transaksi)->format('d M Y, H:i') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center font-medium">
                                @if ($transaksi->jenis == 'masuk')
                                    <span class="text-green-600">Masuk</span>
                                @else
                                    <span class="text-red-600">Keluar</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center font-semibold text-slate-900">{{ $transaksi->barang->nama_barang ?? 'N/A' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-slate-900 font-semibold">{{ $transaksi->jumlah }}</td>
                            <td class="px-6 py-4 text-slate-900 font-semibold text-center">{{ $transaksi->supplier->nama_supplier ?? 'Internal/Tujuan Lain' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-10 text-gray-500">Tidak ada data transaksi pada periode ini.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Footer dan Tombol Aksi --}}
        <footer class="mt-8 pt-4 border-t flex justify-between items-center">
            <p class="text-sm text-slate-900 font-bold">Laporan dicetak pada: {{ now()->isoFormat('D MMMM Y, HH:mm') }}</p>
            <div class="no-print">
                 <button onclick="window.print()" class="inline-flex items-center justify-center rounded-lg border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5 4v3H4a2 2 0 00-2 2v3a2 2 0 002 2h1v3a2 2 0 002 2h8a2 2 0 002-2v-3h1a2 2 0 002-2V9a2 2 0 00-2-2h-1V4a2 2 0 00-2-2H7a2 2 0 00-2 2zm8 0H7v3h6V4zm0 8H7v3h6v-3z" clip-rule="evenodd" />
                    </svg>
                    Cetak
                </button>
            </div>
        </footer>
    </div>
</x-print-layout>
