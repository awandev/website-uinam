<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Band extends Model
{
    use HasFactory;

    // band mempunyai banyak album
    public function albums()
    {
        return $this->hasMany(Album::class);
    }


    // band punya banyak genre
    public function genres()
    {
        return $this->hasMany(Genre::class);
    }
}
