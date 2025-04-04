<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Promotion;

class PromotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat data promosi menggunakan factory
        Promotion::factory()->count(5)->create();

        // Tambahkan data promosi secara manual
        Promotion::create([
            'title' => 'Diskon 50% untuk Sepatu',
            'description' => 'Dapatkan diskon 50% untuk semua sepatu original hanya hari ini!',
            'image' => null,
        ]);

        Promotion::create([
            'title' => 'Promo Buy 1 Get 1 Free',
            'description' => 'Beli 1 dapat 1 gratis untuk semua produk fashion.',
            'image' => null,
        ]);
    }
}
