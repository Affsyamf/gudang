<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Barang</title>
    {{-- Memuat Tailwind CSS via CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

    <div class="container mx-auto p-4 sm:p-6 lg:p-8">
        
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            {{-- Header Card --}}
            <div class="px-6 py-4 bg-gray-800 text-white flex justify-between items-center">
                <h1 class="text-xl font-bold">Manajemen Data Barang</h1>
                {{-- Tombol Tambah Barang --}}
                <a href="{{ route('barangs.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-all duration-200">
                    + Tambah Barang
                </a>
            </div>

            {{-- Body Card --}}
            <div class="p-6">
                {{-- Tabel Data --}}
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white">
                        <thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <tr>
                                <th class="py-3 px-6 text-left">Kode Barang</th>
                                <th class="py-3 px-6 text-left">Nama Barang</th>
                                <th class="py-3 px-6 text-center">Satuan</th>
                                <th class="py-3 px-6 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            @forelse ($barangs as $barang)
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="py-3 px-6 text-left whitespace-nowrap">
                                        <span class="font-medium">{{ $barang->kode_barang }}</span>
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        {{ $barang->nama_barang }}
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">{{ $barang->satuan }}</span>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <div class="flex item-center justify-center space-x-2">
                                            <a href="#" class="bg-yellow-500 text-white py-1 px-3 rounded-full text-xs hover:bg-yellow-600 transition-all duration-200">Edit</a>
                                            <a href="#" class="bg-red-500 text-white py-1 px-3 rounded-full text-xs hover:bg-red-600 transition-all duration-200">Hapus</a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-4">
                                        <p class="text-gray-500">Belum ada data barang.</p>
                                        <p class="text-sm mt-1">Silakan klik tombol "Tambah Barang" untuk memulai.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

</body>
</html>

