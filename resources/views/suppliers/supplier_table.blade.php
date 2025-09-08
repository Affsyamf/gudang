{{-- Tabel Data --}}
<div class="overflow-x-auto border border-gray-200 dark:border-gray-700 rounded-lg">
    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
        <thead class="bg-gray-50 dark:bg-slate-800">
            <tr>
                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-slate-900 dark:text-gray-300 uppercase tracking-wider">Nama Supplier</th>
                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-slate-900 dark:text-gray-300 uppercase tracking-wider">Email</th>
                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-slate-900 dark:text-gray-300 uppercase tracking-wider">Kontak</th>
                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-slate-900 dark:text-gray-300 uppercase tracking-wider">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white dark:bg-slate-900 divide-y divide-gray-200 dark:divide-gray-700">
            @forelse ($suppliers as $supplier)
                <tr class="hover:bg-gray-50 dark:hover:bg-slate-800 transition-colors duration-150">
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-900 dark:text-white">{{ $supplier->nama_supplier }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-slate-900 font-semibold dark:text-gray-300">{{ $supplier->email }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-slate-900 dark:text-gray-300">{{ $supplier->kontak }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-center">
                        <div class="flex items-center justify-center space-x-4">
                            <a href="{{ route('suppliers.edit', $supplier->id) }}" class="text-yellow-500 hover:text-yellow-700 dark:text-yellow-400 dark:hover:text-yellow-300" title="Edit">
                                <svg xmlns="[http://www.w3.org/2000/svg](http://www.w3.org/2000/svg)" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" /><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" /></svg>
                            </a>
                            <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 dark:text-red-400 dark:hover:text-red-300" title="Hapus">
                                    <svg xmlns="[http://www.w3.org/2000/svg](http://www.w3.org/2000/svg)" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" /></svg>
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
                            <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-gray-200">
                                @if(request('search'))
                                    Tidak ada supplier ditemukan
                                @else
                                    Belum ada data supplier
                                @endif
                            </h3>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                @if(request('search'))
                                    Tidak ada data yang cocok dengan pencarian "{{ request('search') }}".
                                @else
                                    Silakan mulai dengan menambahkan supplier baru.
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
    {{ $suppliers->links() }}
</div>
