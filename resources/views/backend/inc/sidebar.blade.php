<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{route('panel')}}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Genel Bilgi</span>
            </a>

        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('homepage')}}">
                <i style="padding-right: 15px" class="fas fa-home"></i>
                <span class="menu-title"> İlan sitesine git</span>
            </a>

        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('logo.index')}}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Logo Yönetimi</span>
            </a>

        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Slider Yönetimi</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('slider.index')}}">Sliderlar</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('slider.create')}}">Slider oluştur</a></li>

                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                <i class="icon-bar-graph menu-icon"></i>
                <span class="menu-title">Ürün Yönetimi</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('product.index')}}">Ürünler</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('product.create')}}">Ürün Oluştur</a></li>

                </ul>
            </div>

        </li>


        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                <i class="icon-grid-2 menu-icon"></i>
                <span class="menu-title">Kategori Yönetimi</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('category.index')}}">Kategoriler</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('category.create')}}">Kategori Oluştur</a></li>

                    <li class="nav-item"> <a class="nav-link" href="{{route('subcategory.index')}}">Alt Kategoriler</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('subcategory.create')}}">Alt Kategori Oluştur</a></li>

                </ul>
            </div>
        </li>




        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">Kullanıcı Yönetimi</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('user.index')}}">Kullanıcılar</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('user.create')}}">Kullanıcı Oluştur</a></li>
                </ul>
            </div>
        </li>


        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
                <i class="icon-ban menu-icon"></i>
                <span class="menu-title">Hata Sayfaları</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="error">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="#"> 404 </a></li>
                    <li class="nav-item"> <a class="nav-link" href="#"> 500 </a></li>
                </ul>
            </div>
        </li>


        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Dökümantasyon</span>
            </a>
        </li>
    </ul>
</nav>
