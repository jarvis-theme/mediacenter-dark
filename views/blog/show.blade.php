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
                            <li class="breadcrumb-item">
                                <a href="{{url::to('blog')}}">Blog</a>
                            </li>
                            <li class="breadcrumb-item current gray">
                                <a href="#">{{$detailblog->judul}}</a>
                            </li>
                        </ul>
                    </li><!-- /.breadcrumb-nav-holder -->
                </ul>
            </nav>
        </div><!-- /.container -->
    </div><!-- /#top-mega-nav -->
</div>
<main id="blog" class="inner-bottom-xs">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="posts sidemeta">
                    <div class="post format-image">
                        <div class="post-content">
                            <h2 class="post-title">{{$detailblog->judul}}</h2>
                            <ul class="meta">
                                <li>{{waktuTgl($detailblog->created_at)}}</li>
                                @if(!empty($detailblog->kategori->nama))
                                <li><a href="{{blog_category_url(@$detailblog->kategori)}}">{{@$detailblog->kategori->nama}}</a></li>
                                @endif
                                <div class="col-xs-12 col-sm-4 sosial-share">{{sosialShare(blog_url($detailblog))}}</div>
                            </ul>
                            <br>
                            <p>{{$detailblog->isi}}</p>
                            <hr>
                            <div class="navigate comments clearfix">
                                @if(isset($prev))
                                    <div class="pull-left"><a href="{{$prev->slug}}">&larr; Sebelumnya</a></div>
                                @else
                                    <div class="pull-right"></div>
                                @endif
                                @if(isset($next))
                                <div class="pull-right">
                                    <a style="float: right;" href="{{$next->slug}}">Selanjutnya &rarr;</a>
                                </div>
                                @else   
                                    <div class="pull-right"></div>
                                @endif
                            </div>
                            <hr>
                        </div><!-- /.post-content -->
                        {{$fbscript}}
                        {{fbcommentbox(blog_url($detailblog), '100%', '5', 'light')}}
                    </div><!-- /.post -->
                </div><!-- /.posts -->
            </div><!-- /.col -->
            <div class="col-md-3">
                <aside class="sidebar blog-sidebar">
                    <!-- <div class="widget clearfix">
                        <div class="body">
                            <form role="search" class="search-form" action="{{url('search')}}" method="post">
                                <div class="form-group">
                                    <label class="sr-only" for="page-search">Type your search here</label>
                                    <input id="page-search" name="search" class="search-input form-control" type="search" placeholder="Enter Keywords...">
                                </div>
                                <button class="page-search-button">
                                    <span class="fa fa-search">
                                        <span class="sr-only">Search</span>
                                    </span>
                                </button>
                            </form>
                        </div>
                    </div> -->

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
                            </ul><!-- /.le-links -->
                        </div>
                    </div><!-- /.widget -->
                    @endif
                    @if(count(vertical_banner()) > 0)
                    <div class="widget">
                        <div class="simple-banner">
                            @foreach(vertical_banner() as $banners)
                            <a href="{{URL::to($banners->url)}}">{{HTML::image(banner_image_url($banners->gambar),'banner',array('width'=>'250','class'=>'img-responsive'))}}</a>
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