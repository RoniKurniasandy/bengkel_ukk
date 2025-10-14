<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    protected $table = 'kendaraan';
    protected $primaryKey = 'kendaraan_id';
    protected $fillable = ['user_id', 'merk', 'model', 'no_plat', 'tahun'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'kendaraan_id');
    }
}
