<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Slider::create([
            'image'=>'deneme1.webp',
            'name'=>'Slider1 Test',
            'content'=>'İçerik denemesi',
            'link'=>'urunler',
            'status'=>'0',

        ]);
        Slider::create([
            'image'=>'slider.jpg',
            'name'=>'Slider2 Test',
            'content'=>'İçerik denemesi',
            'link'=>'urunler',
            'status'=>'1',

        ]);
        Slider::create([
            'image'=>'bulunamadi.jpg',
            'name'=>'Slider3 Test',
            'content'=>'İçerik denemesi',
            'link'=>'urunler',
            'status'=>'1',

        ]);
        Slider::create([
            'image'=>'deneme2.webp',
            'name'=>'Slider4 Test',
            'content'=>'İçerik denemesi',
            'link'=>'urunler',
            'status'=>'1',

        ]);

    }
}
