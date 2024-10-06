<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;

class NewsSeeder extends Seeder
{
    public function run()
    {
        News::create([
            'title' => 'Judul Berita 1',
            'content' => 'Ini adalah isi berita pertama...'
        ]);

        News::create([
            'title' => 'Judul Berita 2',
            'content' => 'Ini adalah isi berita kedua...'
        ]);
    }
}
