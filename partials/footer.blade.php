<footer id="footer" class="color-bg">   
    <div class="container">
    </div><!-- /.container -->
    {{ Theme::partial('subscribe') }}
    <!-- /.sub-form-row -->
    <div class="link-list-row">
        <div class="container no-padding">
            <div class="col-xs-12 col-md-4 ">
                <!-- ============================================================= CONTACT INFO ============================================================= -->
                <div class="contact-info">
                    <div class="footer-logo">
                        <a href="{{url('home')}}">{{HTML::image(logo_image_url(), 'Logo', array('width'=>'233'))}}</a>
                    </div><!-- /.footer-logo -->
                    <!-- <p class="regular-bold"> Feel free to contact us via phone,email or just send us mail.</p> -->
                    <p>
                        {{$kontak->alamat}}
                    </p>
                    <div class="social-icons">
                        <h3>Get in touch</h3>
                        <ul>
                            @if(!empty($kontak->fb))
                            <li>
                                <a title="Facebook" href="{{url($kontak->fb)}}" class="fa fa-facebook"></a>
                            </li>
                            @endif
                            @if(!empty($kontak->tw))
                            <li>
                                <a title="Twitter" href="{{url($kontak->tw)}}" class="fa fa-twitter"></a>
                            </li >
                            @endif
                             @if(!empty($kontak->pt))
                            <li>
                                <a title="Pinterest" href="{{url($kontak->pt)}}" class="fa fa-pinterest "></a>
                            </li>
                            @endif
                            @if(!empty($kontak->gp))
                            <li>
                                <a title="Google Plus" href="{{url($kontak->gp)}}" class="fa fa-google-plus "></a>
                            </li>
                            @endif
                            @if(!empty($kontak->tl))
                            <li>
                                <a title="Tumblr" href="{{url($kontak->tl)}}" class="fa fa-tumblr "></a>
                            </li>
                            @endif
                            @if(!empty($kontak->ig))
                            <li>
                                <a title="Instagram" href="{{url($kontak->ig)}}" class="fa fa-instagram "></a>
                            </li>
                            @endif
                        </ul>
                        @if(!empty($kontak->ym))
                        <div id="ym">
                            {{ymyahoo($kontak->ym)}}
                        </div>
                        @endif
                    </div><!-- /.social-icons -->
                </div>
            </div>

            <div class="col-xs-12 col-md-8 no-margin">
                <!-- ============================================================= LINKS FOOTER ============================================================= -->
                @foreach($tautan as $key=>$menu)
                @if($key == '1' || $key == '2')
                <div class="link-widget">
                    <div class="widget">
                        <h3>{{$menu->nama}}</h3>
                        <ul>
                        @foreach($quickLink as $link_menu)
                            @if($menu->id == $link_menu->tautanId)
                            <li>
                                <a href="{{menu_url($link_menu)}}">{{$link_menu->nama}}</a>
                            </li>
                            @endif
                        @endforeach
                        </ul>
                    </div><!-- /.widget -->
                </div><!-- /.link-widget -->
                @endif
                @endforeach

                <div class="link-widget">
                    <div class="widget">
                        <h3>Contact</h3>
                        <ul>
                            @if(!empty($kontak->email))
                            <li><i class="fa fa-envelope font-icon"></i><a href="mailto:{{$kontak->email}}" style="text-transform:none;">{{$kontak->email}}</a></li>
                            @endif
                            <li><i class="fa fa-envelope font-icon"></i><a href="mailto:heteroku@gmail.com" style="text-transform:none;">heteroku@gmail.com</a></li>
                            @if(!empty($kontak->telepon))
                            <li><i class="fa fa-phone font-icon"></i><a href="#"> {{$kontak->telepon}}</a></li>
                            @endif
                            @if(!empty($kontak->hp))
                            <li><i class="fa fa-phone font-icon"></i><a href="#"> {{$kontak->hp}}</a></li>
                            @endif
                            @if(!empty($kontak->bb))
                            <li><i class="fa fa-comment"></i><a href="#"> {{$kontak->bb}}</a></li>
                            @endif
                        </ul>
                    </div><!-- /.widget -->
                </div><!-- /.link-widget -->
            </div>
        </div><!-- /.container -->
    </div><!-- /.link-list-row -->

    <div class="copyright-bar">
        <div class="container">
            <div class="col-xs-12 col-sm-6 no-margin">
                <div class="copyright">
                    &copy; <a href="{{url('home')}}">{{ short_description(Theme::place('title'),80) }} {{date('Y')}}</a> - All Right Reserved. Powered by <a class="title-copyright" href="http://jarvis-store.com" target="_blank"> Jarvis Store</a>
                </div><!-- /.copyright -->
            </div>
            <div class="col-xs-12 col-sm-6 no-margin">
                <div class="payment-methods ">
                    <ul>
                        @foreach(list_banks() as $value)
                        <li><img title="{{$value->bankdefault->nama}}" alt="{{$value->bankdefault->nama}}" src="{{bank_logo($value)}}"></li>
                        @endforeach
                        @foreach(list_payments() as $pay)
                            @if($pay->nama == 'ipaymu' && $pay->aktif == 1)
                            <li><img title="Ipaymu" alt="Ipaymu" src="{{url('img/bank/ipaymu.jpg')}}"></li>
                            @endif
                        @endforeach
                        @if(count(list_dokus()) > 0 && list_dokus()->status == 1)
                        <li><img title="Doku" alt="Doku" src="{{url('img/bank/doku.jpg')}}"></li>
                        @endif
                    </ul>
                </div><!-- /.payment-methods -->
            </div>
        </div><!-- /.container -->
    </div><!-- /.copyright-bar -->
</footer>
<a style="position: fixed; z-index: 1001; display: block;" href="#top" id="scrollUp"><i class="fa fa-angle-up"></i></a>
{{pluginPowerup()}}