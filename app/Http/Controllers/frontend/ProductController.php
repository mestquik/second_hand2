<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use function Symfony\Component\String\s;

class ProductController extends Controller
{




    public function Products(Request $request, $slug = null, $id = null)

    {

        $size = $request->input('size') ?? null;



        $search = $request->search ?? null;

        $color = $request->input('color') ?? null;

        $price_min = $request->price_min ?? null;

        $price_max = $request->price_max ?? null;

        $search = $request->search ?? null;


        //SIRALAMA
        $order = $request->order ?? 'id';
        $sort = $request->sort ?? 'desc';

        $cat  = Category::where('cat_ust',null)->where('slug',$slug)->first();
        $subcat  = Category::where('cat_ust','!=',null)->where('slug',$slug)->first();

        $cat_id = $cat->id ?? null;
        $subcat_id = $subcat->id ?? null;

        $cat= $cat->slug ?? null;
        $subcat= $subcat->slug ?? null;






        //ANAKATEGORİYE AİT Mİ KONTROL ET
        if ($slug == $cat) {

            $products = Product::with('category')->whereHas('category', function ($q) use
            ($cat_id)
            {
                $q->where('cat_ust',$cat_id);
            });

        }
        //ALTKATEGORİYE AİT Mİ KONTROL ET

        if ($slug == $subcat)
        {
            //KATEGORİLERE AİT ÜRÜNLERİ LİSTELE
            $products = Product::with('category.child')
                ->whereHas('category',function ($q) use ($slug)
                {
                    $q->whereSlug($slug);

                });
        }

        //SLUG BOŞ MU KONTROL ET
         if($slug == null)
        {

            //ÜRÜNLERİ LİSTELE
            $products = Product::where('status', '1')->with('category:id,name,slug,cat_ust');

        }

        //BÖYLE BİR KATEGORİ VAR MI KONTROL ET
       if(!$cat && !$subcat && $slug != null)
       {
           abort(403,'BÖYLE BİR KATEGORİ BULUNAMADI');
       }

      $products =  $products->when(function ($query) use ($size, $color, $price_min, $price_max, $search) {


            if (isset($color) && !empty($color)) {
                $query->whereIn('color',$color);
            }
          if (isset($size) && !empty($size)) {
               $query->whereIn('size', $size);
          }
            if (isset($price_min) && !empty($price_min)) {
                $query->where('product_price', '>=', $price_min);
            }

            if (isset($price_max) && !empty($price_max)) {
                $query->where('product_price', '<=', $price_max);
            }

            if (isset($search)) {
                $query->where('product_name', 'LIKE', "%$search%");
            }
            return $query;

        })->orderBy($order, $sort)->paginate(8);



        //KATEGORİLERE AİT ÜRÜNLERE TOPLA

        $categories_count = Category::withCount('product')->get();
        $data = array();

        foreach ($categories_count as $category) {
            $result = array();
            foreach ($category->child as $key => $sub) {
                array_push($result, $sub->product->toArray());
            }
            $product = call_user_func_array('array_merge', $result);

            $data[$category->id] = count($product);

        }
        //


        // KATEGORİ
        $categories = Category::with('child')->withCount('product')->get();

        //KARIŞIK KATEGORİLER
        $random_categories = Category::select('id', 'name', 'image', 'slug')->where('cat_ust', null)->inRandomOrder()->limit(3)->get();


        //renklere göre filtre
        $color_lists = Product::where('status', '1')->groupBy('color')->pluck('color')->toArray();

        //boyuta göre filtre
        $size_lists = Product::where('status', '1')->groupBy('size')->pluck('size')->toArray();



        return view('frontend.pages.product.products',
            compact( 'categories','products','size_lists', 'color_lists','random_categories', 'data'));
    }








    public function productDetail(Request $request)
    {
        $product = Product::where('id', $request->id)->with('review.user')->first();



        return view('frontend.pages.product.productdetail', compact('product'));
    }

}
