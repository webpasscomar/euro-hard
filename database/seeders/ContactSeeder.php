<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    Contact::insert([
      'address' => 'Av. H. Yrigoyen 15750 (1852) Burzaco, Buenos Aires, Argentina',
      'phone' => '(5411) 4002-4400 | 2206-4000',
      'email' => 'info@euro-hard.com.ar',
      'whatsapp' => '5491122064000',
      'facebook' => 'https://www.facebook.com/eurohardherrajes/',
      'instagram' => 'https://www.instagram.com/eurohard.herrajes/?hl=es',
      'youtube' => 'https://www.youtube.com/channel/UCLR2grBIKggsXgv6rMDc29w',
      'map' => '',
      'status' => 1,
      'created_at' => now(),
      'updated_at' => now()
    ]);
  }
}
