<div class="inner-column row padd">
    <div id="center_column" class="inner-bg col-lg-12 col-xs-12 col-sm-8">
        <div class="col-xs-12 col-sm-8 col-lg-9">
            <h1 class="bordered">Forget Password</h1>
            <br>
            {{Form::open(array('url' => 'member/recovery/'.$id.'/'.$code, 'class' => 'form-horizontal'))}}
                <div class="form-group">
                    <label for="inputPassword" class="col-sm-2">Password Baru</label>
                    <div class="col-sm-4">
                        <input type="password" class="le-input col-xs-12" name="password" placeholder="Password Baru" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword2" class="col-sm-2">Konfirmasi Password Baru</label>
                    <div class="col-sm-4">
                        <input type="password" class="le-input col-xs-12" name="password_confirmation" placeholder="Konfirmasi Password Baru" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="le-button huge">Update Password</button>
                    </div>
                </div>
            {{Form::close()}}
            <br>
        </div>
        <div class="col-xs-12 col-sm-4 col-lg-3 pull-left">
            <div id="advertising" class="block">
                @foreach(vertical_banner() as $banner)
                <div class="img-block">
                    <a href="{{url($banner->url)}}">
                        {{HTML::image(banner_image_url($banner->gambar),'banner',array('width'=>'272','height'=>'391','class'=>'img-responsive'))}}
                    </a>
                </div>
                @endforeach
            </div>
            <br>
        </div>
    </div>
</div>