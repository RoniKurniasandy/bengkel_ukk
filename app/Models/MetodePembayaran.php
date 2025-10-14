<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MetodePembayaran extends Model
{
    protected $table = 'metode_pembayaran';
    protected $primaryKey = 'metode_id';
    protected $fillable = ['nama_metode','deskripsi'];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'metode_id');
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'metode_id');
    }
}
