<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    // genre dapat dimiliki oleh banyak band
    public function bands()
    {
        return $this->belongsToMany(Band::class);
        // contoh : kalau tabel yang digunakan bukan bands, tapi bands_table, maka penulisannya
        // return $this->belongsToMany(Band::class, 'bands_table');
    }
}
