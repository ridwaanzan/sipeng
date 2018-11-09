@extends('layouts.layapps')
@section('content')
	<article class="module width_full">
		<header>
			<h3>Edit Data Karyawan: {{$master->nama_karyawan}} ({{$master->kode_karyawan}})</h3>
		</header>
		<div class="tab_content">
			<div class="module_content">
			{!! Form::model($master, ['method' => 'PATCH', 'route' => ['master-karyawan.update', $master->kode_karyawan]]) !!}
				<fieldset style="width:48%; float:left; margin-right: 3%;">
					<label for="kode_karyawan">Kode Karyawan</label>
					<input type="hidden" value="{{$master->kode_karyawan}}" name="kode_karyawan">
					<input style="width: 92%;" type="text" value="{{$master->kode_karyawan}}" placeholder="KRY-001" name="kode">
				</fieldset>
				<fieldset style="width:48%; float:left;">
					<label for="kode_jabatan">Jabatan</label>
					<select name="kode_jabatan">
						<option>-= Pilih Jabatan =-</option>
					@foreach($jabatan as $jatem)
						@if($jatem->kode_jabatan == $master->kode_jabatan)
							<option value="{{$jatem->kode_jabatan}}" selected>{{$jatem->nama_jabatan}}</option>
						@else
							<option value="{{$jatem->kode_jabatan}}">{{$jatem->nama_jabatan}}</option>
						@endif
					@endforeach
					</select>
				</fieldset>
				<fieldset style="width:48%; float:left; margin-right: 3%;">
					<label for="nama_karyawan">Nama Karyawan</label>
					<input style="width: 92%;" type="text" placeholder="Nama Karyawan" value="{{$master->nama_karyawan}}" name="nama_karyawan">
				</fieldset>
				<fieldset style="width:48%; float:left;">
					<label for="alamat">Alamat</label>
					<input style="width: 92%;" type="text" placeholder="Alamat" value="{{$master->alamat}}" name="alamat">
				</fieldset>
				<fieldset style="width:48%; float:left; margin-right: 3%;">
					<label for="kota">Kota</label>
					<input style="width: 92%;" type="text" placeholder="Kota" value="{{$master->kota}}" name="kota">
				</fieldset>
				<fieldset style="width:48%; float:left;">
					<label for="provinsi">Provinsi</label>
					<input style="width: 92%;" type="text" placeholder="Provinsi" value="{{$master->provinsi}}" name="provinsi">
				</fieldset>
				<fieldset style="width:48%; float:left; margin-right: 3%;">
					<label for="kode_pos">Kode Pos</label>
					<input style="width: 92%;" type="text" placeholder="Kode Pos" value="{{$master->kode_pos}}" name="kode_pos">
				</fieldset>
				<fieldset style="width:48%; float:left;">
					<label for="negara">Negara</label>
					<input style="width: 92%;" type="text" placeholder="Indonesia" value="{{$master->negara}}" name="negara">
				</fieldset>
				<fieldset style="width:48%; float:left; margin-right: 3%;">
					<label for="telepon">Telepon</label>
					<input style="width: 92%;" type="text" placeholder="Telepon. Ex: 02112312312" value="{{$master->telepon}}" name="telepon">
				</fieldset>
				<fieldset style="width:48%; float:left;">
					<label for="email">Email</label>
					<input style="width: 92%;" type="text" placeholder="Email Aktif" value="{{$master->email}}" name="email">
				</fieldset>
				<fieldset style="width:48%; float:left; margin-right: 3%;">
					<label for="kontak">Kontak</label>
					<input style="width: 92%;" type="text" placeholder="Kontak. Ex: 085775466893" value="{{$master->kontak}}" name="kontak">
				</fieldset>
				<fieldset style="width:48%; float:left;">
					<label for="no_rekening">No. Rekening</label>
					<input style="width: 92%;" type="text" placeholder="Nomor Rekening" value="{{$master->no_rekening}}" name="no_rekening">
				</fieldset>
				<fieldset style="width:48%; float:left; margin-right: 3%;">
					<label for="an">A/n</label>
					<input style="width: 92%;" type="text" placeholder="Atas Nama Rekening Bank" value="{{$master->an}}" name="an">
				</fieldset>
				<fieldset style="width:48%; float:left;">
					<label for="bank">Bank</label>
					<input style="width: 92%;" type="text" placeholder="Bank. Ex: Bank Mandiri" value="{{$master->bank}}" name="bank">
				</fieldset>
				<fieldset style="width:48%; float:left; margin-right: 3%;">
					<label for="Keterangan">Keterangan</label>
					<input style="width: 92%;" type="text" placeholder="Keterangan" value="{{$master->keterangan}}" name="keterangan">
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