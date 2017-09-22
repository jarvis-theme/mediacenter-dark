<div class="animate-dropdown">
    <!-- ========================================= BREADCRUMB ========================================= -->
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
                                <a href="{{url::to('blog')}}">Blog</a>
                            </li>
                        </ul>
                    </li><!-- /.breadcrumb-nav-holder -->
                </ul>
            </nav>
        </div><!-- /.container -->
    </div><!-- /#top-mega-nav -->
    <!-- ========================================= BREADCRUMB : END ========================================= --></div>
</div>
<main id="blog" class="inner-bottom-xs">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
            @if(count(list_blog(null,@$blog_category)) > 0)
                @foreach(list_blog(null,@$blog_category) as $blogs)
                <div class="posts sidemeta">
                    <div class="post format-image">
                        <div class="row">
                            <div class="col-xs-3 col-sm-2">
                                <div class="date-wrapper">
                                    <div class="date">
                                        <span class="month">{{waktuTgl($blogs->created_at)}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-9 col-sm-9">
                                <div class="post-content">
                                    <h2 class="post-title"><a href="{{blog_url($blogs)}}">{{$blogs->judul}}</a></h2>
                                    <ul class="meta">
                                        @if(!empty($blogs->kategori->nama))
                                        <li><a href="{{blog_category_url(@$blogs->kategori)}}">{{@$blogs->kategori->nama}}</a></li>
                                        @endif
                                    </ul>
                                    <p>{{shortDescription($blogs->isi,484)}}</p>
                                    <a href="{{blog_url($blogs)}}" class="le-button huge">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <hr>
                {{list_blog(null,@$blog_category)->links()}}
            @else
                <article style="font-style:italic; text-align:center;color:#fff;">
                    Blog tidak ditemukan.
                </article>
                <br>
            @endif
            </div><!-- /.col -->

            <div class="col-md-3">
                <aside class="sidebar blog-sidebar">
                    @if(count(list_blog_category()) > 0)
                    <div class="widget">
                        <h4>Kategori Blog</h4>
                        <div class="body">
                            <ul class="le-links">
                                @foreach(list_blog_category() as $kat)
                                @if(!empty($kat->nama))
                                <li><a href="{{blog_category_url($kat)}}">{{$kat->nama}}</a></li>
                                @endif
                                @endforeach
                            </ul>
                        </div>
                    </div><!-- /.widget -->
                    @endif
                    @if(count(vertical_banner()) > 0)
                    <div class="widget">
                        <div class="simple-banner">
                            @foreach(vertical_banner() as $banners)
                            <a href="{{URL::to($banners->url)}}">
                                {{HTML::image(banner_image_url($banners->gambar),'banner',array('width'=>'250'))}}
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    <!-- ========================================= RECENT POST ========================================= -->
                    @if(count(list_blog(5,@$blog_category)) > 0)
                    <div class="widget">
                        <h4>Artikel Terbaru</h4>
                        <div class="body">
                            <ul class="recent-post-list">
                                @foreach(list_blog(5,@$blog_category) as $blog)
                                <li class="sidebar-recent-post-item">
                                    <div class="media">
                                        <div class="media-body">
                                            <h5><a href="{{blog_url($blog)}}">{{$blog->judul}}</a></h5>
                                            <div class="posted-date">{{waktuTgl($blog->updated_at)}}</div>
                                        </div>
                                    </div>
                                </li><!-- /.sidebar-recent-post-item -->
                                @endforeach
                            </ul><!-- /.recent-post-list -->
                        </div><!-- /.body -->
                    </div><!-- /.widget -->
                    @endif
                    <!-- ========================================= RECENT POST : END ========================================= -->
                </aside><!-- /.sidebar .blog-sidebar -->
            </div>
        </div><!-- /.row -->
    </div><!-- /.container -->
</main>