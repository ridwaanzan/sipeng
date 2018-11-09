@extends('layouts.layapps')
@section('content')
	<article class="module width_full">
		<header>
			<h3>Tambah Data Jabatan</h3>
		</header>
		<div class="tab_content">
			<div class="module_content">
			{!! Form::model($jabatan, ['method' => 'PATCH', 'route' => ['master-jabatan.update', $jabatan->kode_jabatan]]) !!}
				<input type="hidden" value="{{$jabatan->kode_jabatan}}" name="kode_jabatan">
				<fieldset style="width:48%; float:left; margin-right: 3%;">
					<label for="kode_departemen">Kode Departemen</label>
					<select name="kode_departemen" id="kode_departemen">
						<option> Pilih Departemen </option>
						@foreach($departemen as $part)
							@if($part->kode_departemen == $jabatan->kode_departemen)
								<option value="{{$part->kode_departemen}}" selected>{{$part->nama_departemen}}</option>
							@else
								<option value="{{$part->kode_departemen}}">{{$part->nama_departemen}}</option>
							@endif
						@endforeach
					</select>
				</fieldset>
				<fieldset>
					<label for="nama_jabatan">Nama Jabatan</label>
					<input style="width: 92%;" value="{{$jabatan->nama_jabatan}}" type="text" name="nama_jabatan">
				</fieldset>
				<fieldset>
					<label for="golongan">Golongan</label>
					<input style="width: 92%;" value="{{$jabatan->golongan}}" type="text" name="golongan">
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