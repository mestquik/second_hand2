<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Review::create([

            'product_id'=>'1',
            'user_id'=>'1',
            'comment'=>'YORUM1',
            'star_rating'=>3,

        ]);
        Review::create([
            'product_id'=>'2',
            'user_id'=>'2',
            'comment'=>'YORUM2',
            'star_rating'=>5,

        ]);
    }
}
