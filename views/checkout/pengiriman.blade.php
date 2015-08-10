<!-- BEGIN .single-full-width -->
<div class="single-full-width customer customer-order">
<!-- BEGIN .single-full-width -->
	<div class="main-title">
		<p class="custom-font-1">
			<a href="{{URL::to('checkout')}}">Keranjang Belanja</a><span>/</span>
			<a class="active">Data Pengiriman</a><span>/</span>
			<a>Pembayaran</a><span>/</span>
			<a>Konfirmasi</a><span>/</span>
			<a>Selesai</a></p>
	</div>
	@if ( !Sentry::check())
		<div class="single-full-width customer">
			<div class="login">

				<form class="form-horizontal" action="{{URL::to('member/login')}}" method="post">
					<!-- <p class="input-error-wrapper"><span>Invalid login credentials</span></p> -->
					<p>
						<label>E-mail address:</label>
						<input type="text" name="email" class="input-text-1" required />
						<!-- <span>Error message</span> -->
					</p>
					<p>
						<label>Password:</label>
						<input type="password" name="password" class="input-text-1" />
					</p>
					<p>
						<label></label>
						<a href="#">Lupa password?</a>
					</p>
					<p class="sign-in">
						<label></label>
						<button type="submit" class="button-1 custom-font-1 trans-1"><span>Login</span></button>
						<b>atau <a href="{{URL::to('produk')}}">Kembali ke Toko</a></b>
					</p>
				</form>
			</div>
			
			<div class="guest-login">
				<div class="main-title">
					<p class="custom-font-1">Pelanggan Baru</p>
				</div>
				<button onclick="performClick()" class="button-1 custom-font-1 trans-1"><span>Checkout sebagai tamu</span></button>
			</div>

			<div class="clear"></div>

		<!-- END .single-full-width -->
		</div>
	@endif
		<div class="kirim" style="{{!Sentry::check() ? 'display:none':''}}">
		<div class="checkout-item contact-email">
            <div class="main-title">
                <p class="custom-font-1">Data Pengiriman</p>
            </div>
        </div>

		<div class="single-full-width customer">
			<div class="contact-form">

				<form class="form-horizontal" action="{{URL::to('pembayaran')}}" name='pengiriman' method='post'>
					<!-- <p class="input-error-wrapper"><span>Invalid login credentials</span></p> -->
					 <p><label>Nama:</label><input type="text" name='nama' value='{{$user ? $user->nama : (Input::old("nama")? Input::old("nama") :"")}}' required class="input-text-1"></p>

                    <p><label>Email:</label><input type="text" name='email' value='{{$user ? $user->email :(Input::old("email")? Input::old("email") :"")}}' required class="input-text-1"></p>

                    <p><label>Telpon / HP:</label><input type="text" name='telp' value='{{$user ? $user->telp :(Input::old("telp")? Input::old("telp") :"")}}' required class="input-text-1"></p>
                    
                    <p><label>Alamat:</label><textarea name='alamat' class="textarea-1" required>{{$user ? $user->alamat :(Input::old("alamat")? Input::old("alamat") :"")}}</textarea></p>

                    <p>
                        <label>Negara:</label>
                        {{Form::select('negara',array('' => '-- Pilih Negara --') + $negara , ($user ? $user->negara :(Input::old("negara")? Input::old("negara") :"")), array('required'=>'', 'id'=>'negara', 'style'=>'width:100%'))}}
                    </p>

                    <p>
                        <label>Provinsi:</label>
                        {{Form::select('provinsi',array('' => '-- Pilih Provinsi --') + $provinsi , ($user ? $user->provinsi :(Input::old("provinsi")? Input::old("provinsi") :"")),array('required'=>'','id'=>'provinsi', 'style'=>'width:100%'))}}
                    </p>

                    <p>
                        <label>Kota:</label>
                        {{Form::select('kota',array('' => '-- Pilih Kota --') + $kota , ($user ? $user->kota :(Input::old("kota")? Input::old("kota") :"")),array('required'=>'','id'=>'kota', 'style'=>'width:100%'))}}
                    </p>

                    <p><label>Kode Pos:</label><input type="text"  name='kodepos' value='{{$user ? $user->kodepos :(Input::old("kodepos")? Input::old("kodepos") :"")}}' required class="input-text-1"></p>

                    <p><label>Pesan:</label><textarea style="height:100px;" class="textarea-1" name="pesan">{{Input::old("pesan")}}</textarea></p>

                    <div class="contact-form" style="margin: 40px;">
				        <input type="checkbox" name='statuspenerima' value=1 style="width:auto;"> Data penerima sama dengan data pelanggan 
				        <div class="clear"></div>

				        <div class="contact-form" id='datapenerima'>
				        	<p><label>Data Penerima</label></label>
			            	<p><label>Nama:</label><input type="text" name='namapenerima' class="input-text-1"></p>

			            	<p><label>Telp / HP:</label><input type="text" name='telppenerima' class="input-text-1"></p>

			            	<p><label>Alamat:</label><input type="text" name='alamatpenerima' class="input-text-1"></p>

			            	<p><label>Nama:</label>{{Form::select('kotapenerima',array('' => '-- Pilih Kota --') + $kota, ($user ? $user->kota :(Input::old("kota")? Input::old("kota") :"")), array('style'=>'width:100%'))}}</p>
				        </div>
				    </div>


				    <p class="sign-in">
						<label></label>
						<button type="submit" class="button-1 custom-font-1 trans-1"><span>Lanjut ke Pembayaran</span></button>
						<b>atau <a href="{{URL::to('produk')}}">Kembali ke Toko</a></b>
					</p>
                </form>
			</div>

			<div class="clear"></div>
		</div>
		<!-- END .single-full-width -->
		</div>

	<div class="clear"></div>
	<br><br><br>
</div>
@if(Session::has('message'))
<div class="{{Session::get('message')}}" id='message' style='display:none'>
	<p>{{Session::get('text')}}</p>					
</div>
@endif