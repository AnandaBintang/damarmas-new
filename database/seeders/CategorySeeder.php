<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Lighting',
                'slug' => 'lighting',
                'description' => 'Damarmas menyediakan berbagai macam produk lighting yang dapat
                                menyesuaikan kebutuhan dan preferensi anda.',
                'category' => 'Produk',
                'cover_path' => null
            ],
            [
                'name' => 'Advertising',
                'slug' => 'advertising',
                'description' => 'Damarmas menyediakan berbagai macam produk advertising yang dapat
                                menyesuaikan kebutuhan dan preferensi anda.',
                'category' => 'Layanan',
                'cover_path' => null
            ],
            [
                'name' => 'Running Text',
                'slug' => 'running-text',
                'description' => 'Damarmas menyediakan berbagai macam produk running text yang dapat
                                menyesuaikan kebutuhan dan preferensi anda.',
                'category' => 'Produk',
                'cover_path' => null
            ],
            [
                'name' => 'Videotron',
                'slug' => 'videotron',
                'description' => 'Damarmas menyediakan berbagai macam produk videotron yang dapat
                                menyesuaikan kebutuhan dan preferensi anda.',
                'category' => 'Produk',
                'cover_path' => null
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
