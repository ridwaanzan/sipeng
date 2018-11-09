@extends('layouts.layapps')
@section('content')
	<article class="module width_full">
		<header>
			<h3>Tambah Data Karyawan</h3>
		</header>
		<div class="tab_content">
			<div class="module_content">
			{!! Form::open(['url' => 'master-karyawan']) !!}
				<fieldset style="width:48%; float:left; margin-right: 3%;">
					<label for="kode_karyawan">Kode Karyawan</label>
					<input type="hidden" value="{{Auth::user()->username}}" name="username">
					<input type="hidden" name="kode_karyawan" value="{{$countingHasil}}">
					<input style="width: 92%;" type="text" value="{{$countingHasil}}" placeholder="KRY-001" name="kodekaryawan" disabled>
				</fieldset>
				<fieldset style="width:48%; float:left;">
					<label for="kode_jabatan">Jabatan</label>
					<select name="kode_jabatan">
						<option>Pilih Jabatan</option>
					@foreach($jabatan as $jatem)
						<option value="{{$jatem->kode_jabatan}}">{{$jatem->nama_jabatan}}</option>
					@endforeach
					</select>
				</fieldset>
				<fieldset style="width:48%; float:left; margin-right: 3%;">
					<label for="nama_karyawan">Nama Karyawan</label>
					<input style="width: 92%;" type="text" placeholder="Nama Karyawan" value="{{old('nama_karyawan')}}" name="nama_karyawan">
				</fieldset>
				<fieldset style="width:48%; float:left;">
					<label for="alamat">Alamat</label>
					<input style="width: 92%;" type="text" placeholder="Alamat" value="{{old('alamat')}}" name="alamat">
				</fieldset>
				<fieldset style="width:48%; float:left; margin-right: 3%;">
					<label for="kota">Kota</label>
					<input style="width: 92%;" type="text" placeholder="Kota" value="{{old('kota')}}" name="kota">
				</fieldset>
				<fieldset style="width:48%; float:left;">
					<label for="provinsi">Provinsi</label>
					<input style="width: 92%;" type="text" placeholder="Provinsi" value="{{old('provinsi')}}" name="provinsi">
				</fieldset>
				<fieldset style="width:48%; float:left; margin-right: 3%;">
					<label for="kode_pos">Kode Pos</label>
					<input style="width: 92%;" type="number" placeholder="Kode Pos" value="{{old('kode_pos')}}" name="kode_pos">
				</fieldset>
				<fieldset style="width:48%; float:left;">
					<label for="negara">Negara</label>
					<input style="width: 92%;" type="text" placeholder="Indonesia" value="{{old('negara')}}" name="negara">
				</fieldset>
				<fieldset style="width:48%; float:left; margin-right: 3%;">
					<label for="telepon">Telepon</label>
					<input style="width: 92%;" type="number" placeholder="Telepon. Ex: 02112312312" value="{{old('telepon')}}" name="telepon">
				</fieldset>
				<fieldset style="width:48%; float:left;">
					<label for="email">Email</label>
					<input style="width: 92%;" type="text" placeholder="Email Aktif" value="{{old('email')}}" name="email">
				</fieldset>
				<fieldset style="width:48%; float:left; margin-right: 3%;">
					<label for="kontak">Kontak</label>
					<input style="width: 92%;" type="number" placeholder="Kontak. Ex: 085775466893" value="{{old('kontak')}}" name="kontak">
				</fieldset>
				<fieldset style="width:48%; float:left;">
					<label for="no_rekening">No. Rekening</label>
					<input style="width: 92%;" type="number" placeholder="Nomor Rekening" value="{{old('no_rekening')}}" name="no_rekening">
				</fieldset>
				<fieldset style="width:48%; float:left; margin-right: 3%;">
					<label for="an">A/n</label>
					<input style="width: 92%;" type="text" placeholder="Atas Nama Rekening Bank" value="{{old('an')}}" name="an">
				</fieldset>
				<fieldset style="width:48%; float:left;">
					<label for="bank">Bank</label>
					<select name="bank" id="bank">
						<option value="Bank Mandiri">Bank Mandiri</option>
						<option value="Bank BCA">Bank BCA</option>
						<option value="Bank BNI">Bank BNI</option>
					</select>
				</fieldset>
				<fieldset style="width:48%; float:left; margin-right: 3%;">
					<label for="Keterangan">Keterangan</label>
					<input style="width: 92%;" type="text" placeholder="Keterangan" value="{{old('keterangan')}}" name="keterangan">
				</fieldset>
				<fieldset style="width:48%; float:left;">
					<label for="status">Status</label>
					<select name="status">
						<option>Pilih Status Karyawan</option>
						<option value="1" selected>Karyawan Aktif</option>
						<option value="2">Resign</option>
					</select>
				</fieldset>
				<div class="clear"></div>
			</div>
		</div>
		<footer>
			<div class="submit_link">
				<input type="submit" value="Publish">
			</div>
			{!! Form::close() !!}
		</footer>
	</article>
@endsection