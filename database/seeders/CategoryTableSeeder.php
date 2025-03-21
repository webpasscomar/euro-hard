<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {

    Category::insert(
      [
        [
          'name' => 'Cocina y Lavadero',
          'slug' => 'cocina-y-lavadero',
          'feature' => null,
          'color' => '#FFFFFF',
          'image' => 'cat-coc-lav.png',
          'banner' => '1_product_category_banner_banner_cocina.jpg',
          'categoryParent_id' => null,
          'status' => 1,
          'created_at' => now(),
          'updated_at' => now(),
        ],
        [
          'name' => 'Living',
          'slug' => 'living',
          'feature' => null,
          'color' => '#FFFFFF',
          'image' => 'cat-liv.png',
          'banner' => 'banner-cat.jpg',
          'categoryParent_id' => null,
          'status' => 1,
          'created_at' => now(),
          'updated_at' => now(),
        ],
        [
          'name' => 'Dormitorio',
          'slug' => 'dormitorio',
          'feature' => null,
          'color' => '#FFFFFF',
          'image' => 'cat-dorm.png',
          'banner' => 'banner-cat.jpg',
          'categoryParent_id' => null,
          'status' => 1,
          'created_at' => now(),
          'updated_at' => now(),
        ],
        [
          'name' => 'Novedades',
          'slug' => 'novedades',
          'feature' => null,
          'color' => '#FFFFFF',
          'image' => 'cat-noved.png',
          'banner' => 'banner-cat.jpg',
          'categoryParent_id' => null,
          'status' => 1,
          'created_at' => now(),
          'updated_at' => now(),
        ],
        [
          'name' => 'Tiradores y Manijas',
          'slug' => 'tiradores-y-manijas',
          'feature' => null,
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
          'slug' => 'bisagras',
          'feature' => null,
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
          'slug' => 'canasteria',
          'feature' => null,
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
          'slug' => 'soportes-y-union',
          'feature' => null,
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
