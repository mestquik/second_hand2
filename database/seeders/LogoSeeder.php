<?php

namespace Database\Seeders;

use App\Models\Logo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LogoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Logo::create([
            'name' => 'logo1',
            'image' => 'secondhand1.webp',
            'content' => 'açıklama1',
            'status'=>1

        ]);
        Logo::create([
            'name' => 'logo1',
            'image' =>'secondhand2.webp',
            'content' => 'açıklama2',
            'status'=>0
        ]);
    }
}
