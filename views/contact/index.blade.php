<main id="contact-us" class="inner-bottom-md">
    <section class="google-map map-holder">
        @if($kontak->lat!='0' || $kontak->lng!='0')
            <iframe style="float:right;width:100%" height="460" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q={{ $kontak->lat.','.$kontak->lng }}&amp;aq=&amp;sll={{ $kontak->lat.','.$kontak->lng }}&amp;sspn=0.006849,0.009892&amp;ie=UTF8&amp;t=m&amp;z=14&amp;output=embed"></iframe><br />
        @else
            <iframe style="float:right;width:100%" height="460" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q={{ $kontak->alamat }}&amp;aq=0&amp;oq=gegerkalong+hil&amp;sspn=0.006849,0.009892&amp;ie=UTF8&amp;hq=&amp;hnear={{ $kontak->alamat }}&amp;t=m&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe><br />
        @endif
    </section>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <section class="section leave-a-message">
                    <h2 class="bordered">Hubungi Kami</h2>
                    <form id="contact-form" class="contact-form cf-style-1 inner-top-xs" action="{{url('kontak')}}" method="post">
                        <div class="row field-row">
                            <div class="col-xs-12 col-sm-6">
                                <label>Nama*</label>
                                <input class="le-input" name="namaKontak" type="text" required>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <label>Email*</label>
                                <input class="le-input" name="emailKontak" type="email" required>
                            </div>
                        </div><!-- /.field-row -->
                        <div class="field-row">
                            <label>Pesan*</label>
                            <textarea rows="8" class="le-input" name="messageKontak" required></textarea>
                        </div><!-- /.field-row -->
                        <div class="buttons-holder">
                            <button type="submit" class="le-button huge">Kirim Pesan</button>
                        </div><!-- /.buttons-holder -->
                    </form><!-- /.contact-form -->
                </section><!-- /.leave-a-message -->
            </div><!-- /.col -->
            <div class="col-md-4">
                <section class="our-store section inner-left-xs">
                    <h2 class="bordered">{{ Theme::place('title') }}</h2>
                    <ul class="list-unstyled operation-hours">
                        @if(!empty($kontak->alamat))
                        <li class="clearfix">
                            <span class="day">Alamat :</span>
                            <span class="pull-right hours">{{$kontak->alamat}}</span>
                        </li>
                        @endif
                        @if(!empty($kontak->telepon))
                        <li class="clearfix">
                            <span class="day">No Telepon :</span>
                            <span class="pull-right hours">{{$kontak->telepon}}</span>
                        </li>                       
                        @endif
                        @if(!empty($kontak->hp))
                        <li class="clearfix">
                            <span class="day">HP :</span> 
                            <span class="pull-right hours">{{$kontak->hp}}</span>
                        </li>
                        @endif
                        @if(!empty($kontak->bb))
                        <li class="clearfix">
                            <span class="day">BBM :</span> 
                            <span class="pull-right hours">{{$kontak->bb}}</span>
                        </li>
                        @endif
                        @if(!empty($kontak->email))
                        <li class="clearfix">
                            <span class="day">Email :</span>
                            <span class="pull-right hours"><a href="mailto:{{$kontak->email}}"> {{$kontak->email}}</a></span>
                        </li>
                        @endif
                    </ul>
                </section><!-- /.our-store -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</main>