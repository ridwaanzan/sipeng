@extends('layouts.layapps')
@section('content') 
	<article class="module width_full">
		<header>
			<h3>Ubah Data Tunjangan</h3>
		</header>
		<div class="module_content">
			{!! Form::open(['url' => 'master-karyawan/tunjangan']) !!}
				<fieldset style="width:48%; float:left; margin-right: 3%;">
					<label for="kode_karyawan">Kode Karyawan</label>
					<input type="hidden" name="kode_karyawan" value="{{$karyawan->kode_karyawan}}">
					<input style="width: 92%;" type="text" name="kode" value="{{$karyawan->kode_karyawan}}" disabled>
				</fieldset>
				<fieldset style="width:48%; float:left;">
					<label for="kode_tunjangan">Kode Tunjangan</label>
					<select name="kode_tunjangan" id="kode_tunjangan">
						<option> Pilih Tunjangan </option>
						@foreach($tunjangan as $part)
							<option value="{{$part->kode_tunjangan}}">{{$part->nama_tunjangan}}</option>
						@endforeach
					</select>
				</fieldset>
				<fieldset style="width:48%; float:left; margin-right: 3%;">
					<label for="jumlah">Jumlah Tunjangan</label>
					<input style="width: 92%;" type="text" name="jumlah" value="{{old('jumlah')}}" placeholder="Ex: 1000000">
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
	<article class="module width_full">
		<header>
			<h3>Data Tunjangan Milik: {{$karyawan->nama_karyawan}}</h3>
		</header>
		<div class="tab_container">
			<div id="tab1" class="tab_content">
				<table class="tablesorter" cellspacing="0">
					<thead>
						<tr>
							<th align="center">Kode Tunjangan</th>
							<th align="center">Nama Tunjangan</th>
							<th align="center">Jumlah Tunjangan</th>
							<th align="center">Aksi</th>
						</tr>
					</thead>
					<tbody>
					@if(!$listtunjangan->count())
						<tr>
							<td colspan="4">
								Belum ada data tunjangan. Silahkan tambah data Tunjangan dengan form diatas.
							</td>
						</tr>
					@else
					@foreach($listtunjangan as $list)
						{!! Form::open(array('method' => 'DELETE', 'route' => ['tunjangan.destroy', $list->id])) !!}
						<tr align="center">
							<td>{{$list->kode_tunjangan}}</td>
							<td>
							@foreach($tunjangan as $tunss)
								@if($tunss->kode_tunjangan == $list->kode_tunjangan)
								{{$tunss->nama_tunjangan}}
								@else
								@endif
							@endforeach
							</td>
							<td>{{$list->jumlah}}</td>
							<td>
								<a href="{{url('master-karyawan/tunjangan')}}/{{$list->id}}/edit">
									<img src="{{asset('images/icn_edit.png')}}" alt="Edit">
								</a>
								<input type="submit" value="Delete" onclick='return confirm("Apakah anda yakin ingin menghapus data tunjangan: {{$list->id}}");'>
							</td>
						</tr>
						{!! Form::close() !!}
					@endforeach
					@endif
					</tbody>
				</table>
			</div>
		</div>
	</article>
@endsection