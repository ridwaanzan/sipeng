@extends('layouts.layapps')
@section('content')
	<article class="module width_full">
		<header>
			<h3>Tambah Data Absensi Untuk: {{$kode_transaksi}}</h3>
		</header>
		<div class="tab_content">
			<div class="module_content">
			{!! Form::open(['url' => 'absensi/data']) !!}
				<fieldset style="width:48%; float:left; margin-right: 3%;">
					<label for="kode_transaksi">Kode Transaksi</label>
					<input style="width: 92%;" value="{{$kode_transaksi}}" type="text" name="kodetransaksi" placeholder="Kode Transaksi. Ex: TRS05062017" disabled>
					<input type="hidden" name="kode_transaksi" value="{{$kode_transaksi}}">
				</fieldset>
				<fieldset style="width: 48%; float: left;">
					<label for="kode_karyawan">Kode Karyawan</label>
					<input style="width: 92%;" type="text" name="kode_karyawan" value="{{old('kode_karyawan')}}" placeholder="Kode Karyawan. Ex: KRY-004"> 
				</fieldset>
				<fieldset style="width:48%; float:left; margin-right: 3%;">
					<label for="hari_kerja">Hari Kerja</label>
					<input style="width: 92%;" value="{{old('hari_kerja')}}" type="text" name="hari_kerja" placeholder="Jumlah Hari Masuk Kerja. Ex: 26">
				</fieldset>
				<fieldset style="width: 48%; float: left;">
					<label for="masuk">Jumlah Masuk Kerja</label>
					<input style="width: 92%;" type="text" name="masuk" value="{{old('masuk')}}" placeholder="Ex: 25">
				</fieldset>
				<fieldset style="width:48%; float:left; margin-right: 3%;">
					<label for="absen">Jumlah Tidak Masuk Kerja</label>
					<input style="width: 92%;" value="{{old('absen')}}" type="text" name="absen" placeholder="Jumlah Hari Tidak Masuk Kerja. Ex: 26">
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