<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Image;
use function Psy\sh;
use function Symfony\Component\String\s;
use Illuminate\Pagination\LengthAwarePaginator;

class PageController extends Controller
{
    public function homePage()
    {

        $sliders = Slider::get()->where('status',1)->first();

        $random_categories = Category::select('id','name','image','slug')->where('cat_ust',null)->inRandomOrder()->limit(3)->get();

        $new_products = Product::with('category:id,slug,name')->orderByRaw('id desc')->get();
        $random_product = Product::select('id','product_name','product_image','slug','created_at','product_price','product_desc')->inRandomOrder()->limit(1)->get();



        return view('frontend.pages.index',compact('sliders','random_categories','new_products','random_product',));
    }
    public function header()
    {


        return view('frontend.layout.layout');
    }

    public function about()
    {


        return view('frontend.pages.about');
    }


    public function contact()
    {


        return view('frontend.pages.contact');
    }

    public function cart()
    {

        return view('frontend.pages.cart');
    }
    public function categoriesPage(){


        $category = Category::get();
        return view('frontend.pages.categories',compact('category'));
    }
}










