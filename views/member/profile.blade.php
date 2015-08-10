<section class="sidebar-page">
    <div class="container">
        <!-- ========================================= SIDEBAR ========================================= -->
        <div class="col-xs-12 col-sm-3 no-margin sidebar narrow">
			<div class="widget">
			    <h1 class="border">Categories</h1>
			    <div class="body">
			        <ul class="le-links">
			            <li><a href="{{url('member')}}">Order History</a></li>
			            <li><a href="{{url('member/profile/edit')}}">Edit Profile</a></li>
			        </ul><!-- /.le-links -->
			    </div>
			</div>            
        </div>
        <!-- ========================================= SIDEBAR : END ========================================= -->

        <!-- ========================================= CONTENT ========================================= -->
        <div class="col-xs-12 col-sm-9 no-margin wide  sidebar page-main-content">
            <h1 class="border">Profile</h1>
            {{Form::open(array('url'=>'member/update','method'=>'put','class'=>'form-horizontal'))}}
				<div class="form-group"><br>
					<label for="inputName" class="col-md-2 control-label">Nama</label>
					<div class="col-md-4">
						<input type="text" class="le-input col-xs-12" id="inputName" name="nama" value='{{$user->nama}}' placeholder="Name" required>
					</div>
				</div>            
				<div class="form-group">
					<label for="inputEmail1" class="col-md-2 control-label">Email</label>
					<div class="col-md-4">
						<input type="email" class="le-input col-xs-12" name='email' value='{{$user->email}}' id="inputEmail1" placeholder="Email" required>
					</div>
				</div>
				<div class="form-group">
					<label for="inputPhone" class="col-md-2 control-label">Telepon</label>
					<div class="col-md-4">
						<input type="text" class="le-input col-xs-12" id="inputPhone" name='telp' value='{{$user->telp}}' placeholder="Phone" required>
					</div>
				</div>
				<div class="form-group">
					<label for="inputCountry" class="col-md-2 control-label">Negara</label>
					<div class="col-md-4">
						{{Form::select('negara',array('' => '-- Pilih Negara --') + $negara , ($user ? $user->negara :(Input::old("negara")? Input::old("negara") :"")), array('required'=>'', 'id'=>'negara', 'class'=>'le-input col-xs-12'))}}
					</div>
				</div>      
				<div class="form-group">
					<label for="inputCountry" class="col-md-2 control-label">Provinsi</label>
					<div class="col-md-4">
						{{Form::select('provinsi',array('' => '-- Pilih Provinsi --') + $provinsi , ($user ? $user->provinsi :(Input::old("provinsi")? Input::old("provinsi") :"")),array('required'=>'','id'=>'provinsi', 'class'=>'le-input col-xs-12'))}}
					</div>
				</div>      
				<div class="form-group">
					<label for="inputCountry" class="col-md-2 control-label">Kota</label>
					<div class="col-md-4">
						{{Form::select('kota',array('' => '-- Pilih Kota --') + $kota , ($user ? $user->kota :(Input::old("kota")? Input::old("kota") :"")),array('required'=>'','id'=>'kota', 'class'=>'le-input col-xs-12'))}}
					</div>
				</div>              
				<div class="form-group">
					<label for="inputAddress" class="col-md-2 control-label">Alamat</label>
					<div class="col-md-4">
					   <textarea class="le-input col-xs-12" rows="3" placeholder="Address" name='alamat' required>{{$user->alamat}}</textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="inputZip" class="col-md-2 control-label">Kode Pos</label>
					<div class="col-md-4">
						<input type="text" class="le-input col-xs-12" id="inputZip" placeholder="Kode Pos" name='kodepos' value='{{$user->kodepos}}' required>
					</div>
				</div>
				<hr>
				<div class="form-group">
					<label for="inputUsername" class="col-md-2 control-label">Password Lama</label>
					<div class="col-md-4">
						<input type="password" class="le-input col-xs-12" name="oldpassword" id="inputUsername" placeholder="Password Lama">
					</div>
				</div>
				<div class="form-group">
					<label for="inputUsername" class="col-md-2 control-label">Password Baru</label>
					<div class="col-md-4">
						<input type="password" class="le-input col-xs-12" name="password" id="inputUsername" placeholder="Password">
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword" class="col-md-2 control-label">Ulang Password</label>
					<div class="col-md-4">
						<input type="password" class="le-input col-xs-12" name="password_confirmation" id="inputPassword" placeholder="Password">
					</div>
				</div>
				<hr />
				<div class="form-group">
					<div class="col-md-offset-2 col-md-10">
						<button type="submit" class="le-button huge">Simpan</button>
					</div>
				</div>
			{{Form::close()}}
        </div><!-- /.page-main-content -->
        <!-- ========================================= CONTENT : END ========================================= -->
    </div><!-- /.container -->
</section>