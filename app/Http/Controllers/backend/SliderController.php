<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use function Symfony\Component\String\u;


class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::get();
        return view('backend.pages.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('backend.pages.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        if ($request->hasFile('image'))
        {
            $image = $request->file('image');

            $file_name = $request->name;


        }


       $image_url =  sliderYukle($image,$file_name);

       Slider::create([
          'image'=>$image_url,
           'name'=>$request->name,
           'content'=>$request->contentt,
           'link'=>$request->link,
           'status'=>$request->status,
       ]);
        return redirect(route('slider.index'))->with('success','Slider Başarıyla Oluşturuldu');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,string $id)
    {


        $slider = Slider::where('id',$id)->first();

         return view('backend.pages.slider.edit',compact('slider'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $slider = Slider::where('id',$id)->first();
        $file_name = $request->name ;

        if ($request->hasFile('image'))
        {
            dosyaSil($slider->image);
            $image = $request->file('image');

        $image_url =  sliderYukle($image,$file_name);

            Slider::where('id',$id)->update([
                'image'=>$image_url ?? null,
                'name'=>$request->name,
                'content'=>$request->contentt,
                'link'=>$request->link,
                'status'=>$request->status,
            ]);
        }
        else
        {
            Slider::where('id',$id)->update([

                'name'=>$request->name,
                'content'=>$request->contentt,
                'link'=>$request->link,
                'status'=>$request->status]);
        }

        return redirect(route('slider.index'))->with('success','Slider Başarıyla Güncellendi');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $slider = Slider::where('id',$id)->FirstOrFail();
        $image_path = public_path('img/sliders/'.$slider->image);


        dosyaSil($image_path);
        $slider->delete();
        return back()->withSuccess('Slider başarıyla silindi!');

    }

    public function updateStatu(Request $request)
    {
        $update = $request->statu;
        $updateText = $update == "true" ? '1' : '0';

        Slider::where('id',$request->id)->update(['status'=>$updateText]);

         return response(['error'=>false,'status'=>$update]);


    }
}
