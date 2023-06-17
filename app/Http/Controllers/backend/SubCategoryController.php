<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{


    public function subcategoryIndex()
    {

        $subcategories = Category::where('cat_ust', '!=', null)->withCount('product')->get();

        $parent = Category::with('parent')->get();


        return view('backend.pages.category.subcategory_index', compact('subcategories', 'parent'));
    }

    public function subcategoryCreate()
    {
        $categories = Category::where('cat_ust', '=', null)->get();
        return view('backend.pages.category.subcategory_create', compact('categories'));

    }

    public function subcategoryStore(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $file_name = $request->name;

            $image_url = kategoriYukle($image, $file_name);
        }

        Category::create([
            'image' => $image_url ?? null,
            'name' => $request->name,
            'content' => $request->contentt,
            'cat_ust' => $request->cat_ust ?? 1,
            'status' => $request->status,
        ]);
        return redirect(route('subcategory.index'))->with('success', 'AltKategori Başarıyla Oluşturuldu');
    }

    public function subcategoryEdit(string $id)
    {
        $category = Category::where('id', $id)->with('parent')->first();
        $categories = Category::where('cat_ust', '=', null)->get();


        return view('backend.pages.category.subcategory_edit', compact('category', 'categories'));
    }

    public function subcategoryUpdate(Request $request, string $id)
    {
        $category = Category::where('id',$id)->first();
        $file_name = $request->name;

        if ($request->hasFile('image') && $request->file() != null)
        {
            if ($category->image!=null)
            {
                dosyaSil(public_path('img/subcategories/').$category->image);

            }
            $image = $request->file('image');

            $image_url =  altKategoriYukle($image,$file_name);

            $category->update([
                'image'=>$image_url ?? null,
                'name'=>$request->name,
                'content'=>$request->contentt,
                'status'=>$request->status,
            ]);
        }
        else
        {
            $category->update([

                'name'=>$request->name,
                'content'=>$request->contentt,
                'status'=>$request->status]);
        }

        return redirect(route('subcategory.index'))->with('success','Kategori Başarıyla Güncellendi');
        }

}
