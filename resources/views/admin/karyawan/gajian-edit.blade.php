@extends('layouts.layapps')
@section('content')
	<article class="module width_full">
		<header>
			<h3>Ubah Data Gaji Milik: {{$master->nama_karyawan}}</h3>
		</header>
		<div class="module_content">
			{!! Form::model($gaji, ['method' => 'PATCH', 'route' => ['gajian.update', $gaji->kode_karyawan]]) !!}
				<fieldset style="width:48%; float:left; margin-right: 3%;">
					<label for="kode_karyawan">Kode Karyawan</label>

					<input type="hidden" name="kode_karyawan" value="{{$master->kode_karyawan}}">
					<input style="width: 92%;" type="text" name="kode" value="{{$master->kode_karyawan}}" disabled>
				</fieldset>
				<fieldset style="width:48%; float:left;">
					<label for="kode_jabatan">Jabatan</label>
					<select name="kode_jabatan" id="kode_jabatan">
						<option> -== Pilih Jabatan ==- </option>
						@foreach($jabatan as $part)
							@if($part->kode_jabatan == $gaji->kode_jabatan)
								<option value="{{$part->kode_jabatan}}" selected>{{$part->nama_jabatan}}</option>
							@else
								<option value="{{$part->kode_jabatan}}">{{$part->nama_jabatan}}</option>
							@endif
						@endforeach
					</select>
				</fieldset>
				<fieldset style="width:48%; float:left; margin-right: 3%;">
					<label for="gaji_pokok">Jumlah Gaji Pokok</label>
					<input style="width: 92%;" type="text" name="gaji_pokok" value="{{$gaji->gaji_pokok}}" placeholder="Ex: 1000000">
				</fieldset>
				<fieldset style="width:48%; float:left;">
					<label for="tgl_masuk">Tanggal Masuk</label>
					<input style="width: 92%;" type="text" name="tgl_masuk" value="{{$gaji->tgl_masuk}}" placeholder="YYYY/MM/DD. Ex: 2017/06/23">
				</fieldset>
				<fieldset style="width:48%; float:left; margin-right: 3%;">
					<label for="tgl_resign">Tanggal Resign</label>
					<input style="width: 92%;" type="text" name="tgl_resign" value="{{$gaji->tgl_resign}}" placeholder="YYYY/MM/DD. Ex: 2017/06/23">
				</fieldset>
				<fieldset style="width:48%; float:left;">
					<label for="tgl_kenaikan">Tanggal Kenaikan</label>
					<input style="width: 92%;" type="text" name="tgl_kenaikan" value="{{$gaji->tgl_kenaikan}}" placeholder="YYYY/MM/DD. Ex: 2017/06/23">
				</fieldset>
				<fieldset style="width:48%; float:left; margin-right: 3%;">
					<label for="approve_by">Approved By</label>
					<select name="approve_by" id="approve_by">
						<option>-== Pilih Approved By ==-</option>
						@if($gaji->approve_by == 1)
						<option value="1" selected>Direktur Utama</option>
						<option value="2">Direktur Oprasional</option>
						<option value="3">Belum Di Approve</option>
						<option value="4">Proses Approval</option>
						@elseif($gaji->approve_by == 2)
						<option value="1">Direktur Utama</option>
						<option value="2" selected>Direktur Oprasional</option>
						<option value="3">Belum Di Approve</option>
						<option value="4">Proses Approval</option>
						@else
						<option value="1">Direktur Utama</option>
						<option value="2">Direktur Oprasional</option>
						<option value="3">Belum Di Approve</option>
						<option value="4">Proses Approval</option>
						@endif
					</select>
				</fieldset>
				<fieldset style="width:48%; float:left;">
					<label for="status">Status Gaji</label>
					<select name="status" id="status">
						<option>-== Pilih Status ==-</option>
						@if($gaji->status == 1)
						<option value="1" selected>Aktif</option>
						<option value="2">Tidak Aktif</option>
						@elseif($gaji->status == 2)
						<option value="1">Aktif</option>
						<option value="2" selected>Tidak Aktif</option>
						@endif
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