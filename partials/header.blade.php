<nav class="top-bar animate-dropdown">
    <div class="container">
        <div class="col-xs-12 col-sm-6 no-margin">
            <ul>
                @foreach(main_menu()->link as $key=>$link)
                <li><a href="{{menu_url($link)}}">{{$link->nama}}</a></li>
                @endforeach
            </ul>
        </div><!-- /.col -->
        <div class="col-xs-12 col-sm-6 no-margin">
            @if ( ! is_login() )
            <ul class="right">
                <li><a href="#">Selamat Berbelanja</a></li>
                <li>{{ HTML::link('member/create', 'Register',array('class'=>'loginRegLout')) }}</li>
                <li>{{ HTML::link('member', 'Login',array('class'=>'loginRegLout')) }}</li>
            </ul>
            @else
            <ul class="right">
                <li><a href="#">Selamat Berbelanja</a></li>
                <li>{{ HTML::link('member', user()->nama,array('class'=>'loginRegLout')) }}</li>
                <li>{{HTML::link('logout', 'Logout',array('class'=>'loginRegLout'))}}</li>
            </ul>
            @endif
        </div><!-- /.col -->
    </div><!-- /.container -->
</nav><!-- /.top-bar -->
<!-- ============================================================= TOP NAVIGATION : END ============================================================= -->
<!-- ============================================================= HEADER ============================================================= -->
<header class="no-padding-bottom header-alt">
    <div class="container no-padding">
        <div class="col-xs-12 col-md-3 logo-holder">
            <!-- ============================================================= LOGO ============================================================= -->
            <div class="logo">
                <a href="{{url('home')}}">{{HTML::image(logo_image_url(), 'Logo', array('width'=>'230'))}}</a>
            </div><!-- /.logo -->
        </div><!-- /.logo-holder -->

        <div class="col-xs-12 col-md-6 top-search-holder no-margin">
            <div class="contact-row">
                @if(!empty($kontak->telepon))
                <div class="phone inline">
                    <i class="fa fa-phone"></i> {{$kontak->telepon}}
                </div>
                @endif
                @if(!empty($kontak->email))
                <div class="contact inline">
                    <i class="fa fa-envelope"></i> <span class="le-color">{{$kontak->email}}</span>
                </div>
                @endif
            </div><!-- /.contact-row -->
            <!-- ============================================================= SEARCH AREA ============================================================= -->
            <div class="search-area">
                <form action="{{url('search')}}" method="post">
                    <div class="control-group">
                        <input class="search-field" placeholder="Cari produk atau barang" name="search" required />
                        <button class="search-button" type="submit" ></button>    
                    </div>
                </form>
            </div><!-- /.search-area -->
        </div><!-- /.top-search-holder -->
        <div class="col-xs-12 col-md-3 top-cart-row no-margin">
            <div class="top-cart-row-container">
                <div class="wishlist-compare-holder">
                    <div class="wishlist ">
                        <!-- <a href="#"><i class="fa fa-heart"></i> wishlist <span class="value">(21)</span> </a> -->
                    </div>
                    <div class="compare">
                        <!-- <a href="#"><i class="fa fa-exchange"></i> compare <span class="value">(2)</span> </a> -->
                    </div>
                </div>
                <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
                {{shopping_cart()}}
            </div><!-- /.top-cart-row-container -->
        </div><!-- /.top-cart-row -->
    </div><!-- /.container -->
    
    <!-- ========================================= NAVIGATION ========================================= -->
    <nav id="top-megamenu-nav" class="megamenu-vertical animate-dropdown">
        <div class="container">
            <div class="yamm navbar">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mc-horizontal-menu-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div><!-- /.navbar-header -->
                <div class="collapse navbar-collapse" id="mc-horizontal-menu-collapse">
                @if(count(list_category()) > 0)
                    <ul class="nav navbar-nav">  
                    @foreach(list_category() as $menu)
                    @if($menu->parent == '0')
                        @if(count($menu->anak) >= 1)
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{$menu->nama}} <span class="caret"></span></a>
                        @else
                        <li>
                            <a href="{{category_url($menu)}}" class="dropdown-toggle">{{$menu->nama}}</a>
                        @endif
                            @if($menu->anak->count() != 0)
                            <ul class="dropdown-menu">
                                @foreach($menu->anak as $submenu)
                                @if($submenu->parent == $menu->id)
                                <li>
                                    @if(count($submenu->anak) == 0)
                                    <a href="{{category_url($submenu)}}">{{$submenu->nama}}</a>
                                    @elseif(count($submenu->anak) >= 1)
                                    <a class="trigger right-caret" role="button" data-toggle="dropdown">{{$submenu->nama}}</a>
                                    <ul class="dropdown-menu sub-menu">
                                    @foreach(list_category() as $key2=>$submenu2)
                                        @if($submenu->id == $submenu2->parent)        
                                        <li><a class="trigger" href="{{ category_url($submenu2) }}">{{ $submenu2->nama }}</a></li>
                                        @endif
                                    @endforeach
                                    </ul>
                                    @endif
                                </li>
                                @endif
                                @endforeach
                            </ul>
                            @endif
                        </li>
                    @endif 
                    @endforeach
                    </ul><!-- /.navbar-nav -->
                @endif
                </div><!-- /.navbar-collapse -->
            </div><!-- /.navbar -->
        </div><!-- /.container -->
    </nav><!-- /.megamenu-vertical -->
    <!-- ========================================= NAVIGATION : END ========================================= -->
</header>