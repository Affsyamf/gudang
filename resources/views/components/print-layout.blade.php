<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Cetak Laporan' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>

        @page {
            size: A4;
            margin: 0;
        }

        /* Sembunyikan elemen yang tidak ingin dicetak */
        @media print {
            .no-print {
                display: none !important;
            }
            body {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
                margin: 4cm; 
            }
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4 sm:p-6 lg:p-8">
        {{ $slot }}
    </div>
</body>
</html>
