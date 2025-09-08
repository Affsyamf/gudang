{{-- Tabel Data --}}
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
        <tbody class="bg-white dark:bg-slate-900 divide-y divide-gray-200 dark:divide-gray-700">
            @forelse ($barangs as $barang)
                <tr class="hover:bg-gray-50 dark:hover:bg-slate-800 transition-colors duration-150">
                    <td class="px-6 py-4 flex justify-center items-center whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                        @if($barang->image)
                           <img src="{{ asset('storage/' . $barang->image) }}" alt="{{ $barang->nama_barang }}" class="h-10 w-10 rounded-full object-cover">
                        @else
                           <span class="flex items-center justify-center h-10 w-10 rounded-full bg-slate-200 dark:bg-slate-700 text-xs text-slate-500 dark:text-slate-400">No Img</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-center whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">{{ $barang->kode_barang }}</td>
                    <td class="px-6 py-4 text-center font-semibold whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">{{ $barang->nama_barang }}</td>
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
                            <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-gray-200">
                                @if (request('search'))
                                    Tidak ada barang ditemukan
                                @else
                                    Belum ada data barang
                                @endif
                            </h3>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                @if (request('search'))
                                    Tidak ada data yang cocok dengan pencarian "{{ request('search') }}".
                                @else
                                    Silakan mulai dengan menambahkan barang baru.
                                @endif
                            </p>
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- Pagination Links --}}
<div class="mt-6">
    {{ $barangs->links() }}
</div>
