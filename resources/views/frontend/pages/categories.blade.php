
@extends('frontend.layout.layout')
@section('title') Kategoriler @endsection
@section('content')


    <div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="{{route('homepage')}}">Anasayfa</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Kategoriler</strong></div>
        </div>
    </div>
</div>

    <div class="site-section block-3 site-blocks-2 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 site-section-heading text-center pt-4">
                    <h2>Kategoriler</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <div class="nonloop-block-3 owl-carousel">
                        @foreach($categoriess as $category)
                            @if($category->cat_ust==null)
                                <div class="item">
                                    <div  class="block-4 text-center">
                                        <figure style="background-color: #fc5286" class="block-4-image">
                                            <a style="color: white" href="{{route('products',$category->slug)}}">{{$category->name}}</a>

                                            <img src="{{asset('img/categories').'/'.$category->image}}" alt="Image placeholder" class="img-fluid">
                                        </figure>
                                        <div class="block-4-text p-4">
                                            <h3><a href="{{route('products',$category->slug)}}">{{$category->name}}</a></h3>


                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
