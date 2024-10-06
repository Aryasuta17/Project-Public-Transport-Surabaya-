<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Baca isi file SQL
        $sql = File::get(database_path('seeders/data.sql'));

        // Jalankan query SQL
        DB::unprepared($sql);
    }
}