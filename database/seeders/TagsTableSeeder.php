<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = collect(['Blogging', 'Reading', 'Website', 'Basic', 'Network', 'Skill']);
        $tags->each(function ($c) {
            \App\Models\Tag::create([
                'name'  => $c,
                'slug'  => \Str::slug($c),
            ]);
        });
    }
}
