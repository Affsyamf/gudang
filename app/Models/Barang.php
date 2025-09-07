<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'deskripsi',
        'satuan',
    ];

    /**
     * Mendefinisikan relasi ke model Transaksi.
     * Sebuah barang bisa memiliki banyak transaksi.
     */
    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }

    /**
     * Accessor untuk menghitung stok tersedia secara dinamis.
     * Ini akan bisa diakses seperti kolom biasa: $barang->stok_tersedia
     */
    public function getStokTersediaAttribute(): int
    {
        $totalMasuk = $this->transaksis()->where('jenis', 'masuk')->sum('jumlah');
        $totalKeluar = $this->transaksis()->where('jenis', 'keluar')->sum('jumlah');

        return $totalMasuk - $totalKeluar;
    }
}
