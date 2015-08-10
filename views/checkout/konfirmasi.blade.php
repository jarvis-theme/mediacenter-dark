<!-- BEGIN .single-full-width -->
<div class="single-full-width customer customer-order">

	<div class="main-title">
		<p class="custom-font-1">
			<a href="{{URL::to('checkout')}}">Keranjang Belanja</a><span>/</span>
			<a href="javascript:history.go(-2)">Data Pengiriman</a><span>/</span>
			<a href="javascript:history.go(-1)">Pembayaran</a><span>/</span>
			<a class="active">Konfirmasi</a><span>/</span>
			<a>Selesai</a></p>
		<a href="#" class="continue">Kembali</a>
	</div>
	
	<div class="main-content item-block-3">
		<div class="content">

			<div class="checkout-item">
				<div class="main-title">
					<p class="custom-font-1">Konfirmasi Pesanan Anda</p>
				</div>
				<!-- <p>Placed on August 11, 2012 07:47 AM</p> -->
			</div>

			<div class="checkout-item billing-address">
				<div class="main-title">
					<p class="custom-font-1">Data Pelanggan</p>
				</div>
				<div class="items">
					<p>Nama: <b>{{$datapengirim['nama']}}</b></p>
					<p>Email: <b>{{$datapengirim['email']}}</b></p>
					<p>Alamat: <b>{{$datapengirim['alamat']}}</b></p>
					<p>Negara: <b>{{$datapengirim['negara']}}</b></p>
					<p>Provisi: <b>{{$datapengirim['provinsi']}}</b></p>
					<p>Kota: <b>{{$datapengirim['kota']}}</b></p>
					<p>Kode Pos: <b>{{$datapengirim['kodepos']}}</b></p>
					<p>Telp / HP: <b>{{$datapengirim['telp']}}</b></p>
					<p>Pesan: <b>{{$datapengirim['pesan']}}</b></p>
				</div>
			</div>
			
			<div class="checkout-item shipping-address">
				<div class="main-title">
					<p class="custom-font-1">Data Pengiriman</p>
				</div>
				<div class="items">
					<p>Nama: <b>{{array_key_exists('statuspenerima',$datapengirim) ?  $datapengirim['nama'] : $datapengirim['namapenerima']}}</b></p>
					<p>Telp / HP: <b>{{array_key_exists('statuspenerima',$datapengirim) ? $datapengirim['telp'] : $datapengirim['telppenerima']}}</b></p>
					<p>Alamat: <b>{{array_key_exists('statuspenerima',$datapengirim) ? $datapengirim['alamat'] : $datapengirim['alamatpenerima']}}</b></p>
					<p>Kota: <b>{{array_key_exists('statuspenerima',$datapengirim) ? $datapengirim['kota'] : $datapengirim['kotapenerima']}}</b></p>
				</div>
			</div>
			
			<div class="order-history">
				<div class="row title">
					<div class="product">Barang</div>
					<div class="sku">SKU</div>
					<div class="price">Harga</div>
					<div class="quantity">Jumlah</div>
					<div class="total">Total</div>
				</div>
				
				@foreach ($cart->contents() as $item)
				<div class="row">
					<div class="product"><a href="#">{{$item['name']}}</a></div>
					<div class="sku">&nbsp;</div>
					<div class="price">{{jadiRupiah($item['price'])}}</div>
					<div class="quantity">{{$item['qty']}}</div>
					<div class="total">{{jadiRupiah($item['qty'] * $item['price'])}}</div>
				</div>
				@endforeach

				<div class="row">
					<div class="product">Biaya Pengiriman:</div>
					<div class="sku">&nbsp;</div>
					<div class="price">&nbsp;</div>
					<div class="quantity">&nbsp;</div>
					<div class="total">{{jadiRupiah(Session::get('ongkosKirim'))}}</div>
				</div>
				<div class="row">
					<div class="product">Potongan Kupon:</div>
					<div class="sku">&nbsp;</div>
					<div class="price">&nbsp;</div>
					<div class="quantity">&nbsp;</div>
					<div class="total">- {{jadiRupiah($diskon)}}</div>
				</div>
				<div class="row">
					<div class="product">Kode Unik:</div>
					<div class="sku">&nbsp;</div>
					<div class="price">&nbsp;</div>
					<div class="quantity">&nbsp;</div>
					<div class="total">{{jadiRupiah($kodeunik)}}</div>
				</div>
				<div class="row">
					<div class="product">Pajak:</div>
					<div class="sku">&nbsp;</div>
					<div class="price">&nbsp;</div>
					<div class="quantity">&nbsp;</div>
					<div class="total">{{Pajak::all()->first()->status==0? '<small>pajak non-aktif</small>' : Pajak::all()->first()->pajak.'%'}}</div>
				</div>
				<div class="row">
					<div class="product">Total:</div>
					<div class="sku">&nbsp;</div>
					<div class="price">&nbsp;</div>
					<div class="quantity">&nbsp;</div>
					<div class="total">{{jadiRupiah($total)}}</div>
				</div>
			</div>
			<div class="clear"></div>
			<div class="checkout-item checkout-item">
				<div class="main-title">
					<p class="custom-font-1">Pembayaran</p>
				</div>
				<div class="row">
					<div class="span6">
						@if($datapembayaran['pembayaran']=='bank')
							Via Transfer Bank
						@endif
						@if($datapembayaran['pembayaran']=='paypal')
							Via Paypal
						@endif
						@if($datapembayaran['pembayaran']=='creditcard')
							Via Credit Card
						@endif
					</div>
				</div>
			</div>

			<div class="next-step">
				<table>
					<tr>
						<td>
							{{Form::open(array('url'=>'finish','method'=>'post'))}}
							<button type="submit" class="button-1 custom-font-1 trans-1"><span>Selesaikan Pemesanan</span></button>
							{{Form::close()}}
						</td>
					</tr>
				</table>
			</div>

			<div class="clear"></div>

		</div>
	</div>

	<div class="clear"></div>

<!-- END .single-full-width -->
</div>
<div class="clear"></div>
<br><br>