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
        'tanggal',
        'jenis_transaksi', // misalnya: 'masuk' atau 'keluar'
    ];
}
