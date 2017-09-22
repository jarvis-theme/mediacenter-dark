<main id="contact-us" class="inner-bottom-md">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<section class="section leave-a-message">
					<h2 class="bordered">Register</h2>
					{{Form::open(array('url'=>'member','method'=>'post','class'=>'form-horizontal'))}}
						<div class="form-group">
							<label for="inputName" class="col-lg-2">Nama</label>
							<div class="col-lg-10">
								<input type="text" class="le-input" id="inputName" name="nama" value="{{Input::old('nama')}}" required>
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail1" class="col-lg-2">Email</label>
							<div class="col-lg-10">
								<input type="email" class="le-input" id="inputEmail1" name='email' value='{{Input::old("email")}}' required>
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword1" class="col-lg-2">Password</label>
							<div class="col-lg-10">
								<input type="password" class="le-input" id="inputPassword1" name="password" required>
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword2" class="col-lg-2">Konfirmasi Password</label>
							<div class="col-lg-10">
								<input type="password" class="le-input" id="inputPassword2" name="password_confirmation" required>
							</div>
						</div>
						<div class="form-group">
							<label for="dropdown" class="col-lg-2">Negara</label>
							<div class="col-lg-10">
								{{Form::select('negara',array('' => '-- Pilih Negara --') + $negara,Input::old(''),array('required', 'id="negara" data-rel="chosen" class="le-input"'))}}
							</div>
						</div>
						<div class="form-group">
							<label for="dropdown" class="col-lg-2">Provinsi</label>
							<div class="col-lg-10">
								{{Form::select('provinsi',array('' => '-- Pilih Provinsi --'), Input::old("provinsi"),array('required', 'id="provinsi" data-rel="chosen" class="le-input"'))}}
							</div>
						</div>
						<div class="form-group">
							<label for="dropdown" class="col-lg-2">Kota</label>
							<div class="col-lg-10">
								{{Form::select('kota',array('' => '-- Pilih Kota --'), Input::old("kota"),array('required', 'id="kota" data-rel="chosen" class="le-input"'))}}
							</div>
						</div>
						<div class="form-group">
							<label for="inputComment" class="col-lg-2">Alamat</label>
							<div class="col-lg-10">
								<textarea id="inputComment" class="le-input" rows="3" name='alamat' required>{{Input::old("alamat")}}</textarea>
							</div>
						</div> 
						<div class="form-group">
							<label for="inputpos1" class="col-lg-2">Kode Pos</label>
							<div class="col-lg-10">
								<input type="text" class="le-input" id="inputpos1" name='kodepos' value='{{Input::old("kodepos")}}' >
							</div>
						</div>
						<div class="form-group">
							<label for="inputpho1" class="col-lg-2">Telepon</label>
							<div class="col-lg-10">
								<input type="text" class="le-input" id="inputpho1" name='telp' value='{{Input::old("telp")}}' required>
							</div>
						</div>
						<div class="form-group">
							<label for="inputpho1" class="col-lg-2">Captcha</label>
							<div class="col-lg-10 form-inline">
								<div class="row">
									<div class="col-xs-12 col-sm-4">
										{{ HTML::image(Captcha::img(), 'Captcha image') }}
									</div>
									<div class="col-xs-12 col-sm-8">
										{{Form::text('captcha','',array('class'=>'le-input'))}}
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-offset-2 col-lg-10">
								<div class="checkbox">
									<label>
										<input name='readme' value="1" type="checkbox"> Saya telah membaca dan menyetujui <a href="{{URL::to('service')}}" target="_blank" >Privacy Policy</a>
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-offset-2 col-lg-10">
								<button type="submit" class="le-button huge">Register</button>
							</div>
						</div>
					{{Form::close()}}
				</section><!-- /.leave-a-message -->
			</div><!-- /.col -->

			<div class="col-md-6">
				<section class="our-store section inner-left-xs">
					<h2 class="bordered">Login</h2>
					<h4>Sudah Terdaftar ?</h4>
					<p>Silahkan login:</p>
					
					<div class="buttons-holder">
						<a href="{{url('member')}}" class="le-button huge">Login</a>
					</div><!-- /.buttons-holder -->
				</section><!-- /.our-store -->
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div>
</main>