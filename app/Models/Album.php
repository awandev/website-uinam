<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    // album hanya dipunyai 1 band
    public function band()
    {
        return $this->belongsTo(Band::class);
    }

    // album punya banyak lyric
    public function lyrics()
    {
        return $this->hasMany(Lyric::class);
    }
}
