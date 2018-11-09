@extends('layouts.layapps')
@section('content')
	<article class="module width_full">
		<header>
			<h3>Rubah Data Tunjangan</h3>
		</header>
		<div class="tab_content">
			<div class="module_content">
			{!! Form::model($tunjangan, ['method' => 'PATCH', 'route' => ['master-tunjangan.update', $tunjangan->kode_tunjangan]]) !!}
				<fieldset>
					<label for="kode_tunjangan">Kode Tunjangan</label>
					<input style="width: 92%;" type="text" value="{{$tunjangan->kode_tunjangan}}" placeholder="Example: TUN-001" name="kode_tunjangan">
				</fieldset>
				<fieldset style="width:48%; float:left; margin-right: 3%;">
					<label for="nama_tunjangan">Nama Tunjangan</label>
					<input style="width: 92%;" type="text" value="{{$tunjangan->nama_tunjangan}}" placeholder="Example: BPJS" name="nama_tunjangan">
				</fieldset>
				<fieldset style="width:48%; float:left;">
					<label for="status">Status Tunjangan</label>
					<select name="status">
						<option value="5">Pilih Status Tunjangan</option>
						@if($tunjangan->status == 1)
						<option value="1" selected>Aktif</option>
						<option value="2">Tidak Berlaku</option>
						@elseif($tunjangan->status == 2)
						<option value="1">Aktif</option>
						<option value="2" selected>Tidak Berlaku</option>
						@else
						<option value="1">Aktif</option>
						<option value="2">Tidak Berlaku</option>
						@endif
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