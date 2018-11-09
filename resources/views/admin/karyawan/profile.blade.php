@extends('layouts.layapps')
@section('content')
	<article class="module width_full">
		<header>
			<h3>Edit Data Karyawan: {{$master->nama_karyawan}} ({{$master->kode_karyawan}})</h3>
		</header>
		<div class="tab_content">
			<div class="module_content">
			{!! Form::model($master, ['method' => 'PATCH', 'route' => ['profile.update', $master->kode_karyawan]]) !!}
				<fieldset style="width:48%; float:left; margin-right: 3%;">
					<label for="kode_karyawan">Kode Karyawan</label>
					<input type="hidden" value="{{$master->kode_karyawan}}" name="kode_karyawan">
					<input style="width: 92%;" type="text" value="{{$master->kode_karyawan}}" placeholder="KRY-001" name="kode">
				</fieldset>
				<fieldset style="width:48%; float:left;">
				<input type="hidden" name="id" value="{{$master->id}}">
					<label for="nama_karyawan">Nama Karyawan</label>
					<input style="width: 92%;" type="text" placeholder="Nama Karyawan" value="{{$master->nama_karyawan}}" name="nama" disabled>
					<input type="hidden" name="nama_karyawan" value="{{$master->nama_karyawan}}">
				</fieldset>
				<fieldset style="width:48%; float:left; margin-right: 3%;">
					<label for="alamat">Alamat</label>
					<input style="width: 92%;" type="text" placeholder="Alamat" value="{{$master->alamat}}" name="alamat">
				</fieldset>
				<fieldset style="width:48%; float:left;">
					<label for="kota">Kota</label>
					<input style="width: 92%;" type="text" placeholder="Kota" value="{{$master->kota}}" name="kota">
				</fieldset>
				<fieldset style="width:48%; float:left; margin-left: 3%;">
					<label for="provinsi">Provinsi</label>
					<input style="width: 92%;" type="text" placeholder="Provinsi" value="{{$master->provinsi}}" name="provinsi">
				</fieldset>
				<fieldset style="width:48%; float:left;">
					<label for="kode_pos">Kode Pos</label>
					<input style="width: 92%;" type="text" placeholder="Kode Pos" value="{{$master->kode_pos}}" name="kode_pos">
				</fieldset>
				<fieldset style="width:48%; float:left; margin-right: 3%;">
					<label for="negara">Negara</label>
					<input style="width: 92%;" type="text" placeholder="Indonesia" value="{{$master->negara}}" name="negara">
				</fieldset>
				<fieldset style="width:48%; float:left;">
					<label for="telepon">Telepon</label>
					<input style="width: 92%;" type="text" placeholder="Telepon. Ex: 02112312312" value="{{$master->telepon}}" name="telepon">
				</fieldset>
				<fieldset style="width:48%; float:left; margin-right: 3%;">
					<label for="email">Email</label>
					<input style="width: 92%;" type="text" placeholder="Email Aktif" value="{{$master->email}}" name="email">
				</fieldset>
				<fieldset style="width:48%; float:left;">
					<label for="kontak">Kontak</label>
					<input style="width: 92%;" type="text" placeholder="Kontak. Ex: 085775466893" value="{{$master->kontak}}" name="kontak">
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