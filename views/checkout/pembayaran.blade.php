

<div class="single-full-width customer customer-order">
<!-- BEGIN .single-full-width -->
	<div class="main-title">
		<p class="custom-font-1">
			<a href="{{URL::to('checkout')}}">Keranjang Belanja</a><span>/</span>
			<a href="javascript:history.go(-1)">Data Pengiriman</a><span>/</span>
			<a class="active">Pembayaran</a><span>/</span>
			<a>Konfirmasi</a><span>/</span>
			<a>Selesai</a></p>
	</div>

	<div class="main-title">
		<p class="custom-font-1">Pembayaran</p>
	</div>

	<div class="contact-form">
		<form action="{{URL::to('konfirmasi')}}" name='pembayaran' method='post'>
			<p>Pilih Jenis Pembayaran:</p>
            <label class="radio">
              <input style="width: auto;" type="radio" name="pembayaran" onchange="performClick(this.value)" id="optionsRadios1" value="bank" checked>
              Transfer Bank
            </label>

            @if($paypal->aktif)
            <label class="radio">
              <input style="width: auto;" type="radio" onchange="performClick(this.value)" name="pembayaran" id="optionsRadios2" value="paypal">
              <img style="vertical-align: middle;" src="{{URL::to('img/ico-paypal-2.png')}}" />
            </label>
            @endif

            @if($creditcard->aktif)
            <label class="radio">
              <input type="radio" name="pembayaran" onchange="performClick(this.value)" id="optionsRadios2" value="creditcard">
              <img style="vertical-align: middle;" src="{{URL::to('img/ico-generic-card-1.png')}}" />
            </label>
            @endif

            <div class="clear"></div><div class="clear"></div><br><br>
			<p class="submit">
				<label></label>
				<button class="button-1 custom-font-1 trans-1"><span>Lanjut ke Konfirmasi Pesanan</span></button>
			</p>
		</form>
		<div class="text">
			<div class="well">
				  	<table class="table table-striped">
						  <thead>
							  <tr>
								  <th>Bank</th>
								  <th>No. Rekening</th>
								  <th>Atas Nama</th>
							  </tr>
						  </thead>
						  <tbody>
						  	@foreach($banktrans as $key =>$banktran)
							<tr>
								<td width="100" class="center">
									@foreach($banks as $key => $logoBank)
										@if($banktran->bankDefaultId==$logoBank->id)
											<img src="{{URL::to('img/'.$logoBank->logo)}}" width="80">
										@endif
									@endforeach
								</td>
								<td width="120" class="center">{{$banktran->noRekening}}</td>
								<td width="120" class="center">{{$banktran->atasNama}}</td>
							</tr>
							@endforeach
						  </tbody>
					 </table>
				  </div>
		</div>
	</div>

	<div class="clear"></div>

<!-- END .single-full-width -->
</div>

<div class="clear"></div><br><br>
<script type="text/javascript">
    function performClick(value) {
    	if(value=='bank'){
        	$('div.text').css('display','block'); 
        }else{
        	$('div.text').css('display','none'); 
        }
    }
</script>