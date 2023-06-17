@extends('frontend.layout.layout')
@section('title')
    Ürünler
@endsection
@section('content')

    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="{{route('homepage')}}">Anasayfa</a> <span
                        class="mx-2 mb-0">/</span> <strong
                        class="text-black">Ürünler</strong></div>
            </div>
        </div>
    </div>
    <div class="float-right">
        <form method="get" action="" class="site-block-top-search">
            <span class="icon icon-search2"></span>
            <input type="text" class="form-control border-0" name="search" placeholder="Ürün Ara">
        </form>
    </div>


    <div class="site-section">
        <div class="container">

            <div class="row mb-3">
                <div class="col-md-9 order-2">

                    {{--Filter right--}}

                    <div class="row">
                        <div class="col-md-12 mb-5">
                            <div class="float-md-left mb-4"><h2 class="text-black h5">Shop All</h2></div>
                            <div class="d-flex">
                                <div class="dropdown mr-1 ml-md-auto">
                                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle"
                                            id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                        Kategoriler
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                                        @if(!empty($categories) && $categories->count()>0)
                                            @foreach($categories as $category)
                                                @if($category->cat_ust == null)

                                                    <a href="{{route('products',$category->slug)}}"
                                                       class="dropdown-item"> {{Str::ucfirst($category->name)}}

                                                        <br>
                                                    </a>
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle"
                                            id="dropdownMenuReference" data-toggle="dropdown">Filtrele
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                                        <a class="dropdown-item" href="#" data-sira="max_price">Fiyata
                                            göre(Önce en
                                            yüksek)</a>
                                        <a class="dropdown-item" href="#" data-sira="min_price">Fiyata göre(Önce en
                                            düşük)</a>

                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#" data-sira="last_post">Tarihe göre(Önce en
                                            eski)</a>
                                        <a class="dropdown-item" href="#" data-sira="recent_post">Tarihe göre(Önce en
                                            yeni)</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--Filter Right End--}}





                    {{--Products list--}}


                    <div class="row mb-5">


                        @foreach($products as $product)


                                    <div style="height: 30%;width: 30%" class="col-sm-3 col-lg-3 col-mb-4"
                                         data-aos="fade-up">
                                        <div class="block-4 text-center border">
                                            <figure style="background-color: #fc5286" class="block-4-image">
                                                <a style="color: white" href="">{{$product->category->name}}</a>
                                                <a href="{{route('product-detail',[$product->id,$product->slug])}}">
                                                    <img style=""
                                                         src="{{asset('img/products').'/'.$product->product_image}}"
                                                         alt="{{$product->product_short_text}}" class="img-fluid"></a>
                                            </figure>
                                            <div class="block-4-text p-4">
                                                <h3>
                                                    <a href="{{route('products',$product->slug)}}">{{$product->product_name}}</a>
                                                </h3>
                                                <p class="mb-0">{{\Illuminate\Support\Str::limit($product->product_desc,20,'...')}}</p>
                                                <p class="text-primary font-weight-bold">{{$product->product_price}}
                                                    ₺ </p>
                                            </div>
                                        </div>
                                    </div>




                        @endforeach

                    </div>
                    {{--Products list end--}}





                    {{--pagination--}}
                    <div style="position: relative" class="row" data-aos="fade-up">

                        <div style="left: 40%;" class="col-md-12 text-center">

                            <div class=" site-blocks-2">
                                {{$products->withQueryString()->links('pagination::bootstrap-4')}}

                            </div>
                        </div>
                    </div>
                </div>
                {{--end-pagination--}}


                <div class="col-md-3 order-1 mb-5 mb-md-0">

                    {{--Left Categories--}}

                    <div class="border p-4 rounded mb-4">
                        <h3 class="mb-3 h4 text-uppercase text-black d-block">Kategoriler</h3>
                        <ul class="list-unstyled mb-0">

                            @if(!empty($categories) && $categories->count()>0)
                                @foreach($categories as $category)
                                    @if($category->cat_ust == null)
                                        <h4 class="mb-3 h6 text-uppercase text-black d-block">{{$category->name}}
                                            ({{$data[$category->id]}})
                                        </h4>

                                    @endif
                                    <ul class="dropdown">
                                        @if($category->cat_ust == !null)

                                            <li><a href="{{route('products',$category->slug)}}">{{$category->name}}
                                                </a>({{$category->product_count}})
                                            </li>

                                        @endif
                                    </ul>

                                @endforeach

                            @endif
                        </ul>
                    </div>

                    {{--Categories End--}}




                    {{--Filtering--}}
                    <div class="border p-4 rounded mb-4">
                        <form action="" method="get">
                            <div class="mb-4">
                                <h3 class="mb-3 h6 text-uppercase text-black d-block text-lg-center">Fiyat Filtrele</h3>
                                <hr>
                                <input style="margin-left: 70px;margin-bottom: 10px" type="submit" value="Filtrele">


                                <div class="input-group">
                                    <input name="price_min" min="0" max="99999" placeholder="MİNİMUM " type="number"
                                           class="form-control"
                                           aria-label="Dollar amount (with dot and two decimal places)">
                                    <div class="input-group-append">
                                        <span class="input-group-text">TL</span>

                                    </div>
                                </div>
                                <div class="input-group">
                                    <input name="price_max" min="0" max="99999" PLACEHOLDER="MAKSİMUM " type="number"
                                           class="form-control"
                                           aria-label="Dollar amount (with dot and two decimal places)">
                                    <div class="input-group-append">
                                        <span class="input-group-text">TL</span>

                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <h3 class="mb-3 h6 text-uppercase text-black d-block">Boyut</h3>

                                @foreach($size_lists as $size_list)
                                    <label for="s_sm" class="d-flex">

                                        <input type="checkbox" name="size[]" value="{{$size_list}}" id="size"
                                               class="mr-2 mt-1"> <span
                                            class="text-black">{{$size_list}} </span> </label>

                                @endforeach
                            </div>

                            <div class="mb-4">
                                <h3 class="mb-3 h6 text-uppercase text-black d-block">RENK</h3>
                                @foreach($color_lists as $color_list)
                                    <a class="d-flex color-item align-items-center">
                                        <input type="checkbox" name="color[]" value="{{$color_list}}" id="s_sm"
                                               class="mr-2 mt-1"> <span
                                            class="text-black">{{$color_list}} </span>
                                    </a>
                                @endforeach

                            </div>
                        </form>
                    </div>
                    {{--End Of Filtering--}}


                </div>

            </div>


            <div class="site-section site-blocks-2">
                <div class="row justify-content-center text-center mb-5">
                    <div class="col-md-7 site-section-heading pt-4">
                        <h2>Kategorilere Göz At!</h2>
                    </div>
                </div>
                <div class="row">
                    @foreach($random_categories as $category)
                        <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="200">
                            <a class="block-2-item" href="{{route('products',[$category->slug,$category->id])}}">
                                <figure class="image">
                                    <img src="{{asset('img/category/').'/'.$category->image}}" alt="" class="img-fluid">
                                </figure>
                                <div class="text">
                                    <span class="text-uppercase">Kategori</span>
                                    <h3>{{$category->name}}</h3>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>


        <script>
            $(function () {
                alert('test');
            })</script>

@endsection
