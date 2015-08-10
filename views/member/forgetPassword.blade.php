<main id="contact-us" class="inner-bottom-md">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <section class="section leave-a-message">
                    <h2 class="bordered">Lupa Password</h2>
                    <form id="contact-form" class="contact-form cf-style-1 inner-top-xs" action="{{url('member/forgetpassword')}}" method="post">
                        <div class="row field-row">
                            <div class="col-xs-12 col-sm-6">
                                <label>Email Anda*</label>
                                <input class="le-input" type="text" placeholder="Email" name="recoveryEmail" required>
                            </div>
                        </div><!-- /.field-row -->
                        <div class="buttons-holder">
                            <button type="submit" class="le-button huge">Reset Password</button>
                        </div><!-- /.buttons-holder -->
                    </form><!-- /.contact-form -->
                </section><!-- /.leave-a-message -->
            </div><!-- /.col -->

            <div class="col-md-6">
                <section class="our-store section inner-left-xs">
                    <h2 class="bordered">Pelanggan Baru</h2>
                    <ul class="ul">
                        <li>Nikmati kemudahan berbelanja dengan mendaftar sebagai member.</li>
                        <br>
                    </ul>
                    <div class="buttons-holder">
                        <a href="{{url('member/create')}}" class="le-button huge">Register</a>
                    </div><!-- /.buttons-holder -->
                </section><!-- /.our-store -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
</main>