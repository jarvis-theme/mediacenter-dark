<!DOCTYPE html>
<html lang="en">
    <head>
        {{ Theme::partial('seostuff') }} 
        {{ Theme::partial('defaultcss') }}  
        {{ Theme::asset()->styles() }} 
    </head>
    <body>
        <div class="wrapper">
            {{ Theme::partial('header') }}
            <div id="top-banner-and-menu" class="homepage2">
                <div class="container">
                    <div class="col-xs-12">    
                        {{-- Theme::partial('slider') --}}          
                    </div>
                </div>
            </div>
            {{ Theme::place('content') }}
            {{ Theme::partial('footer') }}
        </div>
        <span class="totop">
            <a href="#"><i class="fa fa-angle-up"></i></a>
        </span>
         
        {{ Theme::partial('defaultjs') }}
        {{-- Theme::asset()->scripts() --}} 
        {{ Theme::asset()->container('footer')->scripts() }}
        {{ Theme::partial('analytic') }}
    </body>
</html>