<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    // relasi ke tabel post
    // karena 1 kategori memiliki banyak post,
    // maka nama function post bersifat plural menjadi POSTS
    public function posts()
    {
        // gunakan hasMany untuk banyak posts
        return $this->hasMany(Post::class);
    }
}
