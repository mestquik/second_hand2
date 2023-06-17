<?php

namespace Database\Seeders;

use App\Models\Category;
use Cviebrock\EloquentSluggable\Sluggable;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $erkek= Category::create([
            'image' => 'men.jpg',
            'thumbnail'=>null,
            'cat_ust'=>null,
            'name'=>'Erkek',
            'content'=>'Erkek Giyim',
            'status'=>'1'

        ]);
        Category::create([
            'image' => null,
            'thumbnail'=>null,
            'cat_ust'=>$erkek->id,
            'name'=>'Erkek ust',
            'content'=>'Erkek üst giyim',
            'status'=>'1'

        ]);
        Category::create([
            'image' => null,
            'thumbnail'=>null,
            'cat_ust'=>$erkek->id,
            'name'=>'Erkek alt',
            'content'=>'Erkek alt giyim',
            'status'=>'1'

        ]);
        Category::create([
            'image' => null,
            'thumbnail'=>null,
            'cat_ust'=>$erkek->id,
            'name'=>'Erkek Çorap',
            'content'=>'Erkek Çorapları',
            'status'=>'1'

        ]);


        $kadin  =  Category::create([
            'image' => 'women.jpg',
            'thumbnail'=>null,
            'cat_ust'=>null,
            'name'=>'Kadın',
            'content'=>'Kadın Giyim',
            'status'=>'1'

        ]);
        Category::create([
            'image' => null,
            'thumbnail'=>null,
            'cat_ust'=>$kadin->id,
            'name'=>'Kadın ust',
            'content'=>'Kadın üst Giyim',
            'status'=>'1'

        ]);
        Category::create([
            'image' => null,
            'thumbnail'=>null,
            'cat_ust'=>$kadin->id,
            'name'=>'Kadın alt',
            'content'=>'Kadın alt Giyim',
            'status'=>'1'

        ]);
        Category::create([
            'image' => null,
            'thumbnail'=>null,
            'cat_ust'=>$kadin->id,
            'name'=>'Kadın Çorap',
            'content'=>'Kadın Çorapları',
            'status'=>'1'

        ]);



        $cocuk=  Category::create([
            'image' => 'children.jpg',
            'thumbnail'=>null,
            'cat_ust'=>null,
            'name'=>'Çocuk',
            'content'=>'Çocuk Giyim',
            'status'=>'1'

        ]);
        Category::create([
            'image' => null,
            'thumbnail'=>null,
            'cat_ust'=>$cocuk->id,
            'name'=>'Çocuk ust',
            'content'=>'Çocuk Üst Giyim',
            'status'=>'1'

        ]);
        Category::create([
            'image' => null,
            'thumbnail'=>null,
            'cat_ust'=>$cocuk->id,
            'name'=>'Çocuk Alt',
            'content'=>'Çocuk Alt Giyim',
            'status'=>'1'

        ]);


        $unisex=  Category::create([
            'image' => 'unisex.jpg',
            'thumbnail'=>null,
            'cat_ust'=>null,
            'name'=>'unisex',
            'content'=>'Unisex Giyim',
            'status'=>'1'

        ]);
        Category::create([
            'image' => null,
            'thumbnail'=>null,
            'cat_ust'=>$unisex->id,
            'name'=>'Unisex Üst',
            'content'=>'Çocuk Üst Giyim',
            'status'=>'1'

        ]);
        Category::create([
            'image' => null,
            'thumbnail'=>null,
            'cat_ust'=>$unisex->id,
            'name'=>'Unisex Alt',
            'content'=>'Unisex Alt Giyim',
            'status'=>'1'

        ]);


        $elektronik=  Category::create([
            'image' => 'electronic.jpg',
            'thumbnail'=>null,
            'cat_ust'=>null,
            'name'=>'Elektronik',
            'content'=>'Elektronik Eşyalar',
            'status'=>'1'

        ]);
        Category::create([
            'image' => null,
            'thumbnail'=>null,
            'cat_ust'=>$elektronik->id,
            'name'=>'Telefonlar',
            'content'=>'2.El Telefonlar',
            'status'=>'1'

        ]);
        Category::create([
            'image' => null,
            'thumbnail'=>null,
            'cat_ust'=>$elektronik->id,
            'name'=>'Laptoplar',
            'content'=>'Dizüstü Laptoplar',
            'status'=>'1'
        ]);



    }
}
