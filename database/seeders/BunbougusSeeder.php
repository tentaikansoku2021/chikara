<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bunbougu;

class BunbougusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      Bunbougu::factory()->count(20)->create(); 
    }
}