@extends('frontend.layout.layout')
@section('title')
    Giriş Yap
@endsection
@section('login_register')

    <hr width="100%" color="#0000F8" size="100">

    <div  style="margin-left: 300px" class="col-md-7 ">
        <h2 class="text-lg-center h3 mb-3 text-black">Üyelik Formu</h2>

        <form  action="{{route('register')}}" method="post">
            @csrf
            <div style="text-align: center" class="p-3 p-lg-5 border">
                <div  style="margin-left: 33%" class="form-group row">
                    <div  class="col-md-6">
                        <input placeholder="İsim" type="text" class="form-control" id="name" name="name"
                               :value="old('name')" required autofocus>
                        <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                    </div>
                </div>

                <div  class="form-group row">
                    <div style="margin-left: 25%" class="col-md-6">
                        <input placeholder="Email" id="email" class="form-control" type="email" name="email"
                               :value="old('email')" required/>
                        <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                    </div>
                </div>

                <div class="form-group row">
                    <div style="margin-left: 25%" class="col-md-6">

                        <input id="password" class="form-control" type="password"
                               placeholder="Şifre" name="password"
                               required autocomplete="new-password"/>
                        <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                    </div>
                </div>

                <div class="form-group row">
                    <div style="margin-left: 25%" class="col-md-6">
                        <input id="password_confirmation" class="form-control"
                               placeholder="Şifreyi Doğrula" type="password"
                               name="password_confirmation" required/>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
                    </div>
                </div>

                <div class="mt-4">
                    <a
                       href="{{ route('login') }}">
                        Zaten Üye misiniz?
                    </a>
                    <hr>

                    <input type="submit" class="btn btn-success" value="Üye Ol!">
                </div>

            </div>
        </form>
    </div>

@endsection
