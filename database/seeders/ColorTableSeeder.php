<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Color;

class ColorTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    Color::insert([
      [
        'color' => '#FF0000',
        'name' => 'Rojo',
        'feature' => 'Apoyo',
      ],
      [
        'color' => '#00FF00',
        'name' => 'Verde',
        'feature' => 'Estilo',
      ],
      [
        'color' => '#0000FF',
        'name' => 'Azul',
        'feature' => 'Puerta',
      ],
    ]);
  }
}
