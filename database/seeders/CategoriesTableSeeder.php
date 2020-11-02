<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = collect(['Framework', 'Website', 'Development']);
        $categories->each(function ($c) {
            \App\Models\Category::create([
                'name'  => $c,
                'slug'  => \Str::slug($c),
            ]);
        });
    }
}
