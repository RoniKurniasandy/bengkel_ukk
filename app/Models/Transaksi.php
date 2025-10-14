<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'transaksi_id';
    protected $fillable = ['servis_id','total_biaya','diskon','pajak','dibayar','kembali','invoice_no','status_invoice','metode_id','tanggal_transaksi'];

    public function servis()
    {
        return $this->belongsTo(Servis::class, 'servis_id');
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'transaksi_id');
    }

    public function metode()
    {
        return $this->belongsTo(MetodePembayaran::class, 'metode_id');
    }
}
