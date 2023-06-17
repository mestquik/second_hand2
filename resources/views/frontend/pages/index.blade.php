@extends('frontend.layout.layout')
@section('content')
    @section('title')
        Anasayfa
    @endsection

    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    @if($sliders == !null)
    <div class="site-blocks-cover" style="background-image:url({{asset('img/sliders').'/'.$sliders->image ?? ''}}" data-aos="fade">
        <div class="container">
            <div class="row align-items-start align-items-md-center justify-content-end" >
                <div class="col-md-5 text-center text-md-left pt-5 pt-md-0">
                    <h1  class="mb-2">{{$sliders->name ?? __('Slider Eklenmemiş')}}</h1>
                    <div class="intro-text text-center text-md-left">
                        <p class="mb-4">{{$sliders->content ?? ''}} </p>
                        <p>
                            <a href="{{route('products')}}" class="btn btn-sm btn-primary">Ürünler</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <div class="site-section site-section-sm site-blocks-1 border-0" data-aos="fade">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
                    <div class="icon mr-4 align-self-start">
                        <span class="icon-truck"></span>
                    </div>
                    <div class="text">
                        <h2 class="text-uppercase">Ücretsiz Kargo</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis quam. Integer
                            accumsan tincidunt fringilla.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon mr-4 align-self-start">
                        <span class="icon-refresh2"></span>
                    </div>
                    <div class="text">
                        <h2 class="text-uppercase">Hızlı iade hakkı</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis quam. Integer
                            accumsan tincidunt fringilla.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon mr-4 align-self-start">
                        <span class="icon-help"></span>
                    </div>
                    <div class="text">
                        <h2 class="text-uppercase">Müşteri destek hattı</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis quam. Integer
                            accumsan tincidunt fringilla.</p>
                    </div>
                </div>
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
                                <div class="block-4 text-center">
                                    <figure style="background-color: #fc5286" class="block-4-image">
                                        <a style="color: white" href="{{route('products',$category->slug)}}">{{$category->name}}</a>

                                        <img src="{{asset('img/categories').'/'.$category->image}}" alt="Image placeholder" class="img-fluid">
                                    </figure>
                                    <div class="block-4-text p-4">
                                        <h3><a href="{{route('products',$category->slug)}}">{{$category->name}}</a></h3>


                                    </div>
                                </div>
                            </div>@endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section block-3 site-blocks-2 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 site-section-heading text-center pt-4">
                    <h2>Yeni Eklenen Ürünler</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <div class="nonloop-block-3 owl-carousel">
                            @foreach($new_products as $product)
                        <div class="item">
                            <div class="block-4 text-center">
                                <figure style="background-color: #fc5286" class="block-4-image">
                                    <a style="color: white" href="{{route('products',$product->category->slug)}}">{{$product->category->name}}</a>

                                    <img src="{{asset('img/products').'/'.$product->product_image}}" alt="Image placeholder" class="img-fluid">
                                </figure>
                                <div class="block-4-text p-4">
                                    <h3><a href="#">{{$product->product_name}}</a></h3>
                                    <p class="mb-0">({{$product->category->name}})</p>
                                    <p class="text-primary font-weight-bold">{{$product->product_price}} TL</p>
                                </div>
                            </div>
                        </div>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="site-section block-8">
        <div class="container">
            <div class="row justify-content-center  mb-5">
                <div class="col-md-7 site-section-heading text-center pt-4">
                    <h2>KAMPANYA!</h2>
                </div>
            </div>
            @foreach($random_product as $product)
            <div class="row align-items-center">
                <div class="col-md-12 col-lg-7 mb-5">
                    <a href="{{route('product-detail',[$product->id,$product->slug])}}"><img src="{{asset('img/products').'/'.$product->product_image}}" alt="Image placeholder" class="img-fluid rounded"></a>
                </div>
                <div class="col-md-12 col-lg-5 text-center pl-md-5">
                    <h1>{{$product->product_name}}</h1>
                    <p class="post-meta mb-4">{{$product->product_desc}}</p>
                    <p>{{$product->product_price}} TL</p>
                    <p><a href="#" class="btn btn-primary btn-sm">SİPARİŞ ET</a></p>
                </div>
            </div>
        </div>
    </div>
    @endforeach


@endsection
