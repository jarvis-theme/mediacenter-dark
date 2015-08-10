<div class="top-cart-holder dropdown animate-dropdown shpcart">
    <div id="shoppingcartplace" class="basket">
        <a class="dropdown-toggle" data-toggle="dropdown" href="">
            <div class="basket-item-count">
                <span class="count">{{Shpcart::cart()->total_items()}}</span>
                <img src="{{url(dirTemaToko().'mediacenter-dark/assets/images/icon-cart.png')}}" />
            </div>
            <div class="total-price-basket"> 
                <span class="lbl">your cart:</span>
                <span class="total-price">
                    <span class="sign"></span><span class="value">{{ price(Shpcart::cart()->total() )}}</span>
                </span>
            </div>
        </a>
        <ul class="dropdown-menu">
            @foreach (Shpcart::cart()->contents() as $key => $cart)
            <li>
                <div class="basket-item">
                    <div class="row">
                        <div class="col-xs-4 col-sm-4 no-margin text-center">
                            <div class="thumb">
                                <img width="73" height="73" src="{{URL::to(product_image_url($cart['image'],'thumb'))}}" />
                            </div>
                        </div>
                        <div class="col-xs-8 col-sm-8 no-margin">
                            <div class="title">{{short_description($cart['name'],47)}}</div>
                            <div class="price">{{price($cart['price'])}}</div>
                        </div>
                    </div>
                    <!-- <a class="close-btn" href="#"></a> -->
                    <div class="remove-item">
                        <a href="javascript:deletecart({{ "'".$cart['rowid']."'" }})" class="close-btn"></a>
                    </div>
                </div>
            </li>
            @endforeach
            @if(Shpcart::cart()->total_items() > 0)
            <li class="checkout">
                <div class="basket-item">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12">
                            <a href="{{url('checkout')}}" class="le-button">Checkout</a>
                        </div>
                    </div>
                </div>
            </li>
            @else
            <div class="basket-item">
                <p class="alert alert-warning">No products in the cart.</p>
            </div>
            @endif
        </ul>
    </div>
</div>