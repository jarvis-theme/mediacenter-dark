
				<!-- BEGIN .cart-wrapper -->
				<div class="cart-wrapper">

				@if($cart->contents())
					{{Form::open(array('url'=>'pengiriman', 'method' => 'post','name'=>'checkout'))}}

					<div class="main-title">
						<p class="custom-font-1">Keranjang belanja</p>
						<a href="{{URL::to('produk')}}" class="continue">lanjut berbelanja</a>
					</div>

					<div class="cart-titles">
						<p class="item-image">Nama produk </p>
						<p class="quantity">Jumlah</p>
						<p class="price">Harga</p>
					</div>

						<div class="cart-items">
							
							@foreach ($cart->contents() as $key => $item) 
							<div class="row" id="cart{{$item['rowid']}}">
								<div class="item-image">
									<div class="image-wrapper-1">
										<div class="image">
											<div class="image-overlay-1 trans-1">
												<table>
													<tr>
														<td>
															<a href="#" class="button-2 trans-1"></a>
														</td>
													</tr>
												</table>
											</div>
											<a href="#"><img src="{{URL::to(getPrefixDomain().'/produk/'.$item['image'])}}" alt="" width="94" height="94" /></a>
										</div>
									</div>
									<div class="clear"></div>
								</div>
								<div class="desc">
									<h3 class="custom-font-1"><a href="#">{{$item['name']}}</a></h3>

										<!-- Check if this cart item has options. -->
										<h4 class="custom-font-1">
										@if ($cart->has_options($item['rowid']))
											@foreach ($cart->item_options($item['rowid']) as $option_name => $option_value)
												<a>{{ $option_name }}: {{ $option_value }}</a>
											@endforeach
										@endif

									</h4>
								</div>
								<div class="quantity">
									<input type="text" class="input-text-1 count cartqty" value="{{$item['qty']}}" name='{{ $item['rowid'] }}' />
									<!-- <a href="#" class="button-1 custom-font-1 trans-1 plus"><span></span></a>
									<a href="#" class="button-1 custom-font-1 trans-1 minus"><span></span></a> -->
								</div>
								<div class="price custom-font-1 {{ $item['rowid'] }}">
									{{ jadiRupiah($item['price'] * $item['qty'])}}
								</div>
								<div class="remove">
									<a href="javascript:deletecart('{{$item["rowid"]}}')">batal</a>
								</div>
								<div class="clear"></div>
							</div>
							@endforeach	

							
	
							<div class="row">

								<div class="note" style="padding: 0;">
									<div class="item" style="float: none; height: 18px;">
										Kota Tujuan:<br><br>							
									</div>
									<div style="float: none;">
										<input type="hidden" id="statusPengiriman" value="{{$pengaturan->statusEkspedisi}}">
									</div>
									@if($pengaturan->statusEkspedisi==1)
										<div class="form-horizontal" style="float: none;">
											<input type="text" class="input-text-1" id='tujuan' placeholder="Kota Tujuan..">
											<button type="button" class="btn" id='ekspedisibtn'>Cari Kota</button>
										</div>
										<br>
										<div class="well" id='ekspedisiplace'>
											
										</div>
										<div class="clear" style="float: none;"></div>
										<div class="item" style="float: none;margin-top: 50px;height: 18px;">
											Kupon Belanja:<br><br>
										</div>
										<div>
											<input type="text" class="input-text-1" style="margin-bottom:0 !important;" placeholder="Kupon Kode" name='kodeplace' id='kuponplace'>
											<button type="submit" class="btn" id='kuponbtn'>Pakai Kupon</button>
										</div>
									@endif

								</div>
							
								<div class="total" style="padding:0">
									<div class="checkout">
										<p>
											<s>Sub Total</s>
											<s style="width: 80px;float: right;" id='subtotalcart'>{{jadiRupiah(Shpcart::cart()->total())}}</s>
										</p>
										<p>
											<s>Pengiriman:</s>
											<s style="width: 80px;float: right;" class="custom-font-1" id='ekspedisitext'>{{$pengaturan->statusEkspedisi==2 ?'<strong>Free Shipping</strong>' : $pengaturan->statusEkspedisi==3 ?'<strong>Pengiriman menyusul</strong>':jadiRupiah(0)}}</s>
										</p>
										<p>
											<s>Kupon:</s>
											<s style="width: 80px;float: right;" class="custom-font-1" id='kupontext'>{{jadiRupiah(0)}}</s>
										</p>
										<p>
											<s>Pajak:</s>
											<s style="width: 110px;float: right;" class="custom-font-1" id='pajaktext'>{{Pajak::all()->first()->status==0? '<em>pajak non-aktif</em>' : Pajak::all()->first()->pajak.'%'}}</s>
										</p>
										<p>
											<s>Kode unik:</s>
											<s style="width: 80px;float: right;" class="custom-font-1" id='kodeuniktext'>{{jadiRupiah($kodeunik)}}</s>
										</p>
										<p>
											<s style="margin: 14px 40px 0 0;">Total pembayaran:</s>
											<b style="width: 160px;float: right;" class="custom-font-1" id='totalcart'>{{jadiRupiah(Shpcart::cart()->total())}}</b>

										</p>
										<p>
											<button type="submit" class="button-3 custom-font-1 trans-1"><span>Lanjut ke Pengiriman</span></button>
										</p>
									</div>
								</div>
							</div>
							
						</form>

					</div>
					@else
						<div class="main-title">
							<p class="custom-font-1">Keranjang belanja masih kosong</p>
							<a href="#" class="continue">Lanjut berbelanja</a>
						</div>
					@endif

				<!-- END .cart-wrapper -->
				</div>

				<div class="clear"></div>
				<br><br><br>
