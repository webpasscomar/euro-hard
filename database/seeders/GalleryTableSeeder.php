<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Gallery;

class GalleryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gallery::insert([
            [
            'title' => 'Lanzamiento',
            'order' => 1,
            'image' => '1_gallery_slider-home-1.jpg',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'title' => 'Cocina',
            'order' => 2,
            'image' => '2_gallery_slider-home-2.jpg',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'title' => 'Novedades',
            'order' => 3,
            'image' => '3_gallery_slider-home-3.jpg',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'title' => 'Living',
            'order' => 4,
            'image' => '4_gallery_slider-home-4.jpg',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'title' => 'Cajonera',
            'order' => 5,
            'image' => '5_gallery_slider-home-5.jpg',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        ]
    );
    }
}
