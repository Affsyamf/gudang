<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang Baru</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

    <div class="container mx-auto p-4 sm:p-6 lg:p-8">
        <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
            
            <div class="px-6 py-4 bg-gray-800 text-white">
                <h1 class="text-xl font-bold">Form Tambah Barang Baru</h1>
            </div>

            <div class="p-6">
                {{-- Menampilkan error validasi --}}
                @if ($errors->any())
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                        <p class="font-bold">Terjadi Kesalahan</p>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('barangs.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="kode_barang" class="block text-gray-700 text-sm font-bold mb-2">Kode Barang</label>
                        <input type="text" name="kode_barang" id="kode_barang" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>

                    <div class="mb-4">
                        <label for="nama_barang" class="block text-gray-700 text-sm font-bold mb-2">Nama Barang</label>
                        <input type="text" name="nama_barang" id="nama_barang" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>

                    <div class="mb-4">
                        <label for="satuan" class="block text-gray-700 text-sm font-bold mb-2">Satuan (pcs, box, kg)</label>
                        <input type="text" name="satuan" id="satuan" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>

                    <div class="mb-6">
                        <label for="deskripsi" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi (Opsional)</label>
                        <textarea name="deskripsi" id="deskripsi" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                    </div>

                    <div class="flex items-center justify-end">
                        <a href="{{ route('barangs.index') }}" class="text-gray-600 hover:text-gray-800 font-bold py-2 px-4 rounded-lg mr-2">Batal</a>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-all duration-200">
                            Simpan Barang
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
