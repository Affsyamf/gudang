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

                    {{-- Search Input (bukan lagi form) --}}
                    <div class="mb-4">
                        <div class="relative">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="text" name="search" id="search-input" class="block w-full rounded-lg border-gray-300 dark:border-gray-600 bg-gray-100 dark:bg-slate-800 text-gray-900 dark:text-gray-200 py-2 pl-10 pr-3 focus:border-blue-500 focus:ring-blue-500 sm:text-sm transition duration-150" placeholder="Ketik untuk mencari Barang atau Supplier..." value="{{ request('search') }}">
                        </div>
                    </div>

                    {{-- Kontainer untuk tabel dan pagination yang akan di-update oleh AJAX --}}
                    <div id="transaksi-data-container">
                        @include('transaksis.transaksi_table')
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let searchInput = document.getElementById('search-input');
            let timer;

            searchInput.addEventListener('keyup', function () {
                clearTimeout(timer);
                timer = setTimeout(performSearch, 300); // Tunggu 300ms setelah user berhenti mengetik
            });

            function performSearch() {
                let searchValue = searchInput.value;
                let url = `{{ route('transaksis.index') }}?search=${searchValue}`;

                fetch(url, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.text())
                .then(html => {
                    document.getElementById('transaksi-data-container').innerHTML = html;
                })
                .catch(error => console.error('Error fetching search results:', error));
            }

            // Menangani klik pada link pagination via AJAX
            document.addEventListener('click', function(event) {
                // Cek apakah yang diklik adalah link di dalam area pagination
                if (event.target.matches('#transaksi-data-container .pagination a')) {
                    event.preventDefault(); // Mencegah reload halaman
                    let url = event.target.href;

                    fetch(url, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(response => response.text())
                    .then(html => {
                        document.getElementById('transaksi-data-container').innerHTML = html;
                    })
                    .catch(error => console.error('Error fetching pagination results:', error));
                }
            });
        });
    </script>
    @endpush
</x-app-layout>

