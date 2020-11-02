<?php

namespace App\Console\Commands;

use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Console\Command;

class RefreshDatabaseCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'refresh:database';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command is usefull to refresh all database and seed the default data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->call('migrate:refresh');

        $categories = collect(['Framework', 'Website', 'Development']);
        $categories->each(function ($c) {
            \App\Models\Category::create([
                'name'  => $c,
                'slug'  => \Str::slug($c),
            ]);
        });

        $tags = collect(['Basic', 'Fundamental', 'OOP', 'Operating System', 'Design']);
        $tags->each(function ($c) {
            \App\Models\Tag::create([
                'name'  => $c,
                'slug'  => \Str::slug($c),
            ]);
        });

        $this->info('Sudah melakukan refresh database dan seed default data categories and tags');
    }
}
