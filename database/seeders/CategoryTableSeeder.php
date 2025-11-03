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
          'color' => '#FF0000',
          'image' => 'cat-coc-lav.png',
          'banner' => '1_product_category_banner_banner_cocina.jpg',
          'status' => 1,
          'created_at' => now(),
          'updated_at' => now(),
        ],
        [
          'name' => 'Living',
          'slug' => 'living',
          'feature' => null,
          'color' => '#00FF00',
          'image' => 'cat-liv.png',
          'banner' => 'banner-cat.jpg',
          'status' => 1,
          'created_at' => now(),
          'updated_at' => now(),
        ],
        [
          'name' => 'Dormitorio',
          'slug' => 'dormitorio',
          'feature' => null,
          'color' => '#0000FF',
          'image' => 'cat-dorm.png',
          'banner' => 'banner-cat.jpg',
          'status' => 1,
          'created_at' => now(),
          'updated_at' => now(),
        ],
        [
          'name' => 'Novedades',
          'slug' => 'novedades',
          'feature' => null,
          'color' => '#996633',
          'image' => 'cat-noved.png',
          'banner' => 'banner-cat.jpg',
          'status' => 1,
          'created_at' => now(),
          'updated_at' => now(),
        ],
        [
          'name' => 'Tiradores y Manijas',
          'slug' => 'tiradores-y-manijas',
          'feature' => null,
          'color' => '#339999',
          'image' => 'cat-01.jpg',
          'banner' => 'banner-cat.jpg',
          'status' => 1,
          'created_at' => now(),
          'updated_at' => now(),
        ],
        [
          'name' => 'Bisagras',
          'slug' => 'bisagras',
          'feature' => null,
          'color' => '#663399',
          'image' => 'cat-02.jpg',
          'banner' => 'banner-cat.jpg',
          'status' => 1,
          'created_at' => now(),
          'updated_at' => now(),
        ],
        [
          'name' => 'Canasteria',
          'slug' => 'canasteria',
          'feature' => null,
          'color' => '#339966',
          'image' => 'cat-03.jpg',
          'banner' => 'banner-cat.jpg',
          'status' => 1,
          'created_at' => now(),
          'updated_at' => now(),
        ],
        [
          'name' => 'Soportes y Unión',
          'slug' => 'soportes-y-union',
          'feature' => null,
          'color' => '#993380',
          'image' => 'cat-04.jpg',
          'banner' => 'banner-cat.jpg',
          'status' => 1,
          'created_at' => now(),
          'updated_at' => now(),
        ],
      ]
    );

    // Relacionar las categorías con las subcategorías - Relación entre padres e hijas
    $cocina = Category::findORFail(1);
    $living = Category::findORFail(2);
    $dormitorio = Category::findORFail(3);
    $novedades = Category::findORFail(4);
    $tiradores = Category::findORFail(5);
    $bisagras = Category::findORFail(6);
    $canasteria = Category::findORFail(7);
    $soportes = Category::findORFail(8);

    // Le asignamos las subcategorías a la categoría Cocina y Lavadero
    $cocina->children()->attach([$tiradores->id, $bisagras->id, $canasteria->id, $soportes->id]);
  }
}
