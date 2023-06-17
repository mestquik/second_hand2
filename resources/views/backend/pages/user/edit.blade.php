@extends('backend.layout.app')
@section('content')

    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"> Kullanıcı Düzenleme</h4>

                <form class="forms-sample" action="{{route('user.update',$user->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label>Kullanıcı Resmi</label>
                        <input type="file" name="image" class="file-upload-default">
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="{{asset('img/users/'.$user->image) ?? 'Resim Yükleyiniz'}}">
                            <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Resmi Yükle</button>
                        </span>
                        </div>

                        <img src="{{asset('img/users/'.$user->image ?? '')}}">
                    </div>

                    <div class="form-group">
                        <input placeholder="İsim" type="text" class="form-control" id="name" name="name"
                               value="{{$user->name}}" required autofocus>
                    </div>

                    <div class="form-group">
                        <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                        <input placeholder="Email" id="email" class="form-control" type="email" name="email"
                               value="{{$user->email}}" required/>
                    </div>

                    <div class="form-group">
                        <input id="password" class="form-control" type="password"
                               placeholder="Şifre" name="password" value="{{$user->password}}"
                               required autocomplete="new-password"/>
                        <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                    </div>

                    <div class="form-group">
                        <input id="password_confirmation" class="form-control"
                               placeholder="Şifreyi Doğrula" type="password"
                               name="password_confirmation" required/>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
                    </div>


                    <div class="form-group">
                        <label for="status">Durumu</label>
                        <select  name="status" class="form-control" id="status">

                            <option @if($user->status == 1) selected="{{$user->status}} @endif" value="1">Aktif </option>
                            <option @if($user->status == 0) selected=" {{$user->status}} @endif" value="0">Pasif </option>

                        </select>
                    </div>


                    <button type="submit" class="btn btn-primary mr-2">Güncelle</button>

                    <button  class="btn btn-light"><a href="{{route('user.index')}}">İptal</a></button>
                </form>
            </div>
        </div>
    </div>
@endsection
