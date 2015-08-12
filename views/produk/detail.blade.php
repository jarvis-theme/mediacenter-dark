<div id="top-mega-nav">
    <div class="container">
        <nav>
            <ul class="inline">
                <li class="breadcrumb-nav-holder"> 
                    <ul>
                        <li class="breadcrumb-item">
                            <a href="{{url::to('home')}}">Home</a>
                        </li>
                         <li class="breadcrumb-item">
                            <a href="{{url::to('produk')}}">Produk</a>
                        </li>
                        <li class="breadcrumb-item current gray">
                            <a href="#">{{$produk->nama}}</a>
                        </li>
                    </ul>
                </li><!-- /.breadcrumb-nav-holder -->
            </ul>
        </nav>
    </div><!-- /.container -->
</div>
<section class="sidebar-page">
    <div class="container">
        <div class="col-xs-12 col-sm-3 no-margin sidebar narrow">
            @if(count(list_category()) > 0)
            <div class="widget accordion-widget category-accordions">
                <h1 class="border">Kategori</h1>
                <div class="accordion">
                    @foreach(list_category() as $side_menu)
                    @if($side_menu->parent == '0')
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            @if(count($side_menu->anak) >= 1)
                            <a class="accordion-toggle collapsed" data-toggle="collapse" href="#{{preg_replace('/[^a-zA-Z0-9-]/', '', $side_menu->nama)}}">
                            @else
                            <a class="collapsed" href="{{category_url($side_menu)}}">
                            @endif  
                                {{$side_menu->nama}}
                            </a>
                        </div>
                            @if($side_menu->anak->count() != 0)
                            <div id="{{short_description(preg_replace('/[^a-zA-Z0-9-]/', '', $side_menu->nama),23)}}" class="accordion-body collapse">
                                <div class="accordion-inner">
                                    <ul>
                                        @foreach($side_menu->anak as $submenu)
                                        @if($submenu->parent == $side_menu->id)
                                        <li>
                                            <div class="accordion-heading">
                                                <a href="{{category_url($submenu)}}">{{$submenu->nama}}</a>
                                            </div>
                                            @if($submenu->anak->count() != 0)
                                            <div id="{{short_description($submenu->nama,20)}}" class="accordion-body collapse in">
                                                <ul>
                                                    @foreach($submenu->anak as $submenu2)
                                                    @if($submenu2->parent == $submenu->id)
                                                    <li><a href="{{category_url($submenu2)}}">{{$submenu2->nama}}</a></li>
                                                    @endif
                                                    @endforeach
                                                </ul>
                                            </div><!-- /.accordion-body -->
                                            @endif
                                        </li>
                                        @endif
                                        @endforeach
                                    </ul>
                                </div><!-- /.accordion-inner -->
                            </div>
                            @endif
                        </div><!-- /.accordion-group -->
                    @endif
                    @endforeach
                </div><!-- /.accordion -->
            </div><!-- /.category-accordions -->
            @endif
            <!-- ========================================= CATEGORY TREE : END ========================================= -->            
            <!-- ========================================= LINKS ========================================= -->
            @if(count(list_koleksi()) > 0)
            <div class="widget">
                <h1 class="border">Koleksi</h1>
                @foreach (list_koleksi() as $kol)
                <span class="label label-koleksi"><a href="{{koleksi_url($kol)}}">{{short_description($kol->nama,23)}}</a></span>
                @endforeach
            </div>
            @endif
            <!-- ========================================= LINKS : END ========================================= -->
            
            @if(count(vertical_banner()) > 0)
                @foreach(vertical_banner() as $banners)
                <div class="widget">
                    <div class="simple-banner">
                        <a href="{{URL::to($banners->url)}}">{{HTML::image(banner_image_url($banners->gambar),'banner',array('width'=>'250','class'=>'img-responsive'))}}</a>
                    </div>
                </div>
                @endforeach
            @endif
            <!-- ========================================= FEATURED PRODUCTS ========================================= -->
            @if(count(best_seller()) > 0)
            <div class="widget">
                <h1 class="border">Best Seller</h1>
                <ul class="product-list">
                    @foreach(best_seller(5) as $bestproduk)
                    <li class="sidebar-product-list-item">
                        <div class="row">
                            <div class="col-xs-4 col-sm-4 no-margin">
                                <a href="{{product_url($bestproduk)}}" class="thumb-holder">
                                    <div class="side-image">
                                    {{HTML::image(product_image_url($bestproduk->gambar1),$bestproduk->nama,array('width'=>'73'))}}
                                    </div>
                                </a>
                            </div>
                            <div class="col-xs-8 col-sm-8 no-margin">
                                <a href="{{product_url($bestproduk)}}">{{short_description($bestproduk->nama,38)}}</a>
                                <div class="price">
                                    @if(!empty($bestproduk->hargaCoret))
                                    <div class="price-prev">{{price($bestproduk->hargaCoret)}}</div>
                                    @endif
                                    <div class="price-current">{{!empty($bestproduk->hargaJual) ? price($bestproduk->hargaJual) : "Call for Price !!!"}}</div>
                                </div>
                            </div>  
                        </div>
                    </li><!-- /.sidebar-product-list-item -->
                    @endforeach
                </ul><!-- /.product-list -->
            </div><!-- /.widget -->
            @endif
            <!-- ========================================= FEATURED PRODUCTS : END ========================================= -->
        </div>
        <div class="col-xs-12 col-sm-9 no-margin wide sidebar page-main-content">
            <form action="#" id="addorder">
                <div id="single-product" class="row">
                <div class="no-margin col-xs-12 col-sm-6 col-md-5 gallery-holder">
                    <div class="product-item-holder size-big single-product-gallery small-gallery">
                        <div id="owl-single-product">
                            @if($produk->gambar1 != '')
                            <div class="single-product-gallery-item" id="slide1">
                                <a data-rel="prettyphoto" href="{{url(product_image_url($produk->gambar1,'large'))}}">
                                    <img class="img-responsive" alt="" src="{{url(product_image_url($produk->gambar1,'large'))}}" data-echo="{{url(product_image_url($produk->gambar1,'large'))}}" />
                                </a>
                            </div><!-- /.single-product-gallery-item -->
                            @endif
                            @if($produk->gambar2 != '')
                            <div class="single-product-gallery-item" id="slide2">
                                <a data-rel="prettyphoto" href="{{url(product_image_url($produk->gambar2,'large'))}}">
                                    <img class="img-responsive" alt="" src="{{url(product_image_url($produk->gambar2,'large'))}}" data-echo="{{url(product_image_url($produk->gambar2,'large'))}}" />
                                </a>
                            </div><!-- /.single-product-gallery-item -->
                            @endif
                            @if($produk->gambar3 != '')
                            <div class="single-product-gallery-item" id="slide3">
                                <a data-rel="prettyphoto" href="{{url(product_image_url($produk->gambar3,'large'))}}">
                                    <img class="img-responsive" alt="" src="{{url(product_image_url($produk->gambar3,'large'))}}" data-echo="{{url(product_image_url($produk->gambar3,'large'))}}" />
                                </a>
                            </div><!-- /.single-product-gallery-item -->
                            @endif
                            @if($produk->gambar4 != '')
                            <div class="single-product-gallery-item" id="slide4">
                                <a data-rel="prettyphoto" href="{{url(product_image_url($produk->gambar4,'large'))}}">
                                    <img class="img-responsive" alt="" src="{{url(product_image_url($produk->gambar4,'large'))}}" data-echo="{{url(product_image_url($produk->gambar4,'large'))}}" />
                                </a>
                            </div><!-- /.single-product-gallery-item -->
                            @endif
                        </div>
                        <div class="single-product-gallery-thumbs gallery-thumbs">
                            <div id="owl-single-product-thumbnails">
                                @if($produk->gambar1 != '')
                                <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="0" href="#slide1">
                                    <img width="67" alt="" src="{{product_image_url($produk->gambar1,'thumb')}}" data-echo="{{product_image_url($produk->gambar1,'thumb')}}" />
                                </a>
                                @endif
                                @if($produk->gambar2 != '')
                                <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="1" href="#slide2">
                                    <img width="67" alt="" src="{{product_image_url($produk->gambar2,'thumb')}}" data-echo="{{product_image_url($produk->gambar2,'thumb')}}" />
                                </a>
                                @endif
                                @if($produk->gambar3 != '')
                                <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="2" href="#slide3">
                                    <img width="67" alt="" src="{{product_image_url($produk->gambar3,'thumb')}}" data-echo="{{product_image_url($produk->gambar3,'thumb')}}" />
                                </a>
                                @endif
                                @if($produk->gambar4 != '')
                                <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="3" href="#slide4">
                                    <img width="67" alt="" src="{{product_image_url($produk->gambar4,'thumb')}}" data-echo="{{product_image_url($produk->gambar4,'thumb')}}" />
                                </a>
                                @endif
                            </div><!-- /#owl-single-product-thumbnails -->
                            <!-- <div class="nav-holder left hidden-xs">
                                <a class="prev-btn slider-prev" data-target="#owl-single-product-thumbnails" href="#prev"></a>
                            </div>
                            <div class="nav-holder right hidden-xs">
                                <a class="next-btn slider-next" data-target="#owl-single-product-thumbnails" href="#next"></a>
                            </div> -->
                        </div><!-- /.gallery-thumbs -->
                    </div><!-- /.single-product-gallery -->
                </div><!-- /.gallery-holder -->
                <div class="no-margin col-xs-12 col-sm-6 col-md-6 body-holder">
                    <div class="body">
                        <div class="availability"><label style="font-weight:600;">Availability:</label><span class="available"> {{$produk->stok}} in stock</span></div>
                        <div class="title"><a href="#">{{$produk->nama}}</a></div>
                        <div class="brand"></div>
                            {{sosialShare(product_url($produk))}}
                        <div class="excerpt">
                            <p class="white">{{short_description($produk->deskripsi,200)}}</p>
                        </div>
                        <div class="prices">
                            <div class="price-current">{{!empty($produk->hargaJual) ? price($produk->hargaJual) : "Call for Price !!!"}}</div>
                            @if(!empty($produk->hargaCoret))
                            <div class="price-prev">{{price($produk->hargaCoret)}}</div>
                            @endif
                        </div>
                        <div class="tab-quantity">
                            @if($opsiproduk->count() > 0)
                                <div class="select-style">
                                  <select>
                                    <option value="">-- Pilih Opsi --</option>
                                    @foreach ($opsiproduk as $key => $opsi)
                                        <option value="{{$opsi->id}}" {{ $opsi->stok==0 ? 'disabled':''}}>{{$opsi->opsi1.($opsi->opsi2=='' ? '':' / '.$opsi->opsi2).($opsi->opsi3=='' ? '':' / '.$opsi->opsi3)}} {{price($opsi->harga)}}</option>
                                    @endforeach
                                  </select>
                                </div>
                            @endif
                        </div>
                        <div class="qnt-holder">
                            <div class="le-quantity">
                                <a class="minus" href="#reduce"></a>
                                <input name="qty" readonly="readonly" type="text" value="1">
                                <a class="plus" href="#add"></a>
                            </div>
                            <button id="addto-cart"  class="le-button huge addtocart" type="submit" class="cart">add to cart</button>
                        </div><!-- /.qnt-holder -->
                    </div><!-- /.body -->
                </div><!-- /.body-holder -->
                </div><!-- /.row #single-product -->
            </form>
            <!-- ========================================= SINGLE PRODUCT TAB ========================================= -->
            <section id="single-product-tab">
                <div class="no-container">
                    <div class="tab-holder">
                        <ul class="nav nav-tabs simple">
                            <li class="active"><a href="#description" data-toggle="tab">Description</a></li>
                            <li><a href="#detail" data-toggle="tab">Detail</a></li>
                            <li><a href="#reviews" data-toggle="tab">Reviews</a></li>
                        </ul><!-- /.nav-tabs -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="description">
                                <p>{{$produk->deskripsi}}</p>
                            </div><!-- /.tab-pane #description -->
                            <div class="tab-pane" id="detail">
                                <ul class="tabled-data">
                                    <li>
                                        <label>Berat</label>
                                        <div class="value">{{$produk->berat}} gram</div>
                                    </li>
                                    <li>
                                        <label>Stock</label>
                                        <div class="value">{{$produk->stok}}</div>
                                    </li>
                                    <li>
                                        <label>Vendor</label>
                                        <div class="value">{{$produk->vendor}}</div>
                                    </li>
                                </ul><!-- /.tabled-data -->
                            </div><!-- /.tab-pane #additional-info -->
                            <div class="tab-pane" id="reviews">
                                <p>{{pluginTrustklik()}}</p>
                            </div><!-- /.tab-pane #reviews -->
                        </div><!-- /.tab-content -->
                    </div><!-- /.tab-holder -->
                </div><!-- /.container -->
            </section><!-- /#single-product-tab -->
            <!-- ========================================= SINGLE PRODUCT TAB : END ========================================= -->            
            <!-- ========================================= RECENTLY VIEWED ========================================= -->
            @if(count(other_product($produk)) > 0)
            <section id="recently-reviewd" class="wow fadeInUp">
                <div class="no-container">
                    <div class="carousel-holder hover">
                        <div class="title-nav">
                            <h2 class="h1">Produk Lainnya</h2>
                            <div class="nav-holder">
                                <a href="#prev" data-target="#owl-recently-viewed-2" class="slider-prev btn-prev fa fa-angle-left"></a>
                                <a href="#next" data-target="#owl-recently-viewed-2" class="slider-next btn-next fa fa-angle-right"></a>
                            </div>
                        </div><!-- /.title-nav -->
                        <div id="owl-recently-viewed-2" class="owl-carousel product-grid-holder">
                            @foreach(other_product($produk) as $relproduk)
                            <div class="no-margin carousel-item product-item-holder size-medium hover">
                                <div class="product-item">
                                    @if(is_outstok($relproduk))
                                        <div class="ribbon red"><span>Kosong</span></div> 
                                    @elseif(is_terlaris($relproduk))
                                        <div class="ribbon green"><span>Terlaris</span></div>
                                    @elseif(is_produkbaru($relproduk))
                                        <div class="ribbon blue"><span>Baru</span></div>
                                    @endif
                                    <div class="image">
                                        {{HTML::image(product_image_url($relproduk->gambar1,'medium'),$relproduk->nama,array('height'=>'186'))}}
                                    </div>
                                    <div class="body">
                                        <div class="title">
                                            <a href="{{product_url($relproduk)}}">{{shortDescription($relproduk->nama,37)}}</a>
                                        </div>
                                    </div>
                                    <div class="prices">
                                        <div class="price-current text-right">{{!empty($relproduk->hargaJual) ? price($relproduk->hargaJual) : "Call for Price"}}</div>
                                    </div>
                                    <div class="hover-area">
                                        <div class="add-cart-button">
                                            <a href="{{product_url($relproduk)}}" class="le-button">Lihat Produk</a>
                                        </div>
                                    </div>
                                </div><!-- /.product-item -->
                            </div>
                            @endforeach
                        </div><!-- /#recently-carousel -->
                    </div><!-- /.carousel-holder -->
                </div><!-- /.container -->
            </section><!-- /#recently-reviewd -->
            @endif
            <!-- ========================================= RECENTLY VIEWED : END ========================================= -->
        </div>
    </div><!-- /.container -->
</section>