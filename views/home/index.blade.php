<section id="banner-holder" class="wow fadeInUp">
    <div class="container">
        <div class="row">
        @if(count(horizontal_banner()) == '1')
            @foreach(horizontal_banner() as $banners)
            <div class="col-xs-12 col-lg-12 no-margin banner">
                <a href="{{url($banners->url)}}">
                    {{HTML::image(banner_image_url($banners->gambar),'banner',array('class'=>'banner-image','width'=>'1170'))}}
                </a>
            </div>
            @endforeach
        @else
            @foreach(horizontal_banner() as $banners)
            <div class="col-xs-12 col-lg-6 no-margin banner">
                <a href="{{url($banners->url)}}">
                    {{HTML::image(banner_image_url($banners->gambar),'banner',array('class'=>'banner-image'))}}
                </a>
            </div>
            @endforeach
        @endif
        </div>
    </div><!-- /.container -->
</section>
<div id="products-tab" class="wow fadeInUp">
    <div class="container">
        <div class="tab-holder">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" >
                <li class="active"><a href="#featured" data-toggle="tab">featured</a></li>
                <li><a href="#new-arrivals" data-toggle="tab">Produk Baru</a></li>
                <li><a href="#top-sales" data-toggle="tab">Best Seller</a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="featured">
                    <div class="product-grid-holder">
                        @foreach(home_product(null) as $homeproduk)
                        <div class="col-sm-4 col-md-3  no-margin product-item-holder hover">
                            <div class="product-item">
                                @if(is_outstok($homeproduk))
                                    <div class="ribbon red"><span>Kosong</span></div> 
                                @elseif(is_terlaris($homeproduk))
                                    <div class="ribbon green"><span>Terlaris</span></div>
                                @elseif(is_produkbaru($homeproduk))
                                    <div class="ribbon blue"><span>Baru</span></div>
                                @endif
                                <div class="image">
                                    {{HTML::image(product_image_url($homeproduk->gambar1,'medium'),$homeproduk->nama,array('height'=>'186'))}}
                                </div>
                                <div class="body">
                                    <div class="label-discount green"><!-- -50% sale --></div>
                                    <div class="title">
                                        <a href="{{product_url($homeproduk)}}">{{short_description($homeproduk->nama,39)}}</a>
                                    </div>
                                    <div class="brand"><!-- sony --></div>
                                </div>
                                <div class="prices">
                                    @if(!empty($homeproduk->hargaCoret))
                                    <div class="price-prev">
                                        {{price($homeproduk->hargaCoret)}}
                                    </div>
                                    <div class="price-current pull-right">{{!empty($homeproduk->hargaJual) ? price($homeproduk->hargaJual) : "Call for Price"}}</div>
                                    @else
                                    <div class="price-current text-right">{{!empty($homeproduk->hargaJual) ? price($homeproduk->hargaJual) : "Call for Price"}}</div>
                                    @endif
                                </div>
                                <div class="hover-area">
                                    <div class="add-cart-button">
                                        <a href="{{product_url($homeproduk)}}" class="le-button">Lihat Produk</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="loadmore-holder text-center">
                        <a class="btn-loadmore" href="{{url::to('produk')}}">
                            <i class="fa fa-plus"></i>
                            Lihat Semua Produk
                        </a>
                    </div> 
                </div>
                <div class="tab-pane" id="new-arrivals">
                    <div class="product-grid-holder">
                        @foreach(new_product(null) as $newProduk)
                        <div class="col-sm-4 col-md-3 no-margin product-item-holder hover">
                            <div class="product-item">
                                <div class="image">
                                    {{HTML::image(product_image_url($newProduk->gambar1,'medium'),$newProduk->nama,array('height'=>'186'))}}
                                </div>
                                <div class="body">
                                    <div class="label-discount clear"></div>
                                    <div class="title">
                                        <a href="{{product_url($newProduk)}}">{{short_description($newProduk->nama,39)}}</a>
                                    </div>
                                    <div class="brand"><!-- nokia --></div>
                                </div>
                                <div class="prices">
                                    @if(!empty($newProduk->hargaCoret))
                                    <div class="price-prev">
                                        {{price($newProduk->hargaCoret)}}
                                    </div>
                                    <div class="price-current pull-right">{{!empty($newProduk->hargaJual) ? price($newProduk->hargaJual) : "Call for Price"}}</div>
                                    @else
                                    <div class="price-current text-right">{{!empty($newProduk->hargaJual) ? price($newProduk->hargaJual) : "Call for Price"}}</div>
                                    @endif
                                </div>
                                <div class="hover-area">
                                    <div class="add-cart-button">
                                        <a href="{{product_url($newProduk)}}" class="le-button">Lihat Produk</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <br>
                    <div class="loadmore-holder text-center">
                        <a class="btn-loadmore" href="{{url::to('produk')}}">
                            <i class="fa fa-plus"></i>
                            Lihat Semua Produk
                        </a>
                    </div> 
                </div>
                <div class="tab-pane" id="top-sales">
                    <div class="product-grid-holder">
                        @foreach(best_seller(null) as $bestProduk)
                        <div class="col-sm-4 col-md-3 no-margin product-item-holder hover">
                            <div class="product-item">
                                <div class="image">
                                    {{HTML::image(product_image_url($bestProduk->gambar1,'medium'),$bestProduk->nama,array('height'=>'186'))}}
                                </div>
                                <div class="body">
                                    <div class="label-discount clear"></div>
                                    <div class="title">
                                        <a href="{{product_url($bestProduk)}}">{{short_description($bestProduk->nama,39)}}</a>
                                    </div>
                                    <div class="brand"><!-- acer --></div>
                                </div>
                                <div class="prices">
                                    @if(!empty($bestProduk->hargaCoret))
                                    <div class="price-prev">
                                        {{price($bestProduk->hargaCoret)}}
                                    </div>
                                    <div class="price-current pull-right">{{!empty($bestProduk->hargaJual) ? price($bestProduk->hargaJual) : "Call for Price"}}</div>
                                    @endif
                                    <div class="price-current text-right">{{!empty($bestProduk->hargaJual) ? price($bestProduk->hargaJual) : "Call for Price"}}</div>
                                </div>
                                <div class="hover-area">
                                    <div class="add-cart-button">
                                        <a href="{{product_url($bestProduk)}}" class="le-button">Lihat Produk</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="loadmore-holder text-center">
                        <a class="btn-loadmore" href="{{url::to('produk')}}">
                            <i class="fa fa-plus"></i>
                            Lihat Semua Produk
                        </a>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
<section id="recently-reviewd" class="wow fadeInUp">
    <div class="container">
        <div class="carousel-holder hover">
            <div class="title-nav">
                <div class="title-nav-left">
                    <h2 class="h1">Daftar Produk</h2>
                </div>
                <div class="nav-holder">
                    <a href="#prev" data-target="#owl-recently-viewed" class="slider-prev btn-prev fa fa-angle-left"></a>
                    <a href="#next" data-target="#owl-recently-viewed" class="slider-next btn-next fa fa-angle-right"></a>
                </div>
            </div><!-- /.title-nav -->
            <div id="owl-recently-viewed" class="owl-carousel product-grid-holder">
                @foreach(list_product(10) as $listproduk)
                <div class="no-margin carousel-item product-item-holder size-small hover">
                    <div class="product-item">
                        @if(is_outstok($listproduk))
                            <div class="ribbon red"><span>kosong</span></div> 
                        @elseif(is_terlaris($listproduk))
                            <div class="ribbon green"><span>Terlaris</span></div>
                        @elseif(is_produkbaru($listproduk))
                            <div class="ribbon blue"><span>Baru</span></div>
                        @endif
                        <div class="image">
                            <div class="wrap-bestproduk">
                            {{HTML::image(product_image_url($listproduk->gambar1,'medium'),$listproduk->nama,array('height'=>'143'))}}
                            </div>
                        </div>
                        <div class="body">
                            <div class="title">
                                <a href="{{product_url($listproduk)}}">{{short_description($listproduk->nama,36)}}</a>
                            </div>
                            <div class="brand"><!-- Sharp --></div>
                        </div>
                        <div class="prices">
                            <div class="price-current text-right">{{!empty($listproduk->hargaJual) ? price($listproduk->hargaJual) : "Call for Price"}}</div>
                        </div>
                        <div class="hover-area">
                            <div class="add-cart-button">
                                <a href="{{product_url($listproduk)}}" class="le-button">Lihat Produk</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div><!-- /#recently-carousel -->
        </div><!-- /.carousel-holder -->
    </div><!-- /.container -->
</section>
<section id="top-brands" class="wow fadeInUp">
    <div class="container">
        <div class="carousel-holder" >
            <div class="title-nav">
                <div class="title-nav-left">
                    <h1>Top Brands</h1>
                </div>
                <div class="nav-holder">
                    <a href="#prev" data-target="#owl-brands" class="slider-prev btn-prev fa fa-angle-left"></a>
                    <a href="#next" data-target="#owl-brands" class="slider-next btn-next fa fa-angle-right"></a>
                </div>
            </div><!-- /.title-nav -->
            <div id="owl-brands" class="owl-carousel brands-carousel">
                @foreach(list_koleksi() as $koleksi)
                @if($koleksi->gambar != '')
                <div class="carousel-item">
                    <a title="{{$koleksi->nama}}" href="{{koleksi_url($koleksi)}}">
                        <img alt="{{$koleksi->nama}}" src="{{koleksi_image_url($koleksi->gambar)}}" />
                    </a>
                </div><!-- /.carousel-item -->
                @endif
                @endforeach
            </div><!-- /.brands-caresoul -->
        </div><!-- /.carousel-holder -->
    </div><!-- /.container -->
</section>