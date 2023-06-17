<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function saveContact(Request $request){

        $validate_data =$request->validate([
            'name'=>'required|min:3|string',
            'email'=>'email|required',
            'subject'=>'required|min:2|string',
            'message'=>'required|min:3|string',

        ],
        [
            'name.required'=>'İsim Soyisim alanı boş geçilemez',
            'email.email'=>'Geçersiz email adresi girdiniz',
            'email.required'=>'Email alanı boş geçilemez',
            'subject.required'=>'Konu alanı boş geçilemez',
            'message.required'=>'Mesaj alanı boş geçilemez',
            'subject.min'=>'Konu alanı en az 2 karakter olmalıdır!',
            'message.min'=>'Mesajınız en az 3 karakter olmalıdır!',
        ]);

        $data = $request->all();
        $data['ip'] = request()->ip();
        Contact::create($data);
        return back()->with(['success'=>'Mesajınız gönderildi!  Bize ulaştığınız için teşekkür ederiz :)'],$validate_data);

    }
}
