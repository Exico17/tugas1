<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\PromotionSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Debug untuk memastikan kelas PromotionSeeder ditemukan
        if (!class_exists(PromotionSeeder::class)) {
            dd('PromotionSeeder tidak ditemukan');
        }

        // Panggil PromotionSeeder
        $this->call(PromotionSeeder::class);
    }
}