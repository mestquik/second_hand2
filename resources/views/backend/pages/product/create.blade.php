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
                <h4 class="card-title">Yeni Ürün Oluşturma</h4>

                <form class="forms-sample" action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Ürün Resmi</label>
                        <input accept=".jpg, .png" type="file" name="image" class="file-upload-default">
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="Resim Yükleyiniz">
                            <span class="input-group-append">
                  <button class="file-upload-browse btn btn-primary" type="button">Resmi Yükle</button>
                </span>
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="status">Boyut</label>
                            <select  name="size" class="form-control" id="size">
                                @foreach($sizes as $size)

                                    <option value="{{$size}}">{{$size}} </option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="">Kategoriler</label>
                                <select  id="Category" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}} </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="">Altkategoriler</label>
                            <select name="Subcategory" id="Subcategory" class="form-control">
                                @foreach($subcategories as $sub)
                                    <option value="{{$sub->id}}">{{$sub->name}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="status">Renk</label>
                        <select  name="color" class="form-control" id="color">

                            @foreach($colors as $color)
                                <option value="{{$color}}">{{$color}} </option>
                            @endforeach

                        </select>
                    </div>








                    <div class="form-group">
                        <label for="name">İsmi</label>
                        <input type="text" class="form-control" id="name" name="product_name" placeholder="Ürün Başlık">
                    </div>

                    <div class="form-group">
                        <label for="contentt">Açıklaması</label>
                        <textarea type="text" class="form-control" id="contentt" name="product_desc" placeholder="Açıklama"></textarea>
                    </div>


                    <div class="form-row">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="inputCity">Fiyat</label>
                                <input type="text" class="form-control" id="product_price" name="product_price">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="inputZip">Adet</label>
                                <input type="text" class="form-control" id="product_quantity" name="product_quantity">
                            </div>
                        </div>


                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Güncelle</button>
                    <button  class="btn btn-light"><a href="{{route('product.index')}}">İptal</a></button>
                </form>


            </div>
        </div>
    </div>
@endsection




@section('customjs')
        <script>
         $('#Category').on('change',function (e) {

             var cat_id = e.target.value;
             $('#Subcategory').html('');
             $.get('listele?cat_id='+ cat_id ,function (data)
             {
                 $('#Subcategory').empty()
                 $.each(data, function (key, value) {

                     $('#Subcategory').append('<option value="' + value
                         .id + '">' + value.name + '</option>');
                 });
             })
         })

    </script>

@endsection

