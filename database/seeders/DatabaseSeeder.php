<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // เรียก NewsSeeder ด้วยก็ได้ เวลารัน php artisan db:seed
        $this->call([
            NewsSeeder::class,
        ]);
    }
}
