<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function categoryIndex()
    {
        $categories = Category::where('cat_ust',null)->withCount('child')->get();

        $cat_count = Category::withCount('product')->get();
        $data = array();

        foreach ($cat_count as $category) {
            $result = array();
            foreach ($category->child as $key => $sub) {
                array_push($result, $sub->product->toArray());
            }
            $product = call_user_func_array('array_merge', $result);

            $data[$category->id] = count($product);

        }

        return view('backend.pages.category.index',compact('categories','data'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function categoryCreate()
    {
        return view('backend.pages.category.create');

    }



    /**
     * Store a newly created resource in storage.
     */
    public function categoryStore(Request $request)
    {
        if ($request->hasFile('image'))
        {
            $image = $request->file('image');

            $file_name = $request->name;

            $image_url =  kategoriYukle($image,$file_name);
        }

        Category::create([
            'image'=>$image_url ?? null,
            'name'=>$request->name,
            'content'=>$request->contentt,
            'cat_ust'=>null,
            'status'=>$request->status,
        ]);
        return redirect(route('category.index'))->with('success','Kategori Başarıyla Oluşturuldu');
    }




    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function categoryEdit(string $id)
    {
        $category = Category::where('id',$id)->with('child')->first();

        return view('backend.pages.category.edit',compact('category'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function categoryUpdate(Request $request, string $id)
    {
        $category = Category::where('id',$id)->first();
        $file_name = $request->name;

        if ($request->hasFile('image') && $request->file() != null )
        {
            if ($category->image!=null)
            {
                dosyaSil(public_path('img/categories/').$category->image);

            }
            $image = $request->file('image');

            $image_url =  kategoriYukle($image,$file_name);

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

        return redirect(route('category.index'))->with('success','Kategori Başarıyla Güncellendi');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::where('id',$id)->FirstOrFail();
        $image_path = public_path('img/category/'.$category->image);


        dosyaSil($image_path);
        $category->delete();
        return back()->withSuccess('Kategori başarıyla silindi!');
    }


    public function updateStatu(Request $request)
    {
        $update = $request->statu;
        $updateText = $update == "true" ? '1' : '0';

        Category::where('id',$request->id)->update(['status'=>$updateText]);

        return response(['error'=>false,'status'=>$update]);


    }
}
