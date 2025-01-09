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
            [ 'color' => '#000000'],
            [ 'color' => '#8A9597'],
            [ 'color' => '#F4F4F4'],
        ]);
    }
}
