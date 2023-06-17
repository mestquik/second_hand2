<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Nette\Utils\Image;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'category_id'=>'2',
            'user_id'=>'1',
            'review_id'=>'1',
            'product_image'=>'mavi-eskimis-tshirttt.webp',
            'product_name' =>'Mavi Eskimiş Tshirt',
            'product_desc'=>'Mavi Eskimiş Tshirt açıklaması',
            'product_short_text'=>'Mavi Eskimiş Tshirt kısa açıklama',
            'product_price'=>10,
            'product_quantity'=>1,
            'size'=>'Small',
            'color'=>'Mavi',
            'status'=>'1',
        ]);
        Product::create([
            'category_id'=>'3',
            'user_id'=>'1',
            'product_image'=>'beyaz-eskimis-tshirt.webp',
            'product_name' =>'Beyaz Eskimiş Tshirt',
            'product_desc'=>'Beyaz Eskimiş Tshirt açıklaması',
            'product_short_text'=>'Beyaz Eskimiş Tshirt kısa açıklama',
            'product_price'=>100,
            'product_quantity'=>1,
            'size'=>'Medium',
            'color'=>'Beyaz',
            'status'=>'1'
        ]);
        Product::create([
            'category_id'=>'6',
            'user_id'=>'1',
            'product_image'=>'kirmizi-eskimis-tshirt.webp',
            'product_name' =>'Kırmızı Eskimiş Tshirt',
            'product_desc'=>'Kırmızı Eskimiş Tshirt açıklaması',
            'product_short_text'=>'Kırmızı Eskimiş Tshirt kısa açıklama',
            'product_price'=>200,
            'product_quantity'=>1,
            'size'=>'Large',
            'color'=>'Kırmızı',
            'status'=>'1'
        ]);
        Product::create([
            'category_id'=>'2',
            'user_id'=>'1',
            'product_image'=>'mor_tshirt.jpg',
            'product_name' =>'Mor  Unisex T-shirt',
            'product_desc'=>'Mor  Unisex T-shirt açıklaması',
            'product_short_text'=>'Mor  Unisex T-shirt kısa açıklama',
            'product_price'=>10,
            'product_quantity'=>1,
            'size'=>'Small',
            'color'=>'Mor',
            'status'=>'1',
        ]);
        Product::create([
            'category_id'=>'2',
            'user_id'=>'2',
            'product_image'=>'siyah_tshirt.jpg',
            'product_name' =>'Siyah Unisex T-shirt',
            'product_desc'=>'Siyah Unisex T-shirt açıklaması',
            'product_short_text'=>'Siyah Unisex T-shirt kısa açıklama',
            'product_price'=>100,
            'product_quantity'=>1,
            'size'=>'Oversize',
            'color'=>'Siyah',
            'status'=>'1'
        ]);
        Product::create([
            'category_id'=>'6',
            'user_id'=>'2',
            'product_image'=>'gri_tshirt.jpg',
            'product_name' =>'Gri Unisex T-shirt',
            'product_desc'=>'Gri Unisex T-shirt açıklaması',
            'product_short_text'=>'Gri Unisex T-shirt kısa açıklama',
            'product_price'=>200,
            'product_quantity'=>1,
            'size'=>'Large',
            'color'=>'Gri',
            'status'=>'1'
        ]);
        Product::create([
            'category_id'=>'3',
            'user_id'=>'2',
            'product_image'=>'mavi-eskimis-tshirttt.webp',
            'product_name' =>'Mavi T-shirt',
            'product_desc'=>'Mavi T-shirt açıklaması',
            'product_short_text'=>'Mavi T-shirt kısa açıklama',
            'product_price'=>10,
            'product_quantity'=>1,
            'size'=>'Small',
            'color'=>'Mavi',
            'status'=>'1',
        ]);
        Product::create([
            'category_id'=>'6',
            'user_id'=>'2',
            'product_image'=>'siyah_alt_kadin.jpg',
            'product_name' =>'Siyah Kont Pantolon Kadın',
            'product_desc'=>'Siyah Kont Pantolon Kadın açıklaması',
            'product_short_text'=>'Siyah Kont Pantolon Kadın kısa açıklama',
            'product_price'=>100,
            'product_quantity'=>1,
            'size'=>'Medium',
            'color'=>'Siyah',
            'status'=>'1'
        ]);
        Product::create([
            'category_id'=>'3',
            'review_id'=>'2',
            'user_id'=>'2',
            'product_image'=>'mavi_alt_erkek.jpg',
            'product_name' =>'Mavi Kot Pantolon Erkek',
            'product_desc'=>'Mavi Kot Pantolon Erkek açıklaması',
            'product_short_text'=>'Mavi Kot Pantolon Erkek kısa açıklama',
            'product_price'=>200,
            'product_quantity'=>1,
            'size'=>'Large',
            'color'=>'Mavi',
            'status'=>'1'
        ]);
        Product::create([
            'category_id'=>'3',
            'review_id'=>'2',
            'user_id'=>'2',
            'product_image'=>'mavi_alt_erkek.jpg',
            'product_name' =>'Mavi Kot Pant',
            'product_desc'=>'Mavi Kot Pantolon Erkek açıklaması',
            'product_short_text'=>'Mavi Kot Pantolon Erkek kısa açıklama',
            'product_price'=>200,
            'product_quantity'=>1,
            'size'=>'Large',
            'color'=>'Mavi',
            'status'=>'1'
        ]);Product::create([
        'category_id'=>'3',
        'review_id'=>'2',
        'user_id'=>'2',
        'product_image'=>'mavi_alt_erkek.jpg',
        'product_name' =>'Mavi Kot pant erkek',
        'product_desc'=>'Mavi Kot Pantolon Erkek açıklaması',
        'product_short_text'=>'Mavi Kot Pantolon Erkek kısa açıklama',
        'product_price'=>200,
        'product_quantity'=>1,
        'size'=>'Large',
        'color'=>'Mavi',
        'status'=>'1'
    ]);Product::create([
        'category_id'=>'3',
        'review_id'=>'2',
        'user_id'=>'2',
        'product_image'=>'mavi_alt_erkek.jpg',
        'product_name' =>'Mavi Kot pantolon erkek deneme',
        'product_desc'=>'Mavi Kot Pantolon Erkek açıklaması',
        'product_short_text'=>'Mavi Kot Pantolon Erkek kısa açıklama',
        'product_price'=>200,
        'product_quantity'=>1,
        'size'=>'Large',
        'color'=>'Mavi',
        'status'=>'1'
    ]);Product::create([
        'category_id'=>'3',
        'review_id'=>'2',
        'user_id'=>'2',
        'product_image'=>'mavi_alt_erkek.jpg',
        'product_name' =>'Mavi Kot Pantolon Erkek Deneme',
        'product_desc'=>'Mavi Kot Pantolon Erkek açıklaması',
        'product_short_text'=>'Mavi Kot Pantolon Erkek kısa açıklama',
        'product_price'=>200,
        'product_quantity'=>1,
        'size'=>'Large',
        'color'=>'Mavi',
        'status'=>'1'
    ]);

    }
}
