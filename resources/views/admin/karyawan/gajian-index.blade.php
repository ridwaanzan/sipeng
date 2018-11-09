@extends('layouts.layapps')
@section('content')
	<article class="module width_full">
		<header>
			<h3>Ubah Data Gaji Milik: {{$master->nama_karyawan}}</h3>
		</header>
		<div class="module_content">
			{!! Form::open(['url' => 'master-karyawan/gajian']) !!}
				<fieldset style="width:48%; float:left; margin-right: 3%;">
					<label for="kode_karyawan">Kode Karyawan</label>

					<input type="hidden" name="kode_karyawan" value="{{$kode_karyawan}}">
					<input style="width: 92%;" type="text" name="kode" value="{{$kode_karyawan}}" disabled>
				</fieldset>
				<fieldset style="width:48%; float:left;">
					<label for="kode_jabatan">Jabatan</label>
					<input type="hidden" name="kode_jabatan" value="{{$master->kode_jabatan}}">
					@foreach($jabatan as $part)
							@if($part->kode_jabatan == $master->kode_jabatan)
								<input type="text" name="kodejabatan" style="width: 92%;" value="{{$part->nama_jabatan}}" disabled>
							@else
							@endif
						@endforeach
					</select>
				</fieldset>
				<fieldset style="width:48%; float:left; margin-right: 3%;">
					<label for="gaji_pokok">Jumlah Gaji</label>
					<input style="width: 92%;" type="text" name="gaji_pokok" value="{{old('gaji_pokok')}}" placeholder="Ex: 1000000">
				</fieldset>
				<fieldset style="width:48%; float:left;">
					<label for="tgl_masuk">Tanggal Masuk</label>
					<input style="width: 92%;" type="text" name="tgl_masuk" value="{{old('tgl_masuk')}}" placeholder="YYYY/MM/DD. Ex: 2017/06/23">
				</fieldset>
				<fieldset style="width:48%; float:left; margin-right: 3%;">
					<label for="tgl_resign">Tanggal Resign</label>
					<input style="width: 92%;" type="text" name="tgl_resign" value="{{old('tgl_resign')}}" placeholder="YYYY/MM/DD. Ex: 2017/06/23">
				</fieldset>
				<fieldset style="width:48%; float:left;">
					<label for="tgl_kenaikan">Tanggal Kenaikan</label>
					<input style="width: 92%;" type="text" name="tgl_kenaikan" value="{{old('tgl_kenaikan')}}" placeholder="YYYY/MM/DD. Ex: 2017/06/23">
				</fieldset>
				<fieldset style="width:48%; float:left; margin-right: 3%;">
					<label for="approve_by">Approved By</label>
					<select name="approve_by" id="approve_by">
						<option>-== Pilih Approved By ==-</option>
						<option value="1">Direktur Utama</option>
						<option value="2">Direktur Oprasional</option>
						<option value="3">Belum Di Approve</option>
						<option value="4">Proses Approval</option>
					</select>
				</fieldset>
				<fieldset style="width:48%; float:left;">
					<label for="status">Status Gaji</label>
					<select name="status" id="status">
						<option>-== Pilih Status ==-</option>
						<option value="1">Aktif</option>
						<option value="2">Tidak Aktif</option>
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