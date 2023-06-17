<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use function Symfony\Component\String\u;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('roles')->withCount('getProduct')->get();




        return view('backend.pages.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function userCreate()
    {
        return view('backend.pages.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function userStore(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $file_name = $request->name;

            $image_url = kullaniciYukle($image, $file_name);

        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'image' => $image_url ?? '',
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => $request->status
        ]);


        return redirect(route('user.index'))->with('success','Kullanıcı başarıyla oluşturdunuz!');
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
    public function userEdit(string $id)
    {
        $user = User::with('getProduct')->where('id',$id)->first();

        return view('backend.pages.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function userUpdate(Request $request, string $id)
    {
        $user = User::where('id',$id)->first();

        $file_name = $request->name;


        if ($request->hasFile('image'))
        {
            if (file_exists($request->file('image')) && $request->file() != null) {
                if ($user->image != null){
                    dosyaSil(public_path('img/users/') . $user->image);
            }
                $image = $request->file('image');

                $image_url =  kullaniciYukle($image,$file_name);
            }



            $user->update([
                'image' => $image_url ?? '',
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'status' => $request->status,
            ]);
        }
        else
        {
            $user->update([

                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'status' => $request->status,
                ]);

        }
        return redirect(route('user.index'))->with('success','Kullanıcı başarıyla güncellediniz');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function userDestroy(string $id)
    {
        $user = User::where('id',$id)->first();

        if ($user->image !=null)
        {
            $image_path = public_path('img/users/'.$user->image);
            dosyaSil($image_path);
        }




        $user->delete();
        return back()->withSuccess('Kullanıcı başarıyla silindi!');
    }


    public function updateStatu(Request $request)
    {
        $update = $request->statu;
        $updateText = $update == "true" ? '1' : '0';

        User::where('id',$request->id)->update(['status'=>$updateText]);

        return response(['error'=>false,'status'=>$update]);
    }

    public function userProducts(string $id)
    {
            $user = User::with('getproduct')->where('id',$id)->first();
            return view('backend.pages.user.user_products',compact('user'));
    }
}
