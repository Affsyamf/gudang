<x-app-layout>
    <div class="py-12 bg-slate-100 dark:bg-slate-800">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                
                {{-- Card Total Barang --}}
                <div class="bg-white dark:bg-slate-900 shadow-lg rounded-2xl p-6 flex items-center justify-between">
                    <div>
                        <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Barang</span>
                        <p class="text-3xl font-bold text-slate-800 dark:text-slate-100">{{ $jumlahBarang }}</p>
                    </div>
                    <div class="bg-blue-100 dark:bg-blue-900/50 rounded-full p-3">
                        <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0 0L4 11m8 4v10M4 7v10l8 4" />
                        </svg>
                    </div>
                </div>

                {{-- Card Total Supplier --}}
                <div class="bg-white dark:bg-slate-900 shadow-lg rounded-2xl p-6 flex items-center justify-between">
                    <div>
                        <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Supplier</span>
                        <p class="text-3xl font-bold text-slate-800 dark:text-slate-100">{{ $jumlahSupplier }}</p>
                    </div>
                    <div class="bg-green-100 dark:bg-green-900/50 rounded-full p-3">
                        <svg class="w-6 h-6 text-green-600 dark:text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M15 21v-1a6 6 0 00-1-3.72a4 4 0 00-3-3.26C8.89 12.02 7.5 10.635 7.5 9c0-1.38 1.12-2.5 2.5-2.5S12.5 7.62 12.5 9" />
                        </svg>
                    </div>
                </div>

                {{-- Placeholder untuk card lain --}}
                <div class="bg-white dark:bg-slate-900 shadow-lg rounded-2xl p-6 flex items-center justify-between">
                    <div>
                        <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Barang Masuk (Bulan Ini)</span>
                        <p class="text-3xl font-bold text-slate-800 dark:text-slate-100">0</p>
                    </div>
                    <div class="bg-yellow-100 dark:bg-yellow-900/50 rounded-full p-3">
                         <svg class="w-6 h-6 text-yellow-600 dark:text-yellow-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 8.25H7.5a2.25 2.25 0 00-2.25 2.25v9a2.25 2.25 0 002.25 2.25h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25H15M9 12l3 3m0 0l3-3m-3 3V2.25" /></svg>
                    </div>
                </div>
                 <div class="bg-white dark:bg-slate-900 shadow-lg rounded-2xl p-6 flex items-center justify-between">
                    <div>
                        <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Barang Keluar (Bulan Ini)</span>
                        <p class="text-3xl font-bold text-slate-800 dark:text-slate-100">0</p>
                    </div>
                    <div class="bg-red-100 dark:bg-red-900/50 rounded-full p-3">
                        <svg class="w-6 h-6 text-red-600 dark:text-red-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15 11.25l-3-3m0 0l-3 3m3-3v7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    </div>
                </div>

            </div>

            {{-- Area Grafik --}}
            <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-xl overflow-hidden mt-6">
                <div class="p-6">
                    <h2 class="text-xl font-bold text-slate-800 dark:text-slate-100">Grafik Stok Barang</h2>
                    <div id="chart"></div>
                </div>
            </div>

        </div>
    </div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var options = {
          series: [{
          name: 'Jumlah Stok',
          data: [31, 40, 28, 51, 42, 109, 100]
        }],
          chart: {
          height: 350,
          type: 'area',
          foreColor: '#6b7280' // Warna teks abu-abu
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'smooth'
        },
        xaxis: {
          type: 'datetime',
          categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
        },
        tooltip: {
          x: {
            format: 'dd/MM/yy HH:mm'
          },
          theme: 'dark' // Selalu gunakan tooltip tema gelap agar kontras
        },
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();

        // Menyesuaikan tema grafik saat dark mode berubah
        const observer = new MutationObserver((mutations) => {
            mutations.forEach((mutation) => {
                if (mutation.attributeName === "class") {
                    const isDarkMode = document.documentElement.classList.contains('dark');
                    chart.updateOptions({
                        chart: {
                            foreColor: isDarkMode ? '#cbd5e1' : '#6b7280' // Teks slate-300 vs gray-500
                        },
                        tooltip: {
                            theme: 'dark'
                        }
                    });
                }
            });
        });

        observer.observe(document.documentElement, {
            attributes: true
        });

    });
</script>
</x-app-layout>

