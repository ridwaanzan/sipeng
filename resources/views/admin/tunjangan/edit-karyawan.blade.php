@extends('layouts.layapps')
@section('content')
	<article class="module width_full">
		<header>
			<h3>Ubah Data Tunjangan</h3>
		</header>
		<div class="module_content">
			{!! Form::model($list, ['method' => 'PATCH', 'route' => ['tunjangan.update', $list->id]]) !!}
				<fieldset style="width:48%; float:left; margin-right: 3%;">
					<label for="kode_karyawan">Kode Karyawan</label>

					<input type="hidden" name="kode_karyawan" value="{{$list->kode_karyawan}}">
					<input style="width: 92%;" type="text" name="kode" value="{{$list->kode_karyawan}}" disabled>
				</fieldset>
				<fieldset style="width:48%; float:left;">
					<label for="kode_tunjangan">Kode Tunjangan</label>
					<select name="kode_tunjangan" id="kode_tunjangan">
						<option> Pilih Tunjangan </option>
						@foreach($tunjangan as $part)
							@if($part->kode_tunjangan == $list->kode_tunjangan)
								<option value="{{$part->kode_tunjangan}}" selected>{{$part->nama_tunjangan}}</option>
							@else
								<option value="{{$part->kode_tunjangan}}">{{$part->nama_tunjangan}}</option>
							@endif
						@endforeach
					</select>
				</fieldset>
				<fieldset style="width:48%; float:left; margin-right: 3%;">
					<label for="jumlah">Jumlah Tunjangan</label>
					<input style="width: 92%;" type="text" name="jumlah" value="{{$list->jumlah}}" placeholder="Ex: 1000000">
				</fieldset>
				<fieldset style="width:48%; float:left;">
					<label for="keterangan">Keterangan</label>
					<input style="width: 92%;" type="text" name="keterangan" value="{{old('keterangan')}}" placeholder="Ex: Tunjangan Khusus Supervisor">
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