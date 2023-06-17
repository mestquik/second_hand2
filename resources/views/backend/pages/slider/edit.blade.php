@extends('backend.layout.app')
@section('content')

    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif


    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <button class="btn btn-primary mr-2"><a style="color: whitesmoke" href="{{route('slider.index')}}">Listeye Dön</a></button>



            <div class="card-body">
                <h4 class="card-title">Yeni Slider Oluşturma</h4>

                <form class="forms-sample" action="{{route('slider.update',$slider->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Slider Resmi</label>
                        <input accept=".jpg, .png" type="file" name="image" class="file-upload-default">
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="{{$slider->image ?? 'Resim Yükleyiniz'}}">
                            <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Resmi Yükle</button>
                        </span>



                        </div>
                        <img src="{{asset('img/sliders/'.$slider->image ?? '')}}" alt="{{$slider->content}}">

                    </div>



                    <div class="form-group">
                        <label for="name">İsmi</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$slider->name}}" placeholder="Slider Başlık">
                    </div>

                    <div class="form-group">
                        <label for="contentt">Açıklaması</label>
                        <textarea type="text" class="form-control" id="contentt" name="contentt" placeholder="Açıklama">{{$slider->content ?? ''}}"</textarea>
                    </div>

                    <div class="form-group">
                        <label for="content">Link</label>
                        <textarea type="text" class="form-control" id="link" name="link" placeholder="Link">{{$slider->link ?? ''}}</textarea>
                    </div>



                    <div class="form-group">
                        <label for="status">Durumu</label>
                        <select  name="status" class="form-control" id="status">

                            <option @if($slider->status == 1) selected="{{$slider->status}} @endif" value="1">Aktif </option>
                            <option @if($slider->status == 0) selected=" {{$slider->status}} @endif" value="0">Pasif </option>

                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Güncelle</button>
                    <button  class="btn btn-light"><a href="{{route('slider.index')}}">Geri Dön</a></button>
                </form>


            </div>
        </div>
    </div>
@endsection
