<div id="hero">
    <div id="owl-main" class="owl-carousel height-lg owl-inner-nav owl-ui-lg">
        @foreach (slideshow() as $val) 
        <div class="item">
            <img class="anim" alt="" width="1140" src="{{slide_image_url($val->gambar)}}" />
            <div class="container-fluid">
                <div class="caption vertical-center text-left right" style="padding-right:0;">
                    <div class="big-text fadeInDown-1">
                        {{$val->text}}
                    </div>
                </div><!-- /.caption -->
            </div><!-- /.container-fluid -->
        </div><!-- /.item -->
        @endforeach
    </div><!-- /.owl-carousel -->
</div>