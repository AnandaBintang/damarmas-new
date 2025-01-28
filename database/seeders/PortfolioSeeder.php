<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Portfolio;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $portfolios = [
            [
                'title' => 'Exhibition Archipelago Hotel Aston Banyuwangi',
                'description' => 'Damarmas mengerjakan pemasangan untuk Exhibition Archipelago Hotel Aston Banyuwangi',
                'path' => null,
            ],
            [
                'title' => 'Instalasi Fix Videotron Jasamarga',
                'description' => 'Damarmas mengerjakan pemasangan untuk Instalasi Fix Videotron Jasamarga',
                'path' => null,
            ],
            [
                'title' => 'Instalasi Letter Papaya Fresh Gallery',
                'description' => 'Damarmas mengerjakan pemasangan untuk Instalasi Letter Papaya Fresh Gallery',
                'path' => null,
            ],
            [
                'title' => 'Maintenance Panel Deepsea',
                'description' => 'Damarmas mengerjakan pemasangan untuk Maintenance Panel Deepsea',
                'path' => null,
            ],
            [
                'title' => 'Maintenance TV Wall Polrestabes Surabaya',
                'description' => 'Damarmas mengerjakan pemasangan untuk Maintenance TV Wall Polrestabes Surabaya',
                'path' => null,
            ],
            [
                'title' => 'Pengadaan Alins Alongins Pusdikkav TA 2024',
                'description' => 'Damarmas mengerjakan pemasangan untuk Pengadaan Alins Alongins Pusdikkav TA 2024',
                'path' => null,
            ]
        ];

        foreach ($portfolios as $portfolio) {
            Portfolio::create($portfolio);
        }
    }
}
