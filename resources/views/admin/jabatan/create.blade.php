@extends('layouts.layapps')
@section('content')
		<h4 class="alert_info">Jabatan Direksi kode jabatan wajib 1, HRD kode jabatan wajib 2, IT kode jabatan wajib 3. Terkait Leveling Akses Login.</h4>
	<article class="module width_full">
		<header>
			<h3>Ubah Data Jabatan</h3>
		</header>
		<div class="tab_content">
			<div class="module_content">
			{!! Form::open(['url' => 'master-jabatan']) !!}
				<fieldset style="width:48%; float:left; margin-right: 3%;">
					<label for="kode_jabatan">Kode Jabatan</label>
					<input style="width: 92%;" type="text" name="kode_jabatan" placeholder="JBT-001">
				</fieldset>
				<fieldset style="width:48%; float:left; margin-right: 3%;">
					<label for="kode_departemen">Kode Departemen</label>
					<select name="kode_departemen" id="kode_departemen">
						<option value=""> Pilih Departemen </option>
						@foreach($departemen as $part)
							<option value="{{$part->kode_departemen}}">{{$part->nama_departemen}}</option>
						@endforeach
					</select>
				</fieldset>
				<fieldset>
					<label for="nama_jabatan">Nama Jabatan</label>
					<input style="width: 92%;" type="text" name="nama_jabatan" placeholder="ex: IT">
				</fieldset>
				<fieldset>
					<label for="golongan">Golongan</label>
					<input style="width: 92%;" type="text" name="golongan" placeholder="ex: 1A">
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