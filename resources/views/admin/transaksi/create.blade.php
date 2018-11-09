@extends('layouts.layapps')
@section('content')
	<article class="module width_full">
		<header>
			<h3>Tambah Data Master </h3>
		</header>
		<div class="module_content">
			{!! Form::open(['url' => 'master-transaksi']) !!}
				<fieldset style="width:48%; float:left; margin-right: 3%;">
					<label for="kode_transaksi">Kode Transaksi</label>
					<input type="hidden" name="kode_transaksi" value="{{$kode_transaksi}}">
					<input style="width: 92%;" type="text" name="kode" value="{{$kode_transaksi}}" disabled>
				</fieldset>
				<fieldset style="width:48%; float:left;">
					<label for="tgl_transaksi">Tanggal Transaksi</label>
					<input style="width: 92%;" type="text" name="tgl_transaksi" value="{{old('tgl_transaksi')}}" placeholder="Ex: 2017/06/23">
				</fieldset>
				<fieldset style="width:48%; float:left; margin-right: 3%;">
					<label for="keterangan">Keterangan</label>
					<input style="width: 92%;" type="text" name="keterangan" value="{{old('keterangan')}}" placeholder="Keterangan. Ex: Pending karena belum di ACC.">
				</fieldset>
				<fieldset style="width:48%; float:left;">
					<label for="status_awal">Status Transaksi Gaji</label>
					<input type="hidden" value="2" name="status">
					<input type="text" value="Pending. (Belum tergenerate)" name="status_awal" disabled>
				</fieldset>
				<div class="clear"></div>
		</div>
		<footer>
			<div class="submit_link">
				<input type="submit" value="Simpan">
			</div>
			{!! Form::close() !!}
		</footer>
	</article>
@endsection