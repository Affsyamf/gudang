<?php

namespace App\Rules;

use App\Models\Barang;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class StokCukup implements ValidationRule
{
    /**
     * ID barang yang akan divalidasi.
     *
     * @var int
     */
    protected $barangId;

    /**
     * Buat instance rule baru.
     *
     * @param int $barangId
     * @return void
     */
    public function __construct($barangId)
    {
        $this->barangId = $barangId;
    }

    /**
     * Jalankan aturan validasi.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $barang = Barang::find($this->barangId);

        // Jika barang tidak ditemukan, biarkan aturan validasi lain (seperti 'exists') yang menanganinya.
        if (!$barang) {
            return;
        }

        // Hitung stok yang tersedia
        $stokTersedia = $barang->stok();

        // Periksa apakah jumlah yang diminta ($value) lebih besar dari stok yang ada
        if ($value > $stokTersedia) {
            // Jika tidak cukup, kirim pesan error kustom
            $fail("Stok tidak mencukupi. Sisa stok: {$stokTersedia}");
        }
    }
}
