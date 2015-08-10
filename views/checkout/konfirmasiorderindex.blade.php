<main id="contact-us" class="inner-bottom-md">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <section class="section leave-a-message">
                    <h2 class="bordered">Konfirmasi Order</h2>
                    {{Form::open(array('url'=>'konfirmasiorder','method'=>'post','class'=>'form-inline'))}}
                        <div class="row field-row">
                            <div class="col-xs-12 col-sm-12">
                                <p>Untuk melakukan konfirmasi pembayaran, silahkan masukkan kode order yang sudah anda terima.</p>
                                <label>Kode Order*</label>
                                <input class="le-input" type="text" name="kodeorder" required>
                            </div>
                        </div><!-- /.field-row -->
                        <br>
                        <div class="buttons-holder">
                            <button type="submit" class="le-button huge">Cari Kode</button>
                        </div><!-- /.buttons-holder -->
                    {{Form::close()}}
                </section><!-- /.leave-a-message -->
            </div><!-- /.col -->

            <div class="col-md-6">
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
</main>