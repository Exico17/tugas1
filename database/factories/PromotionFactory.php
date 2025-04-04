<?php
// filepath: d:\WFD -C\tugas1\database\factories\PromotionFactory.php


namespace Database\Factories;

use App\Models\Promotion;
use Illuminate\Database\Eloquent\Factories\Factory;

class PromotionFactory extends Factory
{
    protected $model = Promotion::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'image' => null, // Atur jika ingin menggunakan gambar
        ];
    }
}