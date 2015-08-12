<div id="top-mega-nav">
    <div class="container">
        <nav>
            <ul class="inline">
                <li class="breadcrumb-nav-holder"> 
                    <ul>
                        <li class="breadcrumb-item">
                            <a href="{{url::to('home')}}">Home</a>
                        </li>
                        <li class="breadcrumb-item current gray">
                            <a href="{{url::to('produk')}}">Produk</a>
                        </li>
                    </ul>
                </li><!-- /.breadcrumb-nav-holder -->
            </ul>
        </nav>
    </div><!-- /.container -->
</div>
<section class="sidebar-page">
    <div class="container">
        <!-- ========================================= SIDEBAR ========================================= -->
        <div class="col-xs-12 col-sm-3 no-margin sidebar narrow">
            <!-- ========================================= CATEGORY TREE ========================================= -->
            @if(count(list_category()) > 0)
            <div class="widget accordion-widget category-accordions">
                <h1 class="border">Kategori</h1>
                <div class="accordion">
                    @foreach(list_category() as $side_menu)
                    @if($side_menu->parent == '0')
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            @if(count($side_menu->anak) >= 1)
                            <a class="accordion-toggle collapsed" data-toggle="collapse" href="#{{short_description(preg_replace('/[^a-zA-Z0-9-]/', '', $side_menu->nama),23)}}">
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
                                            <a href="{{category_url($submenu)}}" >{{$submenu->nama}}</a>
                                        </div>
                                        @if($submenu->anak->count() != 0)
                                        <div id="{{short_description(preg_replace('/[^a-zA-Z0-9-]/', '', $submenu->nama),23)}}" class="accordion-body collapse in">
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
            @foreach(vertical_banner() as $banners)
            <div class="widget">
                <div class="simple-banner">
                    <a href="{{URL::to($banners->url)}}">{{HTML::image(banner_image_url($banners->gambar),'banner',array('width'=>'250','class'=>'img-responsive'))}}</a>
                </div>
            </div>
            @endforeach
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
                                    {{HTML::image(product_image_url($bestproduk->gambar1,'thumb',array('width'=>'73')))}}
                                    </div>
                                </a>
                            </div>
                            <div class="col-xs-8 col-sm-8 no-margin">
                                <a href="{{product_url($bestproduk)}}">{{short_description($bestproduk->nama,38)}}</a>
                                <div class="price">
                                    @if(!empty($bestproduk->hargaCoret))
                                    <div class="price-prev">{{price($bestproduk->hargaCoret)}}</div>
                                    @endif
                                    <div class="price-current">{{!empty($bestproduk->hargaJual) ? price($bestproduk->hargaJual) : "Call for Price"}}</div>
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
        <!-- ========================================= SIDEBAR : END ========================================= -->

        <!-- ========================================= CONTENT ========================================= -->
        <!-- <div class="col-xs-12 col-sm-9 no-margin wide sidebar page-main-content"> -->
        <div class="col-xs-12 col-sm-9 no-margin wide sidebar">
            <div class="grid-list-products">
                <h1 class="inverse">List Produk</h1>
                <div class="control-bar">
                    <div id="item-count" class="le-select">
                        <select id="show" data-rel="{{URL::current()}}">
                            <option value="">Show Product</option>
                            <option value="12" {{Input::get('show')==12?'selected="selected"':''}}>12 items</option>
                            <option value="24" {{Input::get('show')==24?'selected="selected"':''}}>24 items</option>
                            <option value="36" {{Input::get('show')==36?'selected="selected"':''}}>36 items</option>
                        </select>
                    </div>

                    <div class="grid-list-buttons">
                        <ul>
                            <li class="grid-list-button-item active"><a data-toggle="tab" href="#grid-view"><i class="fa fa-th-large"></i> Grid</a></li>
                            <li class="grid-list-button-item "><a data-toggle="tab" href="#list-view"><i class="fa fa-th-list"></i> List</a></li>
                        </ul>
                    </div>
                </div>
            
                @if(count(list_product(Input::get('show'), @$category, @$collection)) > 0)
                <div class="tab-content" id="featured">
                    <div id="grid-view" class="products-grid fade tab-pane in active">
                        <div class="product-grid-holder">
                            <div class="row no-margin">
                                @foreach(list_product(Input::get('show'), @$category, @$collection) as $listproduk)
                                <div class="col-xs-12 col-sm-4 no-margin product-item-holder hover">
                                    <div class="product-item">
                                        @if(is_outstok($listproduk))
                                            <div class="ribbon red"><span>Kosong</span></div> 
                                        @elseif(is_terlaris($listproduk))
                                            <div class="ribbon green"><span>Terlaris</span></div>
                                        @elseif(is_produkbaru($listproduk))
                                            <div class="ribbon blue"><span>Baru</span></div>
                                        @endif
                                        <div class="image">
                                            {{HTML::image(product_image_url($listproduk->gambar1,'medium'),$listproduk->nama,array('height'=>'186'))}}
                                        </div>
                                        <div class="body">
                                            <div class="label-discount green"><!-- -50% sale --></div>
                                            <div class="title" style="text-align: center;">
                                                <a href="{{product_url($listproduk)}}">{{short_description($listproduk->nama,39)}}</a>
                                            </div>
                                            <div class="brand"><!-- sony --></div>
                                        </div>
                                        <div class="prices">
                                            @if(!empty($listproduk->hargaCoret))
                                            <div class="price-prev">{{price($listproduk->hargaCoret)}}</div>
                                            <div class="price-current pull-right">{{!empty($listproduk->hargaJual) ? price($listproduk->hargaJual) : "Call for Price !!!"}}</div>
                                            @else
                                                <div class="price-current text-right">{{!empty($listproduk->hargaJual) ? price($listproduk->hargaJual) : "Call for Price !!!"}}</div>
                                            @endif
                                        </div>
                                        <div class="hover-area">
                                            <div class="add-cart-button">
                                                <a href="{{product_url($listproduk)}}" class="le-button">Lihat Produk</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div id="list-view" class="products-grid fade tab-pane ">
                        <div class="products-list">
                            @foreach(list_product(Input::get('show'), @$category, @$collection) as $listproduk)
                            <div class="product-item product-item-holder">
                                <div class="row">
                                    <div class="no-margin col-xs-12 col-sm-4 image-holder">
                                        <div class="image">
                                            {{HTML::image(product_image_url($listproduk->gambar1,'medium'),$listproduk->nama)}}
                                        </div>
                                    </div>
                                    <div class="no-margin col-xs-12 col-sm-5 body-holder">
                                        <div class="body">
                                            <!-- <div class="label-discount green">-50% sale</div> -->
                                            <div class="title list-title">
                                                <a href="{{product_url($listproduk)}}">{{short_description($listproduk->nama,125)}}</a>
                                            </div>
                                            <div class="excerpt">
                                                <p>{{short_description($listproduk->deskripsi,500)}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="no-margin col-xs-12 col-sm-3 price-area">
                                        <div class="right-clmn">
                                            <div class="price-current">{{!empty($listproduk->hargaJual) ? price($listproduk->hargaJual) : "Call for Price !!!"}}</div>
                                            @if(!empty($listproduk->hargaCoret))
                                            <div class="price-prev">{{price($listproduk->hargaCoret)}}</div>
                                            @endif
                                            @if(count($listproduk->stok) < 1)
                                            <div class="availability"><label style="font-weight:600;">availability:</label><span class="not-available">out of stock</span></div>
                                            @else
                                            <div class="availability"><label style="font-weight:600;">availability:</label><span class="available">{{$listproduk->stok}}</span></div>
                                            @endif
                                            <a class="le-button" href="{{product_url($listproduk)}}">Lihat</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                {{list_product(Input::get('show'), @$category, @$collection)->appends(array('show' => Input::get('show')))->links()}}
                @else
                <article class="text-center">
                    <i>Produk tidak ditemukan</i>
                </article>
                @endif
            </div>
        </div><!-- /.page-main-content -->
        <!-- ========================================= CONTENT : END ========================================= -->
    </div><!-- /.container -->
</section>