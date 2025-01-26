<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductCategory;

class ProductCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductCategory::insert(
            [
                [
                    'name' => 'Cocina y Lavadero',
                    'color' => '#FFFFFF',
                    'image' => 'cat-coc-lav.png',
                    'banner' => '1_product_category_banner_banner_cocina.jpg',
                    'status' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Living',
                    'color' => '#FFFFFF',
                    'image' => 'cat-liv.png',
                    'banner' => 'banner-cat.jpg',
                    'status' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Dormitorio',
                    'color' => '#FFFFFF',
                    'image' => 'cat-dorm.png',
                    'banner' => 'banner-cat.jpg',
                    'status' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Novedades',
                    'color' => '#FFFFFF',
                    'image' => 'cat-noved.png',
                    'banner' => 'banner-cat.jpg',
                    'status' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                ]
            );
        ProductCategory::insert(
            [            
                [
                    'name' => 'Tiradores y Manijas',
                    'color' => '#666666',
                    'image' => 'cat-01.jpg',
                    'banner' => 'banner-cat.jpg',
                    'status' => 1,
                    'categoryParent_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Bisagras',
                    'color' => '#444444',
                    'image' => 'cat-02.jpg',
                    'banner' => 'banner-cat.jpg',
                    'status' => 1,
                    'categoryParent_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Canasteria',
                    'color' => '#444444',
                    'image' => 'cat-03.jpg',
                    'banner' => 'banner-cat.jpg',
                    'status' => 1,
                    'categoryParent_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Soportes y Unión',
                    'color' => '#777777',
                    'image' => 'cat-04.jpg',
                    'banner' => 'banner-cat.jpg',
                    'status' => 1,
                    'categoryParent_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]
        );
    }
}
