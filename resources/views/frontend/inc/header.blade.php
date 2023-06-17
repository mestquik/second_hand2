</head>
<header class="site-navbar" role="banner">
    <div class="site-navbar-top">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
                </div>


                <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
                    <div class="site-logo">
                        <a href="{{route('homepage')}}" class="js-logo-clone">{{config('app.name')}}</a>
                    </div>
                </div>

                <div class="col-6 col-md-4 order-3 order-md-3 text-right">
                    <div class="site-top-icons">
                        <ul>
                                @guest()
                            <li><a href="{{route('login')}}"><span class="icon icon-person"></span> Giriş Yap</a></li>

                                <li><a href="{{route('register_post')}}"><span class="icon icon-registered"></span> Kayıt Ol!</a></li>
                            @endguest
                            <li>
                                @auth()
                                <a href="{{route('panel')}}" class="mdi-logout">
                                    <span class="icon-accessibility">Yönetim Paneli</span>
                                </a>
                                <a href="{{route('logout')}}" class="mdi-logout">
                                    <span class="icon-sign-out">Çıkış Yap</span>
                                </a>

                            </li>
                            @endauth

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <nav class="site-navigation text-right text-md-center" role="navigation">
        <div class="container">
            <ul class="site-menu js-clone-nav d-none d-md-block">
                <li class="has-children active">

                <li><a href="{{route('homepage')}}">Anasayfa</a></li>

                </li>
                <li class="has-children">
                    <a href="{{route('categories')}}">Kategoriler</a>
                    <ul class="dropdown">

                        @if(!empty($categoriess) && $categoriess->count()>0)
                            @foreach($categoriess as $category)
                                @if($category->cat_ust == null)
                                    <li class="has-children">
                                        <a href="{{route('products', $category->slug)}}">{{$category->name}}</a>
                                        <ul class="dropdown">
                                            @foreach($categoriess as $SubCategory)
                                                @if($SubCategory->cat_ust == $category->id)
                                                    <li><a href="{{route('products',$SubCategory->slug) }}">{{$SubCategory->name}}</a></li>
                                                @endif

                                            @endforeach

                                        </ul>

                                    </li>
                                @endif

                            @endforeach
                        @endif

                    </ul>

                </li>
                <li><a href="{{route('products')}}">Ürünler</a></li>

                <li><a href="{{route('about')}}">Hakkımızda</a></li>

                <li><a href="{{route('contact')}}">İletişim</a></li>
            </ul>
        </div>
    </nav>
</header>
