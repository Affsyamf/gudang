<x-app-layout>
    <div class="py-12 bg-slate-100 dark:bg-slate-800">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                <!-- Card Total Barang -->
                <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-xl p-6 flex items-center justify-between">
                    <div>
                        <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Barang</span>
                        <p class="text-3xl font-bold text-slate-800 dark:text-slate-100">{{ $totalBarang }}</p>
                    </div>
                    <div class="bg-blue-100 dark:bg-blue-900/50 text-blue-600 dark:text-blue-300 rounded-full p-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0 0L4 11m8 4v10M4 7v10l8 4" /></svg>
                    </div>
                </div>
                <!-- Card Total Supplier -->
                <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-xl p-6 flex items-center justify-between">
                    <div>
                        <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Supplier</span>
                        <p class="text-3xl font-bold text-slate-800 dark:text-slate-100">{{ $totalSupplier }}</p>
                    </div>
                     <div class="bg-green-100 dark:bg-green-900/50 text-green-600 dark:text-green-300 rounded-full p-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M15 21v-1a6 6 0 00-1-3.72a4 4 0 00-3-3.26C8.89 12.02 7.5 10.635 7.5 9c0-1.38 1.12-2.5 2.5-2.5S12.5 7.62 12.5 9" /></svg>
                    </div>
                </div>
                <!-- Card Barang Masuk -->
                <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-xl p-6 flex items-center justify-between">
                    <div>
                        <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Barang Masuk (Bulan Ini)</span>
                        <p class="text-3xl font-bold text-slate-800 dark:text-slate-100">{{ $barangMasukBulanIni }}</p>
                    </div>
                     <div class="bg-yellow-100 dark:bg-yellow-900/50 text-yellow-600 dark:text-yellow-300 rounded-full p-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" /></svg>
                    </div>
                </div>
                <!-- Card Barang Keluar -->
                <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-xl p-6 flex items-center justify-between">
                    <div>
                        <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Barang Keluar (Bulan Ini)</span>
                        <p class="text-3xl font-bold text-slate-800 dark:text-slate-100">{{ $barangKeluarBulanIni }}</p>
                    </div>
                     <div class="bg-red-100 dark:bg-red-900/50 text-red-600 dark:text-red-300 rounded-full p-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16l4-4m0 0l-4-4m4 4H3m5 4v1a3 3 0 003 3h6a3 3 0 003-3V7a3 3 0 00-3-3H9a3 3 0 00-3 3v1" /></svg>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-xl overflow-hidden">
                <div class="p-6">
                    <h2 class="text-xl font-bold text-slate-800 dark:text-slate-100">Grafik Transaksi 30 Hari Terakhir</h2>
                    <div id="chart" class="mt-4"></div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const chartData = JSON.parse('{!! $chartData !!}');
            const isDarkMode = document.documentElement.classList.contains('dark');

            var options = {
                series: chartData.series,
                chart: {
                    height: 350,
                    type: 'area', // Menggunakan tipe area untuk visualisasi yang lebih baik
                    zoom: {
                        enabled: false
                    },
                    toolbar: {
                      show: true,
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth',
                    width: 2
                },
                colors: ['#22c55e', '#ef4444'], // Hijau untuk masuk, Merah untuk keluar
                xaxis: {
                    categories: chartData.categories,
                    labels: {
                        style: {
                            colors: isDarkMode ? '#9ca3af' : '#6b7280'
                        }
                    }
                },
                yaxis: {
                    title: {
                        text: 'Jumlah Transaksi',
                        style: {
                            color: isDarkMode ? '#9ca3af' : '#6b7280'
                        }
                    },
                    labels: {
                        style: {
                            colors: isDarkMode ? '#9ca3af' : '#6b7280'
                        }
                    }
                },
                legend: {
                    position: 'top',
                    horizontalAlign: 'right',
                    labels: {
                        colors: isDarkMode ? '#9ca3af' : '#6b7280'
                    }
                },
                tooltip: {
                    theme: isDarkMode ? 'dark' : 'light',
                },
                grid: {
                    borderColor: isDarkMode ? '#374151' : '#e5e7eb'
                }
            };

            var chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();
            
            // Perbarui tema chart saat dark mode di-toggle
            const themeToggleBtn = document.getElementById('theme-toggle');
            if (themeToggleBtn) {
                themeToggleBtn.addEventListener('click', () => {
                    setTimeout(() => {
                        const isDarkModeNow = document.documentElement.classList.contains('dark');
                        chart.updateOptions({
                             xaxis: { labels: { style: { colors: isDarkModeNow ? '#9ca3af' : '#6b7280' } } },
                             yaxis: {
                                title: { style: { color: isDarkModeNow ? '#9ca3af' : '#6b7280' } },
                                labels: { style: { colors: isDarkModeNow ? '#9ca3af' : '#6b7280' } }
                            },
                             legend: { labels: { colors: isDarkModeNow ? '#9ca3af' : '#6b7280' } },
                             tooltip: { theme: isDarkModeNow ? 'dark' : 'light' },
                             grid: { borderColor: isDarkModeNow ? '#374151' : '#e5e7eb' }
                        })
                    }, 200);
                });
            }
        });
    </script>
    @endpush
</x-app-layout>

