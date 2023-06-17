@extends('backend.layout.app')
@section('content')

    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif


    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <button class="btn btn-primary mr-2"><a style="color: whitesmoke" href="{{route('product.index')}}">Listeye Dön</a></button>



            <div class="card-body">
                <h4 class="card-title">Yeni Alt Kategori Oluşturma</h4>

                <form class="forms-sample" action="{{route('subcategory.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>AltKategori Resmi</label>
                        <input accept=".jpg, .png" type="file" name="image" class="file-upload-default">
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="Resim Yükleyiniz">
                            <span class="input-group-append">
                  <button class="file-upload-browse btn btn-primary" type="button">Resmi Yükle</button>
                </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name">Hangi kategoriye ait</label>
                        <select  name="cat_ust" class="form-control" id="cat_ust">
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}} </option>
                            @endforeach

                        </select>

                    </div>

                    <div class="form-group">
                        <label for="name">İsmi</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Kategori Başlık">
                    </div>

                    <div class="form-group">
                        <label for="contentt">Açıklaması</label>
                        <textarea type="text" class="form-control" id="contentt" name="contentt" placeholder="Açıklama"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="status">Durumu</label>
                        <select  name="status" class="form-control" id="status">
                            <option value="1">Aktif </option>
                            <option value="0">Pasif </option>
                        </select>
                    </div>


                    <button type="submit" class="btn btn-primary mr-2">Güncelle</button>
                    <button  class="btn btn-light"><a href="{{route('subcategory.index')}}">İptal</a></button>
                </form>


            </div>
        </div>
    </div>
@endsection


