<!-- BEGIN .single-full-width -->
<div class="single-full-width customer customer-order">

	<div class="main-title">
		<p class="custom-font-1">
			<a href="{{URL::to('checkout')}}">Keranjang Belanja</a><span>/</span>
			<a>Data Pengiriman</a><span>/</span>
			<a>Pembayaran</a><span>/</span>
			<a>Konfirmasi</a><span>/</span>
			<a class="active">Selesai</a></p>
		<a href="#" class="continue">Kembali</a>
	</div>
	
	<div class="main-content item-block-3">
		<div class="content">

			<div class="checkout-item">
				<div class="main-title">
					<p class="custom-font-1">Order {{$pengaturan->invoice}}{{$order->kodeOrder}}</p>
				</div>
				<div class="well">
					Terima Kasih {{$datapengirim['nama']}} telah berbelanja dengan kami.
					<br>
					<h3>ID ORDER: {{$pengaturan->invoice}}{{$order->kodeOrder}}</h3>Total Harga Belanjaan: {{jadiRupiah($order->total)}}<hr>
					Data pesanan Anda telah berhasil dikirimkan. Sebuah email, yang berisikan informasi pesanan ini dan tahap selanjutnya yang harus dilakukan, telah dikirimkan ke alamat email Anda.
				</div>
			</div>
			
			<div class="order-history">
				@if($datapembayaran=='1')
					<div class="span12">
						<div class="well">
							<!-- pembayaran via transfer bank -->
							Silahkan anda melakukan pembayaran kesalah satu rekening berikut
							<br>
							<table class="table">
								@foreach($banktrans as $key =>$banktran)
                                <tr>
                                    <td>
                                        @foreach($banks as $key => $logoBank)
                                            @if($banktran->bankDefaultId==$logoBank->id)
                                                <img src="{{URL::to('img/'.$logoBank->logo)}}" width="80">
                                            @endif
                                        @endforeach
                                    </td>
                                    <td width='90%'><h4>{{ $banktran->bankdefault->nama}} : {{$banktran->noRekening}}</h4> A/n {{$banktran->atasNama}}</td>
                                </tr>
                                @endforeach
							</table>
							<hr>
							<p>Setelah melakukan pembayaran anda bisa mengkonfirmasi pembayaran anda disini:</p>
							<!-- <a href="{{URL::to('konfirmasiorder/'.$order->id)}}" class="btn theme">Konfirmasi Pembayaran</a> -->
							<div class="next-step">
								<table>
									<tr>
										<td>
											<button type="submit" onclick="window.location.href='{{URL::to('konfirmasiorder/'.$order->id)}}'" class="button-1 custom-font-1 trans-1"><span>Konfirmasi Pembayaran</span></button>
										</td>
									</tr>
								</table>
							</div>

						</div>
					</div>
				@endif
				@if($datapembayaran=='2')
					<div class="span12">
						<div class="well">
							<!-- pembayaran via paypal -->
							<p>Silakan melakukan pembayaran dengan paypal Anda secara online via paypal payment gateway. Transaksi ini berlaku jika pembayaran dilakukan sebelum 02 Jul 2013 pukul 17:26 WIB (2x24 jam). Klik tombol "Bayar Dengan Paypal" di bawah untuk melanjutkan proses pembayaran.</p>
							<a href="#" class="btn theme">Bayar Dengan Paypal</a>
						</div>
					</div>
				@endif
				@if($datapembayaran=='3')
					Via Credit Card
				@endif
			</div>

			

			<div class="clear"></div>

		</div>
	</div>

	<div class="clear"></div>

<!-- END .single-full-width -->
</div>
<div class="clear"></div>
<br><br>