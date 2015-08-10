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
                                <a href="#">Service</a>
                            </li>
                        </ul>
                    </li><!-- /.breadcrumb-nav-holder -->
                </ul>
            </nav>
        </div><!-- /.container -->
    </div><!-- /#top-mega-nav -->
    <!-- ========================================= BREADCRUMB : END ========================================= -->
</div>
<main id="blog" class="inner-bottom-xs">
    <div class="container">
        <div class="row">
            <div class="posts col-md-9">
                <div class="post-entry">
                    <div id="list-view" class="tab-pane active">
                        <br>
                        <article class="col-lg-12 col-md-12 col-xs-12">
                            <h4>Term of Service</h4>
                            <p>{{$service->tos}}</p>
                        </article>
                        <article class="col-lg-12 col-md-12 col-xs-12">
                            <h4>Refund Policy</h4>
                            <p>{{$service->refund}}</p>
                        </article>
                        <article class="col-lg-12 col-md-12 col-xs-12">
                            <h4>Privacy Policy</h4>
                            <p>{{$service->privacy}}</p>
                        </article>
                    </div>
                </div><!-- /.posts -->
                <hr>
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