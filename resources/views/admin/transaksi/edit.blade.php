@extends('layouts.layapps')
@section('content')
	<article class="module width_full">
		<header>
			<h3>Edit Data Master Transaksi: {{$transaksi->kode_transaksi}}</h3>
		</header>
		<div class="module_content">
			{!! Form::model($transaksi, ['method' => 'PATCH', 'route' => ['master-transaksi.update', $transaksi->kode_transaksi]]) !!}
				<fieldset style="width:48%; float:left; margin-right: 3%;">
					<label for="kode_transaksi">Kode Transaksi</label>
					<input type="hidden" name="kode_transaksi" value="{{$transaksi->kode_transaksi}}">
					<input style="width: 92%;" type="text" name="kode" value="{{$transaksi->kode_transaksi}}" disabled>
				</fieldset>
				<fieldset style="width:48%; float:left;">
					<label for="tgl_transaksi">Tanggal Transaksi</label>
					<input type="hidden" value="{{$transaksi->tgl_transaksi}}" name="tgl_transaksi">
					<input style="width: 92%;" type="text" name="tanggal" value="{{$transaksi->tgl_transaksi}}" placeholder="Ex: 2017/06/23" disabled>
				</fieldset>
				<fieldset style="width:48%; float:left; margin-right: 3%;">
					<label for="keterangan">Keterangan</label>
					<input style="width: 92%;" type="text" name="keterangan" value="{{$transaksi->keterangan}}" placeholder="Keterangan. Ex: Pending karena belum di ACC.">
				</fieldset>
				<fieldset style="width:48%; float:left;">
					<label for="status">Status Transaksi Gaji</label>
					<input type="hidden" name="status" value="{{$transaksi->status}}">
					<select name="pilih_status" id="pilih_status" disabled>
						<option value="1" @if($transaksi->status == 1) {{'selected'}} @endif>Approved</option>
						<option value="2" @if($transaksi->status == 2) {{'selected'}} @endif>Pending</option>
					</select>
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