<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';
    protected $primaryKey = 'pembayaran_id';
    protected $fillable = ['transaksi_id','metode_id','jumlah_bayar','tanggal_bayar','keterangan'];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'transaksi_id');
    }

    public function metode()
    {
        return $this->belongsTo(MetodePembayaran::class, 'metode_id');
    }
}
