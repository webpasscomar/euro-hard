<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Color;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        $this->call([
            UserTableSeeder::class,
            ColorTableSeeder::class,
           
        ]);
    }
}
