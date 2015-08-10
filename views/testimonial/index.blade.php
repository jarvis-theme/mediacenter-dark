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
                                <a href="{{url::to('testimoni')}}">Testimonial</a>
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
                <div class="tab-content ">
                    <div class="tab-pane active " id="comments">
                    @if(count(list_testimonial()) > 0)
                        @foreach (list_testimonial() as $items) 
                        <br>
                        <div class="comment-item">
                            <div class="row no-margin">
                                <div class="col-xs-2 col-sm-1 no-margin">
                                    <div class="avatar">
                                        <img alt="avatar" src="{{url(dirTemaToko()).'/mediacenter-dark/assets/images/default-avatar.jpg'}}">
                                    </div>
                                </div>
                                <div class="col-xs-10 col-sm-11 no-margin-right">
                                    <div class="comment-body">
                                        <div class="meta-info">
                                            <div class="inline author">
                                                <a href="#" class="bold">{{$items->nama}}</a>
                                            </div>
                                            <div class="star-holder inline">
                                               <!--  <div class="star" data-score="4"></div> -->
                                            </div>
                                            <div class="date inline pull-right">
                                                <!-- 12.07.2013 -->
                                            </div>
                                        </div>
                                        <p class="comment-text">{{$items->isi}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <article class="text-center">
                            <i>Blum Ada Testimoni</i>
                        </article>
                    @endif
                    </div>
                    <br><br>
                    <div class="col-lg-1 col-xs-12 col-sm-2 no-margin"></div>
                        <div class="respond col-md-6">
                            <h3 style="margin-top: 1px;margin-bottom: 20px;">Buat Testimonial</h3>
                            <form method="post" action="{{URL::to('testimoni')}}" role="form">
                               <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input id="cname" name="nama" size="25" class="le-input col-xs-12" required>
                                </div>
                                <div class="form-group">
                                   <label for="exampleInputEmail1">Testimonial</label>
                                    <textarea id="ccomment" name="testimonial" rows="9" cols="5" class="le-input col-xs-12 " required placeholder=""></textarea>
                                </div>
                                    <input class="le-button huge" type="submit" value="Kirim Testimonial" style="margin-top:10px;">
                            </form>
                        </div>
                    </div>
                    <br><br>
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
            </div>
        </div><!-- /.row -->
    </div><!-- /.container -->
</main>