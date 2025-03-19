<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinceTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table("provinces")->insert([
      [
        "name" => "buenos aires",
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        "name" => "ciudad autonoma de buenos aires",
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        "name" => "catamarca",
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        "name" => "chaco",
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        "name" => "chubut",
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        "name" => "cordoba",
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        "name" => "corrientes",
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        "name" => "entre ríos",
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        "name" => "formosa",
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        "name" => "jujuy",
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        "name" => "la pampa",
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        "name" => "la rioja",
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        "name" => "mendoza",
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        "name" => "misiones",
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        "name" => "neuquen",
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        "name" => "rio negro",
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        "name" => "salta",
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        "name" => "san juan",
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        "name" => "san luis",
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        "name" => "santa cruz",
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        "name" => "santa fe",
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        "name" => "santiago del estero",
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        "name" => "tierra del fuego",
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        "name" => "tucuman",
        'created_at' => now(),
        'updated_at' => now(),
      ],
    ]);
  }
}
