<main id="contact-us" class="inner-bottom-md">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <section class="section leave-a-message">
                    <h2 class="bordered">Login</h2>
                    <h4>Sudah Terdaftar ?</h4>
                    <p>Silahkan login:</p>
                    <form id="contact-form" class="contact-form cf-style-1 inner-top-xs" action="{{url('member/login')}}" method="post" enctype="multipart/form-data">
                        <div class="row field-row">
                            <div class="col-xs-12 col-sm-6">
                                <label>Email Anda*</label>
                                <input class="le-input" type="text" placeholder="Email" name="email" required>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <label>Password*</label>
                                <input class="le-input" type="password" placeholder="Password" name="password" required>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <br>
                                <a href="{{url('member/forget-password')}}" class="forgot">Lupa Password?</a>
                            </div>
                        </div><!-- /.field-row -->
                        <div class="buttons-holder">
                            <button type="submit" class="le-button huge">Login</button>
                        </div><!-- /.buttons-holder -->
                    </form><!-- /.contact-form -->
                </section><!-- /.leave-a-message -->
            </div><!-- /.col -->

            <div class="col-md-6">
                <section class="our-store section inner-left-xs">
                    <h2 class="bordered">Pendaftaran</h2>
                    <h4>Daftar sebagai member untuk mendapatkan keuntungan :</h4>
                    <ul class="ul">
                        <li>Cepat dan Mudah dalam bertransaksi</li>
                        <li>Mudah untuk mengetahui Order Histori dan Status</li>
                    </ul><br>
                    <div class="buttons-holder">
                        <a href="{{url('member/create')}}" class="le-button huge">Register</a>
                    </div><!-- /.buttons-holder -->
                </section><!-- /.our-store -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
</main>