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
                            <a href="#">Search</a>
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
                            <a class="accordion-toggle collapsed" data-toggle="collapse" href="#{{short_description(preg_replace('/[^a-zA-Z0-9-]/', '', $side_menu->nama),23)}}">
                             @else
                            <a class="collapsed" href="{{category_url($side_menu)}}">
                            @endif  
                                {{short_description($side_menu->nama,23)}}
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
                                            @if(count($submenu->anak) >= 1)
                                            <a href="#{{short_description($submenu->nama,20)}}" data-toggle="collapse">{{short_description($submenu->nama,20)}}</a>
                                            @else
                                            <a href="{{category_url($submenu)}}" >{{short_description($submenu->nama,20)}}</a>
                                            @endif
                                        </div>
                                        @if($submenu->anak->count() != 0)
                                        <div id="{{short_description($submenu->nama,20)}}" class="accordion-body collapse in">
                                            <ul>
                                                @foreach($submenu->anak as $submenu2)
                                                @if($submenu2->parent == $submenu->id)
                                                <li><a href="{{category_url($submenu2)}}">{{short_description($submenu2->nama,20)}}</a></li>
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
            @if(count(list_blog_category()) > 0)
                <div class="widget">
                    <h1 class="border">Kategori Blog</h1>
                    <div class="body">
                        <ul class="le-links">
                            @foreach(list_blog_category() as $kat)
                            @if(!empty($kat->nama))
                            <li><a href="{{blog_category_url($kat)}}">{{$kat->nama}}</a></li>
                            @endif
                            @endforeach
                        </ul><!-- /.le-links -->
                    </div>
                </div><!-- /.widget -->
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
                                    <div class="price-prev">@if(!empty($bestproduk->hargaCoret)){{price($bestproduk->hargaCoret)}}@endif</div>
                                    <div class="price-current">{{price($bestproduk->hargaJual)}}</div>
                                </div>
                            </div>  
                        </div>
                    </li><!-- /.sidebar-product-list-item -->
                    @endforeach
                </ul><!-- /.product-list -->
            </div><!-- /.widget -->
            <!-- ========================================= FEATURED PRODUCTS : END ========================================= -->            
        </div>
        <!-- ========================================= SIDEBAR : END ========================================= -->

        <!-- ========================================= CONTENT ========================================= -->
        @if($jumlahCari != 0)
            @if(count($hasilpro) > 0)
            <div class="col-xs-12 col-sm-9 no-margin wide  sidebar page-main-content">
                <h1 class="border">List Produk</h1>
                <div class="tab-pane" id="featured">
                    <div class="product-grid-holder">
                        @foreach($hasilpro as $listproduk)
                        <div class="col-xs-12 col-sm-4 no-margin product-item-holder hover">
                            <div class="product-item">
                                @if(is_outstok($listproduk))
                                    <div class="ribbon red"><span>kosong</span></div> 
                                @elseif(is_terlaris($listproduk))
                                    <div class="ribbon green"><span>Terlaris</span></div>
                                @elseif(is_produkbaru($listproduk))
                                    <div class="ribbon blue"><span>baru</span></div>
                                @endif
                                <div class="image">
                                    {{HTML::image(product_image_url($listproduk->gambar1,'medium'),$listproduk->nama,array('height'=>'186'))}}
                                </div>
                                <div class="body">
                                    <div class="label-discount green"><!-- -50% sale --></div>
                                    <div class="title">
                                        <a href="{{product_url($listproduk)}}">{{short_description($listproduk->nama,39)}}</a>
                                    </div>
                                    <div class="brand"><!-- sony --></div>
                                </div>
                                <div class="prices">
                                    @if(!empty($listproduk->hargaCoret))
                                    <div class="price-prev">{{price($listproduk->hargaCoret)}}</div>
                                    <div class="price-current pull-right">{{price($listproduk->hargaJual)}}</div>
                                    @else
                                    <div class="price-current text-right">{{price($listproduk->hargaJual)}}</div>
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
                       {{$hasilpro->links()}}
                    </div>
                </div>
            </div><!-- /.page-main-content -->
            @endif
            @if(count($hasilhal) > 0 || count($hasilblog) > 0)
            <div class="col-md-9">
                @foreach($hasilhal as $halaman)
                <div class="posts sidemeta">
                    <div class="post format-image">
                        <div class="post-content">
                            <h1 class="border">{{$halaman->judul}}</h1>
                            <p>{{shortDescription($halaman->isi,484)}}</p>
                            <a href="{{blog_url($halaman)}}" class="le-button huge">Read More</a>
                        </div><!-- /.post-content -->
                    </div><!-- /.post -->
                </div><!-- /.posts -->
                @endforeach
            </div><!-- /.col -->
            <div class="col-md-9">
                @foreach($hasilblog as $blogs)
                <div class="posts sidemeta">
                    <div class="post format-image">
                        <div class="post-content">
                            <h1 class="border">{{$blogs->judul}}</h1>
                            <ul class="meta">
                                @if(!empty($blogs->kategori->nama))
                                <li><a href="{{blog_category_url(@$blogs->kategori)}}">{{@$blogs->kategori->nama}}</a></li>
                                @endif
                                <li><a href="#">{{waktuTgl($blogs->updated_at)}}</a></li>
                            </ul><!-- /.meta -->
                            <p>{{shortDescription($blogs->isi,484)}}</p>
                            <a href="{{blog_url($blogs)}}" class="le-button huge">Read More</a>
                        </div><!-- /.post-content -->
                    </div><!-- /.post -->
                </div><!-- /.posts -->
                @endforeach
            </div><!-- /.col -->
            @endif
        @else
        <article class="text-center">
            <i>Hasil pencarian tidak ditemukan</i>
        </article>
        @endif
        <!-- ========================================= CONTENT : END ========================================= -->
    </div><!-- /.container -->
</section>