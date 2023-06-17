@extends('frontend.layout.layout')
@section('title') Ürün Detay @endsection

@section('content')


        <div class="bg-light py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mb-0"><a href="{{route('homepage')}}">Anasayfa</a>
                        <span class="mx-2 mb-0">/</span>
                        <a href="{{route('products')}}">Ürünler</a>
                        <span class="mx-2 mb-0">/</span>
                        <strong>{{$product->product_name}}</strong>

                    </div>
                </div>
            </div>
        </div>

        <div class="site-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{asset('/img/products').'/'.$product->product_image}}" alt="Image" class="img-fluid">
                    </div>
                    <div class="col-md-6">
                        <h2 class="text-black">{{$product->product_name}}</h2>
                        <hr>
                        <p>{{$product->product_short_text}}</p>
                        <hr>
                        <p class="mb-4">{{$product->product_desc}}</p>
                        <hr>
                        <p><strong class="text-primary h4">{{$product->product_price}} TL </strong></p>
                        <hr>



                                <h4 style="color: #2d3748"> Renk = {{$product->color}}</h4>
                        <hr>
                                <h4 style="color: #2d3748">Tahmini Boyutu = {{$product->size}}</h4>


                        <hr>
                        <div class="mb-5">
                            <div class="input-group mb-3" style="max-width: 120px;">
                                <div class="input-group-prepend">


                                </div>

                                <div class="col">


                                    <input style="text-align: center;color: #fc5286" type="text" id="quantity" class="form-control" value="{{$product->product_quantity}}">
                                    <h4 style="color: #0e1014;text-align: center" for="quantity">STOK</h4>
                                </div>



                        </div>

                        </div>
                        <hr>
                        <p><a href="cart.html" class="buy-now btn btn-sm btn-primary">İletişime geç!</a></p>
                        <hr>


                    </div>
                </div>
            </div>
        </div>

        </div>





        <div class="row  d-flex justify-content-center">

            <div class="col-md-8">

                <div class="headings d-flex justify-content-between align-items-center mb-3">
                    <h5>Yorumlar({{$product->review->count()}})</h5>



                </div>


                    @foreach($product->review as $review)
                <div class="card p-4">

                    <div class="d-flex justify-content-between align-items-center">

                        <div class="user d-flex flex-row align-items-center">

                            <img src="{{asset('img/users/'.$review->user->image)}}" width="30" class="user-img rounded-circle mr-2">
                            <span><small class="font-weight-bold text-primary">{{$review->user->name}}</small>
                                <hr>
                                <small class="font-weight-bold">{{$review->comment}}</small></span>

                        </div>


                        <small>{{$review->created_at ?? ''}}</small>
                    </div>

                    <div class="action d-flex justify-content-between mt-2 align-items-center">

                        <div class="reply px-4">
                            <small>Sil</small>
                            <span class="dots"></span>
                            <small>Cevapla</small>
                            <span class="dots"></span>

                        </div>

                        <div class="icons align-items-center">

                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-check-circle-o check-icon"></i>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        </div>

@endsection


    <link rel="stylesheet" href="{{asset('/')}}css/5.0.0-alpha1_dist_css_bootstrap.min.css">
