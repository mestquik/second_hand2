<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\LogoFormRequest;
use App\Models\Logo;
use Illuminate\Http\Request;

class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $logos = Logo::get();
        return view('backend.pages.logo.index',compact('logos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function logoCreate()
    {
        return view('backend.pages.logo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function logoStore(LogoFormRequest $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $file_name = $request->name;

            $image_url = logoYukle($image, $file_name);

        }
        Logo::create([
            'image' => $image_url ?? '',
            'name' => $request->name,
            'content' => $request->contentt,
            'status' => $request->status
        ]);
        return redirect(route('logo.index'))->with('success','Logoyu başarıyla oluşturdunuz!');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function logoEdit(string $id)
    {
        $logo = Logo::where('id',$id)->first();
        return view('backend.pages.logo.edit',compact('logo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function logoUpdate(Request $request, string $id)
    {
        $logo = Logo::where('id',$id)->first();

        $file_name = $request->name;


        if ($request->hasFile('image'))
        {
            if (file_exists($request->file('image')) && $request->file() != null) {
                if ($logo->image != null){
                    dosyaSil(public_path('img/logos/') . $logo->image);
                }
                $image = $request->file('image');

                $image_url =  logoYukle($image,$file_name);
            }



            $logo->update([
                'image' => $image_url ?? '',
                'name' => $request->name,
                'content' => $request->contentt,
                'status' => $request->status,
            ]);
        }
        else
        {
            $logo->update([

                'name' => $request->name,
                'content' => $request->contentt,
                'status' => $request->status,
            ]);

        }
        return redirect(route('logo.index'))->with('success','Logoyu başarıyla güncellediniz');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function logoDestroy(string $id)
    {
        $logo = Logo::where('id',$id)->first();

        if ($logo->image !=null)
        {
            $image_path = public_path('img/logos/'.$logo->image);
            dosyaSil($image_path);
        }




        $logo->delete();
        return back()->withSuccess('Kullanıcı başarıyla silindi!');
    }


    public function logoUpdateStatu(Request $request)
    {
        $update = $request->statu;
        $updateText = $update == "true" ? '1' : '0';

        Logo::where('id',$request->id)->update(['status'=>$updateText]);

        return response(['error'=>false,'status'=>$update]);
    }
}
