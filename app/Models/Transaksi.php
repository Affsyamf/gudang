<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class Transaksi extends Model
{
    use HasFactory;

   protected $fillable = [
        'barang_id',
        'supplier_id',
        'jumlah',
        'jenis', // misalnya: 'masuk' atau 'keluar'
        'tanggal_transaksi',
    ];

     public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

     public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
